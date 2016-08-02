<?php
/*
 * Mowie Language Class
 *
 * -----------------
 * LANGUAGE: English
 * -----------------
 */
$lang = [];
$lang['__Lang__'] = 'English (English)';
$lang['__LangCode__'] = 'en';
$lang['__Countrycode__'] = 'en_us';

//login
$lang['username'] = 'Benutzername';
$lang['password'] = 'Passwort';
$lang['2fa_code'] = 'Verifizierungscode';
$lang['login'] = 'Einloggen';
$lang['all_fields'] = 'Bitte alle Felder ausfüllen.';
$lang['error_2fa'] = 'Fehler bei der Anmeldung in zwei Schritten.';
$lang['wrong_username_or_pass'] = 'Benutzername oder Passwort falsch.';
$lang['wrong_pass'] = 'Falsches Passwort';

//Dashboard
$lang['delete_config_success'] = 'Die installationsdatei wurde erfolgreich gelöscht.';
$lang['os'] = 'Betriebssystem';
$lang['server_software'] = 'Server-Software';
$lang['php_version'] = 'PHP-Version';
$lang['mysql_version'] = 'Mysql-Version';
$lang['system_time'] = 'System-Zeit';
$lang['logfiles'] = 'Logfiles';
$lang['manage_pages'] = 'Seitenverwaltung';
$lang['manage_contents'] = 'Inhalte verwalten';
$lang['manage_files'] = 'Dateiverwaltung';
$lang['back_dashboard'] = 'Zurück zum Dashboard';
$lang['confirm'] = 'Bestätigen';
$lang['date'] = 'Datum';
$lang['ip'] = 'IP';
$lang['user_agent'] = 'User-Agent';
$lang['never'] = 'noch nie';

//General Admin
$lang['admin_title'] = 'Admin-Bereich';
$lang['settings'] = 'Einstellungen';
$lang['logout'] = 'Ausloggen';
$lang['main_page'] = 'Zur Hauptseite';
$lang['dashboard_title'] = 'Herzlich Willkommen im Admin-Bereich';
$lang['dashboard'] = 'Dashboard';
$lang['missing_permission'] = 'Fehlende Berechtigung';
$lang['back'] = 'Zurück';
$lang['general_yes'] = 'Ja';
$lang['general_no'] = 'Nein';
$lang['general_active'] = 'Aktiviert';
$lang['general_inactive'] = 'Nicht aktiviert';
$lang['general_activate'] = 'Aktivieren';
$lang['general_deactivate'] = 'Deaktivieren';
$lang['general_save_changes'] = 'Änderungen speichern';

//General Config
$lang['general_config'] = 'Systemkonfiguration';
$lang['general_website_title'] = 'Titel der Webseite';
$lang['general_construction_mode'] = 'Baustellenzustand';
$lang['general_end_construction_mode'] = 'Baustellenzustand aufheben';
$lang['general_start_construction_mode'] = 'Seite in Baustellenzustand versetzen';
$lang['general_edit_message'] = 'Meldung bearbeiten';
$lang['general_version'] = 'Version';
$lang['general_version_current'] = 'Installierte Version';
$lang['general_new_version'] = 'Neue Version verfügbar!';
$lang['general_version_current_new'] = 'Die installierte Version ist aktuell.';
$lang['general_update'] = 'Update';
$lang['general_database'] = 'Datenbank';
$lang['general_create_backup'] = 'Datenbank Backup erstellen';
$lang['general_go_phpmyadmin'] = 'Zu phpmyadmin';

/*
 * Manage Admins
 */

