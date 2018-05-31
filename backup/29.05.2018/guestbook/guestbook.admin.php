<?
	require("../common/functions/internal.functions");
	require("../common/abstract/mysql.abstract");
	require("../common/functions/parse.functions");
	//
	require("../common/config/common.cfg");
	require("../guestbook/guestbook.cfg");
	//
	$db = new MySQL;
	if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}
	//
	//
	require("../common/auth/auth.php");
	//
	//
	include("../includes/header-a.php");
	//
	//
	if ($object=='guestbook') {
		include("messages/guestbook.messages");
		include("modules/guestbook.module");
	}
	//
	include("../includes/footer-a.php");
	//
?>