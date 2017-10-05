<?php
require_once '../inc/autoload_adm.php';
require_once '../inc/libs/updater.php';

$update = new Mowie\Updater\updater();
$update->setServer($MCONF['update_servers']);
$update->setCurrentVersion($MCONF['version']);
$update->setUpdateDir('../');
$update->thingsToNotUpdate = [
	'apps/',
	'config/',
	'content/',
	'vendor/',
	'templates_c'
];

//Update-Checker
if (isset($_GET['checkUpdate']))
{
	//sleep(50);
	if (hasPerm('update'))
	{
		//Check for newer Version
		try
		{
			$new = $update->checkUpdateAvailable();
		} catch (\Exception $e)
		{
			echo 'Error. ' . $e->getMessage();
		}

		// If we have a new version, show it
		if (isset($new))
		{
			echo $lang->get('update_new_version') . ' <b>' . $new['version'] . '</b> <a href="update.php?update" class="button">' . $lang->get('update_title') . '</a>';
			if (isset($new['changelog']))
			{
				echo '<a href="update.php?showChangelog&url=' . urlencode($new['server'] . $new['changelog']) . '" class="button"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;Changelog</a>';
			}
		} else
		{
			echo $lang->get('update_version_current_new');
		}
	}
	exit;
}

//Show Changelog
if (isset($_GET['showChangelog']))
{
	printHeader($lang->get('update_showChangelog'));
	echo '<div class="main">';
	if (hasPerm('update'))
	{
		if(isset($_GET['url']))
		{
			$parsedown = new Parsedown();
			$change = $update->getChangelog(urldecode($_GET['url']));
			echo $parsedown->parse($change);
		}
		else
		{
			echo 'Missing Url';
		}
	} else
	{
		echo msg('info', $lang->get('missing_permission'));
	}
	echo '<a href="general_config.php">'.$lang->get('back').'</a> </div>';
	exit;
}


