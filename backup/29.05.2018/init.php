<?
 
	@header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	@header("Cache-Control: post-check=0, pre-check=0", false);
	@header("Pragma: no-cache");                                    // HTTP/1.0
	@header("Content-type: text/html; charset=windows-1251");                          // 'application/msword' or 'application/octet-stream'

	include($_SERVER['DOCUMENT_ROOT']."/common/config/common.cfg");
	include_once($_SERVER['DOCUMENT_ROOT']."/menus/functions/main.functions");
	include_once($_SERVER['DOCUMENT_ROOT']."/common/functions/parse.functions");
	$__conn=mysql_connect($sqlserver,$sqluser,$sqlpassword);
	mysql_select_db($sqldatabase,$__conn);
	mysql_query("SET NAMES cp1251",$__conn);
	mysql_query("SET CHARACTER SET cp1251",$__conn);

	mysql_query("SET CHARACTER_SET_CLIENT=cp1251",$__conn);
	mysql_query("SET CHARACTER_SET_RESULTS=cp1251",$__conn);
	mysql_query("SET COLLATION_CONNECTION=cp1251",$__conn);
	//
	if(!$__uri)$__uri=$REQUEST_URI;
	$__uri=str_replace("//","/",$__uri);

	$__cmi=0;
	$__cmi=getmenuitem($__uri,$__conn);
	$__pcmi=gettopparentof($__cmi,$__conn);
        //
	$__cmiobj=mysql_fetch_array(mysql_query("select * from menu_items where iid=$__cmi"));
	$__parentcmiobj=mysql_fetch_array(mysql_query("select * from menu_items where iid=".$__cmiobj['iparent']));
	$__pcmiobj=mysql_fetch_array(mysql_query("select * from menu_items where iid=$__pcmi"));
	//

	include_once($DOCUMENT_ROOT."/common/abstract/mysql.abstract");
	//
	$db = new MySQL;
	if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}

?>
