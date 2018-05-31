<? include ("../includes/header.php"); ?>
<h1>Отзывы</h1>
<?
$gmessage=strip_tags($gmessage);
$gname=strip_tags($gname);
$gmail=strip_tags($gmail);
$gphone=strip_tags($gphone);

$gobj=2;
	if ($action=="submit"&&trim($gname)=="") {
		$__gb_conn=mysql_connect($sqlserver,$sqluser,$sqlpassword);
		mysql_query("SET NAMES cp1251",$__gb_conn);
		mysql_query("SET CHARACTER SET cp1251",$__gb_conn);
		mysql_query("SET CHARACTER_SET_CLIENT=cp1251",$__gb_conn);
		mysql_query("SET CHARACTER_SET_CONNECTION=cp1251",$__gb_conn);
		mysql_query("SET CHARACTER_SET_RESULTS=cp1251",$__gb_conn);
		mysql_select_db($maindatabase,$__gb_conn);
		include($DOCUMENT_ROOT."/guestbook/guestbook.cfg");
		if($_REQUEST['zh']=='y') {
			mysql_query("insert into guestbook (gdate, gname, gobj, gphone, gmail, gcity, groom, gmessage, gvisible) values (now(), 'Жалоба - $gfullname', '$gobj', '$gphone', '$gmail', '$gcity', '$groom', '$gmessage', 'n')",$__gb_conn);
		} else {
			mysql_query("insert into guestbook (gdate, gname, gobj, gphone, gmail, gcity, groom, gmessage, gvisible) values (now(), '$gfullname', '$gobj', '$gphone', '$gmail', '$gcity', '$groom', '$gmessage', 'n')",$__gb_conn);
		}
		mysql_select_db($sqldatabase,$__gb_conn);
		$body="";
		$body.=$gfullname?"Имя: $gfullname\n":"";
		$body.=$gphone?"Тел.: $gphone\n":"";
		$body.=$gmail?"E-mail: $gmail\n":"";
		$body.=$gobj?("Санаторий: ".$globals[$gobj]."\n"):"";
		$body.=$groom?"Номер: $groom\n":"";
		$body.=$gcity?"Период проживания: $gcity\n":"";
		$body.=$gmessage?"Отзыв: $gmessage\n":"";
		$body.="Дата: ".date("d/m/Y")."\n\n--";
		$headers = "From: ROBOT <webmaster@".$HTTP_HOST.">\r\n";
		$headers .= "Content-type: text/plain; charset=windows-1251\r\n\r\n";
		if($_REQUEST['zh']=='y') {
			@mail($globalemails[$gobj], "Жалоба с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("andrey@e1media.ru", "Жалоба с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("kurortbelokurikha@gmail.com", "Жалоба с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("blog@belokurikha.ru", "Жалоба с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);

?>
<p>
Спасибо за то, что делаете нас лучше! Ваше сообщение будет рассмотрено в ближайшее время.
</p>
<ul>
<li><a href=/guestbook/>К просмотру отзывов</a>
</ul>
<?
		} else {
			@mail("kurortbelokurikha@gmail.com", "Отзыв с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("andrey@e1media.ru", "Отзыв с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("blog@belokurikha.ru", "Отзыв с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail($globalemails[$gobj], "Отзыв с сайта www.katun-san.ru - ". $globals[$gobj], $body, $headers);
?>
<p>
Уважаемый гость! Ваш отзыв находится на модерации. Благодарим Вас за неравнодушие!
</p>
<ul>
<li><a href=/guestbook/>К просмотру отзывов</a>
</ul>
<?
		}
	
	}
?>
<? include ("../includes/footer.php"); ?>
