<?
require("../../guestbook.cfg");
require("../../../common/abstract/mysql.abstract");
require("../../../common/config/common.cfg");
require("../../../common/functions/parse.functions");
require("../../../common/functions/internal.functions");
//
$db = new MySQL;
if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}
?>