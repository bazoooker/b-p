<?
include ("../connect.php");
$db->query("insert into guestbook (glink, ginner, gobj, gcity, gmark,gmessage, ganswer, ganswername, gname, gmail, gphone, gvisible, gdate, ghome) values ('$glink','$ginner', '$gobj', '$gcity', '$gmark','$gmessage', '$ganswer', '$ganswername', '$gname', '$gmail', '$gphone', '$gvisible', '$gdate', '$ghome')");
$url="$sitepath$apppath$adminscr?object=guestbook&action=list";

$gid=$db->last_insert_id();

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





Header("Location: $url");
?>
