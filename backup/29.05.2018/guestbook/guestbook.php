<?  
 //
 include_once("../guestbook/guestbook.cfg");
 include_once("../common/config/common.cfg");
 include_once("../common/abstract/mysql.abstract");
 include_once("../common/functions/parse.functions");
 include_once("../common/functions/internal.functions");
 //
 $db = new MySQL;
 if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}
 //
?>
<?  
 $uri=$REQUEST_URI;
 //
 $pieces = explode ("/", $uri);
 $parts = array();
 //
 if($pieces[2]) $gobj=$pieces[2];
	else $gobj=9;
	

 include_once("../includes/header.php"); 
 $db->query("use $maindatabase");
 //
if($_SERVER['QUERY_STRING']=='add') {
?>
<script>
	$(document).ready(function(){
		$('.guestbookadd').show('fast');$('.gbutt2').fadeTo('fast',0.2);$(this).fadeTo('fast',1);$('#guestbookbutt').val('Добавить свой отзыв').css('background-color','#2c3251');$('#zh').val('n');$('#guesthead').text('Оставьте свой отзыв');		
	});
</script>
<?
}
?>

<div class="container">
<h1>Отзывы</h1>

<table class="guestbook-switch h-section-margin" border=0 width=100% cellspacing=10>
	<tr>
<?
	$o=0;
	while(list($k,$v)=each($globals)) {
	if($k<5){
	$o++;
?>
		<td valign=top width=33% id="gobj<?=$o?>" align=center class="<?=($gobj==$k)?"activegobj":""?>">
			<a style="text-decoration:none;" href=/guestbook/<?=$k?>/>
				<table border=0 style="<?=($gobj==$k)?"background-color:".$globcolors[$k]:""?>" cellpadding=4 cellspacing=0>
					<tr>
						<td style="<?=($gobj==$k)?"background-color:".$globcolors[$k]:""?>">
							<img src="<?=$globpics[$k]?>" width=100%>
						</td>
					</tr>
					<tr>
						<td align=center style="color:<?=($gobj==$k)?"white":$globcolors[$k]?>;font-weight:bold;<?=($gobj==$k)?"background-color:".$globcolors[$k]:""?>">
							<?=$globalnames[$k]?>
						</td>
					</tr>
				</table>
				<!-- center>
					<? if($gobj==$k){?><img src="/img/gb-arr-<?=$k?>.png"><?}?>
				</center -->
			</a>
		</td>
<?
	}}
?>
	</tr>
</table>


<div class="h-section-margin">
<center>
	<a style="diSPLAY:inline-block;margin:0 20px 0 auto;" href="javascript:" onClick="$('.guestbookadd').show('fast');$('.gbutt2').fadeTo('fast',1);$('.gbutt2').css('cursor','pointer');$(this).fadeTo('fast',0.5);$(this).css('cursor','default');$('#guestbookbutt').val('Добавить свой отзыв').css('background-color','#46c276');$('#zh').val('n');$('#guesthead').text('Оставьте свой отзыв')" class="gbutt1 btn buttonup hover_overlay-left">Оставить отзыв</a>
	<a style="diSPLAY:inline-block;margin:0 20px 0 auto;color:#aa092e !important;box-sizing:border-box" href="javascript:" onClick="$('.guestbookadd').show('fast');$('.gbutt1').fadeTo('fast',1);$('.gbutt1').css('cursor','pointer');$(this).fadeTo('fast',0.5);$(this).css('cursor','default');$('#guestbookbutt').val('Пожаловаться').css('background-color','red');$('#zh').val('y');$('#guesthead').text('Оставьте свою жалобу')" class="gbutt2 btn buttonred hover_overlay-left">Пожаловаться</a>
</center>
</div>
<div class=clear></div>

<div class=guestbookadd style="display:none;">
<?
	include($DOCUMENT_ROOT."/guestbook/guestbook.add.php");
?>
</div>

<?
	$page=$pageno;  
	$from=$msgsperpage*$page;
	$to=$msgsperpage*($page+1);
	$content=$db->query("select *,date_format(gdate,'$dtformat') as gdatef from guestbook where gvisible='y' and gobj=$gobj order by gdate desc");
	$totalcount=$db->numrows($content);
	//
	$content=$db->query("select *,date_format(gdate,'$dtformat') as gdatef from guestbook where gvisible='y' and gobj=$gobj order by gdate desc limit $from, $msgsperpage");
	$count=$db->numrows($content);
?>
<script>
totalcount=<?=$totalcount?>;
</script>
<ul class="grid effect-1 feedback-list" id="grid">
				<li class="guestbookli-sizer"></li>

<?
	for($i=0;$i<$count;$i++) {
		$gb=$db->fetchrow($content,$i);
		include($DOCUMENT_ROOT."/guestbook/__listguestbook.php");
	}
?>
</ul>
<div class=clear></div>
<div class="clear"></div>
<div id=ajaxLoader></div>
<div class="clear"></div>


</div>


<script>
$(document).ready(function(){
	/// масонри
	$('#grid').masonry({
	// options
	itemSelector: '.guestbookli',
	columnWidth: '.guestbookli-sizer',
	percentPosition: true
	});

	//
	if($('ul#grid').length>0){
	var $nextPageToLoad = 1;
	var $pagesCnt = parseInt(Math.ceil(totalcount/30));
	var $canAddItems = ($pagesCnt > 1);
	var $url = '/guestbook/__guestbook_ajax.php?pageno=';
	$(window).bind('scroll', function() {
                if (!$canAddItems) { return; }
                if ($(document).height() - $(document).scrollTop() - $(window).height() < $(window).height()/2) {
			$('#ajaxLoader').show();

//			alert('start');
			$canAddItems = false;
			$.post($url + $nextPageToLoad, function(data) {
//				alert(data);
				var $data = $( data);
				$('#grid').append($data).masonry('appended', $data);
				$canAddItems = ($pagesCnt > $nextPageToLoad);
				$nextPageToLoad++;
				$('#ajaxLoader').hide();
			});
		}

	});
	}
});


</script>
<?
 $db->query("use $sqldatabase");
?>
<? include_once("../includes/footer.php"); ?>
