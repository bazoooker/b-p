<ul class="left-side-nav-links">
<?
	$__tmcntnt=mysql_query("select * from menu_items where iparent=$__parent_menu and ivisible='y' order by iorder");
	$__tmc=mysql_numrows($__tmcntnt);
	//
	for ($i=0;$i<$__tmc;$i++) {
		$__inote = mysql_result($__tmcntnt,$i,"inote");
		$__iname = mysql_result($__tmcntnt,$i,"iname");
		$__itext = mysql_result($__tmcntnt,$i,"itext");
		$__ilink = mysql_result($__tmcntnt,$i,"ilink");
		$__iid = mysql_result($__tmcntnt,$i,"iid");
		$__ipic = mysql_result($__tmcntnt,$i,"ipic");
		//
		
?>                                      
<li class="<?if(isthisparentofthat($__iid,$__cmi,$__conn)||($__iid==$__cmi)) echo "active";?>"><a href="<?=$__ilink?>"><?=$__itext?></a></li>
<?
	}	
?>
</ul>
