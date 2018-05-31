<?
	$content=mysql_query("select *,date_format(gdate,'%d/%m/%Y') as gdatef from guestbook where gvisible='y' and gobj=9 order by rand() desc limit 0,9");
	$mc=mysql_numrows($content);
	//
	for ($i=0;$i<$mc;$i++) {
		$gmessage=mysql_result($content,$i,"gmessage");
		$gname=mysql_result($content,$i,"gname");
		$gcity=mysql_result($content,$i,"gcity");
		$gmark=mysql_result($content,$i,"gmark");
		$glink=mysql_result($content,$i,"glink");
		$gid=mysql_result($content,$i,"gid");
?>


								<li class="item" style="height:280px;">
									<div class="post">
<?
	if($glink) {
?>
<a href="<?=$glink?>">
<?
	} else {
?>
<a href=/guestbook/#gb<?=$gid?>>
<?
	}
?>
										<div class="photo"><img src="/guestbook/image.php?gid=<?=$gid?>&mode=full" alt="" /></div>								
										<div class="rating">
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
										</div>

										<div class="text"><?=$gmessage?></div>

										<div class="name"><?=$gname?></div>
										<div class="city"><?=$gcity?></div>
</a>
									</div>
								</li>
<?
	}
?>
