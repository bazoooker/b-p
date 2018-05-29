<div class=nav-full>
<?
	$__tmcntnt=mysql_query("select * from menu_items where iparent=0 and mid=9 and ivisible='y' order by iorder limit 0, 4");
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
                        <li><span class=nav-full__rubrika><?=$__itext?></span>
<?
	$__stmcntnt=mysql_query("select * from menu_items where iparent=$__iid and mid=9 and ivisible='y' order by iorder");
	$__stmc=mysql_numrows($__stmcntnt);
	if($__stmc>0) {
?>
                            <ul class="nav-full__list">
<?
	//
		for ($si=0;$si<$__stmc;$si++) {
			$__sinote = mysql_result($__stmcntnt,$si,"inote");
			$__siname = mysql_result($__stmcntnt,$si,"iname");
			$__sitext = mysql_result($__stmcntnt,$si,"itext");
			$__silink = mysql_result($__stmcntnt,$si,"ilink");
			$__siid = mysql_result($__stmcntnt,$si,"iid");
			$__sipic = mysql_result($__stmcntnt,$si,"ipic");
			//
		
?>                                      
                                <li><a href="<?=$__silink?>"><?=$__sitext?></a></li>
<?
		}
?>		
                            </ul>
<?
	}
?>
			</li>
<?
	}
?>
</div>
<div class=nav-full>
<?
	$__tmcntnt=mysql_query("select * from menu_items where iparent=0 and mid=9 and ivisible='y' order by iorder limit 4, 8");
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
                        <li><span class=nav-full__rubrika><?=$__itext?></span>
<?
	$__stmcntnt=mysql_query("select * from menu_items where iparent=$__iid and mid=9 and ivisible='y' order by iorder");
	$__stmc=mysql_numrows($__stmcntnt);
	if($__stmc>0) {
?>
                            <ul class="nav-full__list">
<?
	//
		for ($si=0;$si<$__stmc;$si++) {
			$__sinote = mysql_result($__stmcntnt,$si,"inote");
			$__siname = mysql_result($__stmcntnt,$si,"iname");
			$__sitext = mysql_result($__stmcntnt,$si,"itext");
			$__silink = mysql_result($__stmcntnt,$si,"ilink");
			$__siid = mysql_result($__stmcntnt,$si,"iid");
			$__sipic = mysql_result($__stmcntnt,$si,"ipic");
			//
		
?>                                      
                                <li><a href="<?=$__silink?>"><?=$__sitext?></a></li>
<?
		}
?>		
                            </ul>
<?
	}
?>
			</li>
<?
	}
?>
</div>