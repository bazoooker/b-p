<?
	@header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	@header("Cache-Control: post-check=0, pre-check=0", false);
	@header("Pragma: no-cache");                                    // HTTP/1.0
	@header("Content-type: text/html; charset=windows-1251");                          // 'application/msword' or 'application/octet-stream'

		require("../common/functions/internal.functions");
		require("../common/functions/parse.functions");
		require("../common/abstract/mysql.abstract");
		//
		require("../common/config/common.cfg");
		require("guestbook.cfg");
		//
		$db = new MySQL;
		if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}
		$db->query("use $maindatabase");
		//
		$gobj=2;
		$from=$pageno*30;
		//
		$content=$db->query("select *,date_format(gdate,'$dtformat') as gdatef from guestbook where gvisible='y' and gobj=$gobj order by gdate desc limit $from, $msgsperpage");
		$count=$db->numrows($content);
		//
                //
?>
<?
	for($i=0;$i<$count;$i++) {
		$gb=$db->fetchrow($content,$i);
		include($DOCUMENT_ROOT."/guestbook/__listguestbook.php");
	}
?>
