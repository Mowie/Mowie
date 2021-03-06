<?php
require_once '../inc/autoload_adm.php';

use HGG\DbCmd\CmdBuilder\MySql;
use HGG\DbCmd\DbCmd;

// Full Database Backeup
if (isset($_GET['dbbackup']) && is_loggedin() && hasPerm('db_dump'))
{
	try
	{
		$output = '';
		$cmd = new DbCmd(new MySql());
		$cmd->dumpDatabase($MCONF['db_usr'], $MCONF['db_pw'], $MCONF['db_host'], $MCONF['db_name'],
			'.dbdump.tmp', array(), $output);

		stream_message('{user} made a database-backup.', 4);
		header("Cache-Control: public");
		header("content-Description: File Transfer");
		header('Content-Disposition: attachment; filename=Backup_' . str_replace(' ', '_', $MCONF['title']) . '_' . date('Y-m-d_h-d') . '.sql');
		header("Content-Type: application/octet-stream; ");
		header("Content-Transfer-Encoding: binary");
		readfile('.dbdump.tmp');
		unlink('.dbdump.tmp');
	}
	catch (\Exception $e)
	{
		echo msg('fail', $lang->get('action_backup_fail'));
	}

	exit;


}
if (hasPerm('manage_system'))
{
	//construction
	if (isset($_GET['construction']))
	{
		printHeader($lang->get('action_construction_message_edit'));
		if (isset($_GET['constr_message']))
		{
			if (isset($_POST['constr_message']))
			{
				if (file_put_contents('../content/.system/construction2.txt', $_POST['constr_message']))
				{
					copy('../content/.system/construction2.txt', '../content/.system/construction.txt');
					echo msg('success', $lang->get('action_construction_message_success') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
					stream_message('{user} edited the construction-mode message.', 2);
				} else
				{
					echo msg('fail', $lang->get('action_try_again_later') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
				}
			} else
			{
				tinymce();
				?>
				<div class="main">
					<h1><?php echo $lang->get('action_construction_message_edit'); ?></h1>
					<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
						<textarea id="editor"
								  name="constr_message"><?php require('../content/.system/construction2.txt'); ?></textarea>
						<input type="submit" value="<?php echo $lang->get('general_save_changes'); ?>"/>
					</form>
				</div>
				<?php
			}
		} else
		{
			if (hasPerm('construction'))
			{
				if (!file_exists('../content/.system/construction.txt'))
				{
					if (isset($_GET['confirm']))
					{
						if (copy('../content/.system/construction2.txt', '../content/.system/construction.txt'))
						{
							echo msg('success', $lang->get('action_construction_success') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
							stream_message('{user} put the site into construction mode.', 2);
						} else
						{
							echo msg('fail', $lang->get('action_construction_error') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
						}
					} else
					{
						?>
						<div class="main">
							<p style="text-align: center;">
								<?php echo $lang->get('action_construction_confirm'); ?><br/>
								<a href="action.php?construction&confirm"
								   class="button"><?php echo $lang->get('general_yes'); ?></a>
								<a href="general_config.php"
								   class="button btn_del"><?php echo $lang->get('general_no'); ?></a>
							</p>
						</div>
						<?php
					}
				} else
				{
					if (isset($_GET['confirm']))
					{
						if (unlink('../content/.system/construction.txt'))
						{
							echo msg('success', $lang->get('action_construction_removed_success') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
							stream_message('{user} put the site into production mode.', 2);
						} else
						{
							echo msg('fail', $lang->get('action_construction_removed_error') . ' <a href="general_config.php">' . $lang->get('back') . '</a>');
						}
					} else
					{
						?>
						<div class="main">
							<p style="text-align: center;">
								<?php echo $lang->get('action_construction_remove'); ?><br/>
								<a href="action.php?construction&confirm"
								   class="button"><?php echo $lang->get('general_yes'); ?></a>
								<a href="general_config.php"
								   class="button btn_del"><?php echo $lang->get('general_no'); ?></a>
							</p>
						</div>
						<?php
					}
				}
			}
		}
	}

	//General Changes
	if (isset($_GET['general']))
	{
		printHeader($lang->get('general_config'));
		//Header
		if (hasPerm('edit_title'))
		{
			$titel = $_POST['titel'];
			if (file_put_contents('../content/.system/page_title.txt', $titel))
			{
				echo msg('success', $lang->get('action_change_page_title_success'));
				stream_message('{user} edited the page title.', 2);
			} else
			{
				echo msg('fail', $lang->get('action_try_again_later'));
			}
		}

		$apps = new apps();
		$appUri = '../apps/';
		foreach ($apps->getApps() as $app => $appconf)
		{
			require $appUri . $appconf['app_path'] . '/config.php';
			if (isset($_CONF['general_conf']) && $_CONF['general_conf'] != '' && file_exists($appUri . $appconf['app_path'] . '/' . $_CONF['general_conf']))
			{
				require $appUri .$appconf['app_path'] . '/' . $_CONF['general_conf'];
			}
		}
	}
} else
{
	printHeader($lang->get('action_edit_content'));
	echo msg('info', $lang->get('missing_permission'));
}
require_once '../inc/footer.php';
?>