//General
$lang['admins_title'] = 'Administratoren';
$lang['admins_list'] = 'Benutzerliste';
$lang['admins_groups'] = 'Benutzergruppen';
$lang['admins_permissions'] = 'Berechtigungen';
$lang['admins_create_new'] = 'Neuen Benutzer anlegen';
//Admin List
$lang['admins_id'] = 'ID';
$lang['admins_users'] = 'Benutzer';
$lang['admins_username'] = 'Name';
$lang['admins_mail'] = 'Email-Adresse';
$lang['admins_not_set'] = 'Nicht angegeben';
$lang['admins_write_mail'] = 'Eine Email an %1$s schreiben';
//Admin Roles
$lang['admins_roles_added_success'] = 'Der Nutzer wurde erfolgreich der Gruppe hinzugefügt.';
$lang['admins_roles_added_fail'] = 'Fehler beim Hinzufügen des Nutzers.';
$lang['admins_roles_delete_group'] = 'Gruppe löschen';
$lang['admins_roles_delete_error'] = 'Diese Gruppe kann nicht gelöscht werden.';
$lang['admins_roles_delete_success'] = 'Die Gruppe wurde erfolgreich gelöscht.';
$lang['admins_roles_delete_fail'] = 'Fehler beim Löschen der Gruppe.';
$lang['admins_roles_delete_confirm'] = 'Möchten Sie die Gruppe wirklich löschen? <b>Diese Aktion kann nicht Rückgängig gemacht werden!</b>';
$lang['admins_roles_user_delete_success'] = 'Der Nutzer wurde erfolgreich aus der Gruppe entfernt.';
$lang['admins_roles_user_delete_fail'] = 'Fehler beim Entfernen des Nutzers.';
$lang['admins_roles_user_delete_confirm'] = 'Möchten Sie den Nutzer wirklich löschen? Er wird daurch alle ihm zugewiesenen Rechte verlieren! <b>Diese Aktion kann nicht Rückgängig gemacht werden!</b>';
$lang['admins_roles_members'] = 'Gruppenmitglieder';
$lang['admins_roles_member_remove'] = 'Nutzer Entfernen';
$lang['admins_roles_no_members_yet'] = 'Diese Gruppe hat noch keine Mitglieder.';
$lang['admins_roles_already_all_members'] = 'Es sind alle Nutzer Mitglieder dieser Gruppe.';
$lang['admins_roles_add_user'] = 'Nutzer hinzufügen';
$lang['admins_roles_create_group_success'] = 'Die neue Gruppe wurde erfolgreich angelegt.';
$lang['admins_roles_create_group_fail'] = 'Fehler beim Anlegen der neuen Gruppe.';
$lang['admins_roles_create_group'] = 'Neue Gruppe anlegen';
$lang['admins_roles_group_name'] = 'Gruppenname';
$lang['admins_roles_group'] = 'Gruppe';
$lang['admins_roles_level'] = 'Level';
$lang['admins_roles_name'] = 'Name';
//Admin Permissions
$lang['admins_perms_set_success'] = 'Die neuen Berechtigungen wurden erfolgreich vergeben.';
$lang['admins_perms_set_fail'] = 'Fehler beim Vergeben der neuen Berechtigungen.';
$lang['admins_perms_critical'] = 'Vergeben Sie diese Berechtigung nur an Vertrauenswürdige Personen, um Sicherheitsproblemen vorzubeugen';
$lang['admins_perms_save'] = 'Berechtigungen ändern';
//Create New User
$lang['admins_cn_success'] = '"%1$s" wurde erfolgreich neuer Nutzer registriert.';
$lang['admins_cn_fail'] = 'Fehler beim Erstellen des neuen Benutzers.';
$lang['admins_cn_name_already_in_use'] = 'Benutzername Schon vergeben.';
$lang['admins_cn_pw_not_match'] = 'Die beiden Passwörtzer stimmen nicht überein.';
$lang['admins_cn_username'] = 'Gewünschter Benutzername';
$lang['admins_cn_password'] = 'Passwort';
$lang['admins_cn_password_again'] = 'Passwort erneut eingeben';
$lang['admins_cn_create'] = 'Benutzer erstellen';
$lang['admins_cn_missing_inputs'] = 'Bitte alle Felder ausfüllen.';

