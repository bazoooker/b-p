<?
include ("../connect.php");
$db->query("delete from guestbook where gid=$gid");
$url="$sitepath$apppath$adminscr?object=guestbook&action=list";
Header("Location: $url");
?>

