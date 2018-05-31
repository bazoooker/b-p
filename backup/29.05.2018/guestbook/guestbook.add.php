
<center>
<script language=javascript src="/common/javascript/checks.js">
</script>
<script language=javascript>
//
var fnames = new Array('gfullname', 'gphone', 'gmail', 'groom', 'gcity',  'gmessage');
var fvalues = new Array('text','text','email','text','text','text');
var ffields = new Array('Ваше имя', 'Телефон', 'E-mail', 'Номер комнаты', 'Дата проживания', 'Сообщение');
//
</script>
<style>
.nv {display:none}
</style>
<form name=f1 action=/guestbook/submit.php method=post class="usual"  onSubmit="return cf($(this), fnames, fvalues, ffields);">
	<h3 id=guesthead>Оставьте свой отзыв</h3>
	<select name=gobj class=nv>
<?
	reset($globals);
	while(list($k,$v)=each($globals)) {
		if($k<9) {
?>
				<option <?=($k==$gobj)?"selected":""?> value=<?=$k?>><?=$v?>
<?
		}
	}
?>
	</select>

	<div class="formgroup nv">
		<label for=gname>Ваше имя <font color=red>*</font></label>
		<input type=text name=gname style="width:95%">
	</div>

	<div class=formgroup>
		<label for=gfullname>Ф.И.О. <font color=red>*</font></label>
		<input type=text name=gfullname>
		<div class=clear></div>
	</div>
	<div class=formgroup>
		<label for=gphone>Телефон <font color=red>*</font></label>
		<input type=text name=gphone>
		<div class=clear></div>
	</div>	
	<div class=formgroup>
		<label for=gmail>E-mail <font color=red>*</font></label>
		<input type=text name=gmail>
		<div class=clear></div>
	</div>
	<div class=formgroup>
		<label for=groom>№ комнаты <font color=red>*</font></label>
		<input type=text name=groom>
		<div class=clear></div>
	</div>
	<div class=formgroup>
		<label for=gcity>Дата проживания <font color=red>*</font></label>
		<input type=text name=gcity>
		<div class=clear></div>
	</div>
	<div class=formgroup>
		<label for=gmessage>Сообщение <font color=red>*</font></label>
		<textarea name=gmessage  rows=5></textarea>
		<div class=clear></div>
    	</div>
	<div class=buttongroup>
		<input type=submit value="Добавить свой отзыв" class="btn btn_gradient" id=guestbookbutt>
		<input type=hidden name=action value="submit">
		<input type=hidden name=zh value="n" id=zh>
	</div>
</form>
<div class=hr></div>