//User Settings
$lang['user_settings_title'] = 'Benutzereinstellungen';
$lang['user_settings_pw_not_empty'] = 'Das Passwort darf nicht Leer sein!';
$lang['user_settings_pw_change_success'] = 'Das Passwort wurde erfolgreich ge&auml;ndert.';
$lang['user_settings_pw_change_fail'] = 'Fehler beim Ä;ndern des Passworts.';
$lang['user_settings_pw_not_match'] = 'Die beiden Passwörter stimmen nicht überein.';
$lang['user_settings_new_pass'] = 'Neues Passwort eingeben';
$lang['user_settings_new_pass_confirm'] = 'Neues Passwort bestätigen';
$lang['user_settings_enter_current_pass'] = 'Geben Sie ihr aktuelles Passwort ein';
$lang['user_settings_error_logout_all_devices'] = 'Fehler beim Ausloggen auf allen Geräten.';
$lang['user_settings_current_sessions'] = 'Zurzeit offene Anmeldungen';
$lang['user_settings_current_session'] = 'Aktuelle Anmeldung';
$lang['user_settings_current_sessions_logout_all'] = 'Überall abmelden';
$lang['user_settings_2fa'] = 'Anmeldung in zwei Schritten';
$lang['user_settings_2fa_deactivate'] = 'Anmeldung in zwei Schritten deaktivieren';
$lang['user_settings_2fa_deactivate_success'] = 'Die Anmeldung in zwei Schritten wurde erfolgreich deaktiviert.';
$lang['user_settings_2fa_deactivate_fail'] = 'Fehler beim Deaktivieren der Anmeldung in zwei Schritten.';
$lang['user_settings_2fa_deactivate_confirm'] = 'Sind sie sicher, die Anmeldung in zwei Schritten wirklich zu deaktivieren?';
$lang['user_settings_2fa_activate'] = 'Anmeldung in zwei Schritten aktivieren';
$lang['user_settings_2fa_activate_success'] = 'Die Anmeldung in zwei Schritten wurde erfolgreich eingerichtet.';
$lang['user_settings_2fa_activate_fail'] = 'Fehler beim Einrichten der Anmeldung in zwei Schritten.';
$lang['user_settings_2fa_activate_wrong_code'] = 'Falscher Code.';
$lang['user_settings_2fa_activate_import_code'] = 'Importieren Sie diese Information in ihre Google-Authenticator-Anwendung (oder andere TOTP-Anwendung), indem Sie den unten bereitgestellten QR-Code verwendest oder den Code manuell eingeben.';
$lang['user_settings_2fa_key'] = 'Schlüssel';
$lang['user_settings_2fa_confirm_code'] = 'Nach einer einmaligen Überprüfung des Codes wird die Anmeldung in zwei Schritten für diesen Account aktiviert';
$lang['user_settings_2fa_enter_code'] = 'Code eingeben...';
$lang['user_settings_2fa_test'] = 'Überprüfen';
$lang['user_settings_settings_success'] = 'Die Änderungen des Nutzers wurden erfolgreich gespeichert.';
$lang['user_settings_settings_fail'] = 'Fehler beim Speichern der Änderungen des Nutzers.';
$lang['user_settings_settings_pass'] = 'Passwort ändern';
$lang['user_settings_last_login'] = 'Letzter Login';
$lang['user_settings_show_current_sessions'] = 'Offene Anmeldungen anzeigen';

//Mail
$lang['mail_write'] = 'Email schreiben';
$lang['mail_success'] = 'Die Email an "%1$s" wurde erfolgreich abgeschickt.';
$lang['mail_write_to'] = 'Eine Email an %1$s Schreiben';
$lang['mail_fail'] = 'Fehler beim Schreiben der Email';
$lang['mail_subject'] = 'Betreff';
$lang['mail_message'] = 'Nachricht';
$lang['mail_send'] = 'Email abschicken';

//Action
$lang['action_backup_fail'] = 'Fehler beim Erstellen des Backups.';
$lang['action_edit_content'] = 'Seite bearbeiten';
$lang['action_construction_message_success'] = 'Die Meldung wurde erfolgreich ge&auml;ndert.';
$lang['action_try_again_later'] = 'Fehler. Bitte versuchen Sie es später noch einmal.';
$lang['action_construction_message_edit'] = 'Baustellen-Meldung bearbeiten';
$lang['action_construction_success'] = 'Die Webseite wurde erfolgreich in den Baustellenzustand versetzt.';
$lang['action_construction_confirm'] = 'Wollen Sie die Webseite wirklich in den Baustellenzustand verstzten?';
$lang['action_construction_removed_success'] = 'Der Baustellenzustand wurde erfolgreich aufgehoben.';
$lang['action_construction_remove'] = 'Wollen Sie den Baustellenzustand wirklich aufheben?';
$lang['action_change_page_title_success'] = 'Die Änderungen des Seitentitels wurden erfolgreich gespeichert.';
$lang['action_update_item_succss'] = '"%1$s" wurde erfolgreich upgedatet.';
$lang['action_update_item_fail'] = 'Fehler beim Updaten von "%1$s"';
$lang['action_update_succss'] = 'Das CMS wurde erfolgreich upgedatet.';
$lang['action_update_fail'] = 'Fehler beim Updaten.';
$lang['action_update_fail_unzip'] = 'Fehler beim Entpacken des Updates.';
$lang['action_update_md5_fake'] = 'Die Heruntergeladene Datei ist vermutlich falsch.';
$lang['action_update_fail_copy'] = 'Fehler beim Herunterladen des Updates. <b>Hinweis:</b> Der Nutzer, unter welchem der Webserver läuft, muss im Verzeichnis /admin Schreibrechte haben!';