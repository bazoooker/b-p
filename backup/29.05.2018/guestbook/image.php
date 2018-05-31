<?
	require("../common/functions/internal.functions");
	require("../common/functions/parse.functions");
	require("../common/abstract/mysql.abstract");
	//
	require("../common/config/common.cfg");
	require("guestbook.cfg");
	//
	$db = new MySQL;
	if(!$db->init($sqldatabase,$sqluser,$sqlpassword,$sqlserver)) {exit;}
	//
	$content=$db->query("select * from guestbook where gid=$gid");
	$gfile=$db->result($content,0,"gfile");
	//
	if(!$mode) $mode="thumb";
//	$mode="thumb";
	//
	if($mode=="full") {
//		header("Content-type: image/png\nContent-length: ".strlen($gfile)."\nContent-Disposition: inline; filename=image.php?gid=".$gid);
		header("Content-Type: image/png");
		header("Content-Length: ".strlen($gfile));
		header("Content-Disposition: inline; filename=image$gid.png");
		echo $gfile;
	} else if($mode=="thumb") {
		$src = imagecreatefromstring($gfile); 

		if (!$max_width)  $max_width = 84;
		if (!$max_height) $max_height = 84;
		$width = imagesx($src);
		$height = imagesy($src);
		$x_ratio = $max_width / $width;
		$y_ratio = $max_height / $height;

		if ( ($width <= $max_width) && ($height <= $max_height) ) {
		  $tn_width = $width;
		  $tn_height = $height;
		} else if (($x_ratio * $height) < $max_height) {
		  $tn_height = ceil($x_ratio * $height);
		  $tn_width = $max_width;
		} else {
		  $tn_width = ceil($y_ratio * $width);
		  $tn_height = $max_height;
		}
		$img = imagecreatetruecolor($tn_width,$tn_height);
		ImageCopyResized($img, $src, 0, 0, 0, 0, $tn_width+1,$tn_height+1,$width,$height);
		imagepalettecopy ($img, $src);
		header("Content-type: image/jpeg");
		header("Content-Disposition: inline; filename=image.php?iid=".$iid);
		imagejpeg($img); 
		imagedestroy($img);
	}
?>