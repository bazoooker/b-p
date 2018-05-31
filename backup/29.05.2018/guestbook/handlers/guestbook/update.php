<?
include ("../connect.php");
$db->query("update guestbook set ginner='$ginner',glink='$glink', gobj='$gobj', gmark='$gmark', gcity='$gcity', gdate='$gdate', gmessage='$gmessage', ganswer='$ganswer', ganswername='$ganswername', gname='$gname', gmail='$gmail', gvisible='$gvisible', ghome='$ghome' where gid=$gid");




		if(is_uploaded_file($_FILES['gfile']['tmp_name'])) {
			$r=$temppath.md5 (uniqid (rand()));
			//
			move_uploaded_file($_FILES['gfile']['tmp_name'], $r);		

			$fp = fopen($r,"rb");
			$dcontent = fread($fp, filesize($r));
			$dcontent = addslashes($dcontent);
			fclose($fp);
			//
			$db->query("update guestbook set gfile='$dcontent' where gid=$gid");
		}


$url="$sitepath$apppath$adminscr?object=guestbook&action=list";
Header("Location: $url");
?>
