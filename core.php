<?php
ob_start();
$sessionCookieExpireTime=8*60*60;
session_set_cookie_params($sessionCookieExpireTime);
session_name('u23rs3ss10n');
session_start();
$currentfile=$_SERVER['SCRIPT_NAME']; //access the current file path
?>