<?
	$content=mysql_query("select *,date_format(gdate,'%d/%m/%Y') as gdatef from guestbook where gvisible='y' and gobj<>9  order by rand() desc limit 0,9");
	$mc=mysql_numrows($content);
	//
	for ($i=0;$i<$mc;$i++) {
		$gmessage=mysql_result($content,$i,"gmessage");
		$gname=mysql_result($content,$i,"gname");
		$gcity=mysql_result($content,$i,"gcity");
		$gmark=mysql_result($content,$i,"gmark");
		$gid=mysql_result($content,$i,"gid");
		$gobj=mysql_result($content,$i,"gobj");
?>


								<li class="item">
									<div class="post" onClick="window.location.href='/guestbook/<?=$gobj?>/#gb<?=$gid?>'" style="cursor:pointer">

										<div class="text"><div class=inner><?=$gmessage?></div></div>
										<div class="subtext"></div>
										<div class="name"><?=$gname?></div>
										<div class="city"><?=$gcity?></div>
									</div>
								</li>
<?
	}
?>