//Update
if (isset($_GET['update']))
{
	printHeader($lang->get('update_title'));
	if (hasPerm('update'))
	{
		//Check for newer Version
		try
		{
			$new = $update->checkUpdateAvailable();
		} catch (\Exception $e)
		{
			echo 'Error. ' . $e->getMessage();
		}

		// Update if we have one
		if(isset($new))
		{
			//Check writing permissions
			if($update->updateFolderIsWritable())
			{
				// Download the update
				if ($update->downloadUpdate($new))
				{
					// Check downloaded update file
					if($update->verifyUpdate($new))
					{
						// Put the site in "under construction mode"
						if (copy('../content/.system/construction2.txt', '../content/.system/construction.txt'))
						{
							stream_message('{user} put the site into construction mode.', 2);

							// Create a backup
							if($update->backupUpdateFolder())
							{
								// The actual update
								try
								{
									$update->rollTheUpdate();
								}
								catch (\Exception $e)
								{
									echo msg('fail', $lang->get('update_fail_unzip'). ' ('.$e->getMessage().')');
								}

								// Execute migrations
								$update->migrate();

								// Clean afterwards
								if($update->cleanup())
								{
									// Update new Version in Config file
									$conf = \Symfony\Component\Yaml\Yaml::parse(file_get_contents('../config/config.yml'));
									$conf['Versioning']['version'] = $update->getCurrentVersion();

									$configfile = \Symfony\Component\Yaml\Yaml::dump($conf);
									if (file_put_contents('../config/config.yml', $configfile))
									{
										// Disable Construction mode
										if (unlink('../content/.system/construction.txt'))
										{
											echo msg('success', $lang->get('update_succss') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
											stream_message('{user} updated the System.', 2);
											stream_message('{user} put the site into production mode.', 2);
										}
										else
										{
											echo msg('success', $lang->get('action_construction_removed_error'));
										}
									}
								}
								else
								{
									echo msg('fail', $lang->get('update_cleanup_error'));
								}
							}
							else
							{
								echo msg('fail', $lang->get('update_create_backup_error'));
							}
						} else
						{
							echo msg('fail', $lang->get('action_construction_error'));
						}
					}
					else
					{
						echo msg('fail', $lang->get('update_wrong_hash'));
					}
				}
				else
				{
					echo msg('fail', $lang->get('update_fail_copy'));
				}
			}
			else
			{
				echo msg('fail', $lang->get('update_folder_not_writeable'));
			}
		}
		else
		{
			echo msg('info', $lang->get('update_version_current_new'));
		}

		/*
		$updated = false;
		foreach ($MCONF['update_servers'] as $update_server)
		{
				$nextVersion = $MCONF['version_num'] + 1;
				$installedVersion = $MCONF['version_num'];

				//If we want to see the changelog for an app, we need to look in a different directory
				$remoteSubDir = 'System';
				$systemSubDir = '../';
				if (isset($_GET['appUpdate']))
				{
					require '../apps/' . urldecode($_GET['appUpdate']) . '/config.php';
					$remoteSubDir = 'apps/' . str_replace(' ', '-', $_CONF['app_name']);
					$nextVersion = $_CONF['app_build'] + 1;
					$systemSubDir = '../apps/' . urldecode($_GET['appUpdate']) . '/';
					$installedVersion = $_CONF['app_build'];
				}

				//Check for version.json on the remote server
				$dUri = $update_server . $remoteSubDir . '/v' . $nextVersion . '/';
				if (remote_file_exists($dUri . 'version.json'))
				{
					$version_remote = json_decode(file_get_contents($dUri . 'version.json'));
					//Check if the remote version is newer
					if ($version_remote->versionNum > $installedVersion)
					{
						//Download the update
						if (copy($dUri . 'update.v' . $version_remote->versionNum . '.incremental.zip', 'update.zip'))
						{
							$updated = true;
							//Check for md5 hash
							if (md5_file('update.zip') == $version_remote->md5)
							{
								//unzip to temporary folder
								$updateTmpDir = 'updateTmp/';
								if (!file_exists($updateTmpDir))
								{
									if (mkdir($updateTmpDir, 0777) === false)
									{
										echo msg('fail', 'Error creating temporary folder.');
									}
								}

								$zip = new ZipArchive;
								$res = $zip->open('update.zip');
								if ($res === true)
								{
									$zip->extractTo($updateTmpDir);
									$zip->close();
									$updateInfos = json_decode(file_get_contents($updateTmpDir . 'filesToUpdate.json'));

									$isUp = false;
									$fTU = [];
									foreach ($updateInfos->files as $num => $file)
									{
										$fTU[] = $file;
										$upNeu = $updateTmpDir . $file;
										$upRem = $systemSubDir . $file;
										if (copy($upNeu, $upRem))
										{
											echo msg('success', sprintf($lang->get('update_item_succss'), $file));
											$isUp = true;
										} else
										{
											echo msg('fail', sprintf($lang->get('update_item_fail'), $file));
										}
									}

									//Update Version in Config File - only if we don't update an app
									if (!isset($_GET['appUpdate']))
									{
										$config = Yaml::parse(file_get_contents('../config/config.yml', FILE_USE_INCLUDE_PATH));
										$config['Versioning']['version'] = $version_remote->version;
										$config['Versioning']['version_num'] = $version_remote->versionNum;
										$configfile = Yaml::dump($config);
										if (!file_put_contents('../config/config.yml', $configfile))
										{
											echo msg('fail', $lang->get('general_config_fail'));
										}
									}

									//Remove "old" update
									if (rrmdir($updateTmpDir) && $isUp && unlink('update.zip'))
									{
										if(isset($_GET['appUpdate']))
										{
											echo msg('success', sprintf($lang->get('update_app_succss'), $_CONF['app_name']) . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
											stream_message('{user} updated the app "{extra}".', 2, $_CONF['app_name']);
										}
										else
										{
											echo msg('success', $lang->get('update_succss') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
											stream_message('{user} updated the system.', 2);
										}
									} else
									{
										echo msg('fail', $lang->get('update_fail') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
									}
								} else
								{
									echo msg('fail', $lang->get('update_fail_unzip'));
								}
							} else
							{
								echo msg('fail', $lang->get('update_md5_fake'));
							}
						} else
						{
							echo msg('fail', $lang->get('update_fail_copy'));
						}
					} else
					{
						echo msg('info', $lang->get('update_version_current_new'));
					}
				}
		}

		if(!$updated)
		{
			echo msg('info', $lang->get('update_version_current_new'));
		}
		*/
	}
	require_once '../inc/footer.php';
}