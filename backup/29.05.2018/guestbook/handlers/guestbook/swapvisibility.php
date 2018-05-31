<?
     require("../connect.php");
     //
     $db->query("update guestbook set gvisible='$gvisible' where gid=$gid");
     $url="$sitepath$apppath$adminscr?object=guestbook&action=list&page=$page";
     Header("Location: $url");
?>
