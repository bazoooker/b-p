<? include ("../includes/header.php"); ?>
<h1>������</h1>
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
			mysql_query("insert into guestbook (gdate, gname, gobj, gphone, gmail, gcity, groom, gmessage, gvisible) values (now(), '������ - $gfullname', '$gobj', '$gphone', '$gmail', '$gcity', '$groom', '$gmessage', 'n')",$__gb_conn);
		} else {
			mysql_query("insert into guestbook (gdate, gname, gobj, gphone, gmail, gcity, groom, gmessage, gvisible) values (now(), '$gfullname', '$gobj', '$gphone', '$gmail', '$gcity', '$groom', '$gmessage', 'n')",$__gb_conn);
		}
		mysql_select_db($sqldatabase,$__gb_conn);
		$body="";
		$body.=$gfullname?"���: $gfullname\n":"";
		$body.=$gphone?"���.: $gphone\n":"";
		$body.=$gmail?"E-mail: $gmail\n":"";
		$body.=$gobj?("���������: ".$globals[$gobj]."\n"):"";
		$body.=$groom?"�����: $groom\n":"";
		$body.=$gcity?"������ ����������: $gcity\n":"";
		$body.=$gmessage?"�����: $gmessage\n":"";
		$body.="����: ".date("d/m/Y")."\n\n--";
		$headers = "From: ROBOT <webmaster@".$HTTP_HOST.">\r\n";
		$headers .= "Content-type: text/plain; charset=windows-1251\r\n\r\n";
		if($_REQUEST['zh']=='y') {
			@mail($globalemails[$gobj], "������ � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("andrey@e1media.ru", "������ � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("kurortbelokurikha@gmail.com", "������ � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("blog@belokurikha.ru", "������ � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);

?>
<p>
������� �� ��, ��� ������� ��� �����! ���� ��������� ����� ����������� � ��������� �����.
</p>
<ul>
<li><a href=/guestbook/>� ��������� �������</a>
</ul>
<?
		} else {
			@mail("kurortbelokurikha@gmail.com", "����� � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("andrey@e1media.ru", "����� � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail("blog@belokurikha.ru", "����� � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
			@mail($globalemails[$gobj], "����� � ����� www.katun-san.ru - ". $globals[$gobj], $body, $headers);
?>
<p>
��������� �����! ��� ����� ��������� �� ���������. ���������� ��� �� ������������!
</p>
<ul>
<li><a href=/guestbook/>� ��������� �������</a>
</ul>
<?
		}
	
	}
?>
<? include ("../includes/footer.php"); ?>
