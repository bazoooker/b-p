<?
@header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");              // Date in the past
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  // always modified
@header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
@header("Cache-Control: post-check=0, pre-check=0", false);
@header("Pragma: no-cache");                                    // HTTP/1.0
@header("Cache-control: private");                          // <= it's magical!!
@header("Content-type: text/html; charset=windows-1251");                          // 'application/msword' or 'application/octet-stream'
?>
<?
	$__alert_me="";
	if($_COOKIE['alert']) {
		setcookie("alert","", time() + 3600, "/");
		$__alert_me=$_COOKIE['alert'];
	}
	$__acmi=$_COOKIE['admcurrentmenuitem']?$_COOKIE['admcurrentmenuitem']:$_REQUEST['admcurrentmenuitem'];
	//
?>
<html>
	<head>
		<title><?=$HTTP_HOST?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
		<meta http-equiv="pragma" content="no-cache">
		<meta http-equiv="cache-control" content="no-cache">
		<script type="text/javascript" src="/common/tinymce4/js/tinymce/tinymce.min.js"></script>
		<style>
			.sitetitle  {color:white; Font: 400 20px arial; font-weight:normal;text-align:left; text-decoration:none}
			.white {color:white;text-decoration:none}
 td{text-decoration:none;font-family:arial;font-size:13px;}
 td.pseudoform {text-decoration:none;font-family:arial;font-size:13px; border:solid 1px #cccccc}
 body,p,li{text-decoration:none;font-family:arial;font-size:13px;color:black;}
 h1 {text-decoration:none;font-family:arial;font-size:30px;font-weight:normal;color:#003044;}
 h1 a {text-decoration:none;font-family:arial;font-size:30px;font-weight:normal;color:#003044;}
 h2 {text-decoration:none;font-family:arial;font-size:20px;font-weight:bold;color:#003044;}
 h2 a {text-decoration:none;font-family:arial;font-size:20px;font-weight:bold;color:#003044;}
 h3 {text-decoration:none;font-family:arial;font-size:13px;font-weight:bold;color:#003044;}
 h3 a {text-decoration:none;font-family:arial;font-size:13px;font-weight:bold;color:#003044;}
 a {text-decoration: none; color:#000000; font-family: arial,verdana, monospace;font-size:13px;}
 a.nav {text-decoration: none; color:white; font-family: arial,verdana, monospace;font-size:13px; font-weight:normal;}
 a.nav:hover {text-decoration: none; color:orange; font-family: arial,verdana, monospace;font-size:13px;  font-weight:normal;}
 a.subnav {text-decoration: none; color:white; font-family: arial,verdana, monospace;font-size:12px;}
 a.subnav:hover {text-decoration: none; color:orange; font-family: arial,verdana, monospace;font-size:12px;}
 .thead{background-color:#387089;text-decoration:none;font-family:arial;font-size:12px;color:white;font-weight:bold;}
 .tbody{background-color:#ffffff;text-decoration:none;font-family:arial;font-size:12px;font-weight:normal;}
 .tbodyd{background-color:#ffffff;text-decoration:none;font-family:arial;font-size:12px;font-weight:normal;border-bottom:dotted 1px #99ccff;}
 .tusbodyd{background-color:#ffffff;text-decoration:none;font-family:arial;font-size:12px;font-weight:normal;border-top:solid 1px #ddeeff;}
 .popuptd{line-height:17px;}
select,input,textarea {text-decoration: none; color:#000000; font-family: arial,verdana, monospace;font-size:13px;background-color:#ffffff;
border:1px solid #aaa;
padding:5px;
	box-sizing:border-box;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}
 .butt{background-color:#387089;text-decoration:none;font-family:arial;font-size:13px;color:white;font-weight:bold;
border:1px solid #aaa;
padding:5px 30px;;
	box-sizing:border-box;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;}

		</style>
	</head>
	<script>
	 function setAdmMenuCookie(value) {
		var curCookie = "admcurrentmenuitem=" + escape(value)+";path=/";
		document.cookie = curCookie;
	 }
	</script>
	<body bgcolor="#FFFFFF" style="margin:0px;padding:0px">
		<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
			        <td width=206 background="/common/images/admin/admintop.jpg" style="background-repeat:no-repeat; background-position: 0% 0%">&nbsp;
			        </td>
				<td height=104 bgcolor="#356E87" background="/common/images/admin/admintop.jpg" style="background-repeat:no-repeat; background-position: -206px 0px">
<?
	$content=$db->query("select * from users_items where ilogin='$__admin_ident'");
	$__iname = $db->result($content,0,"iname");
?>
					<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td><img src=/common/images/admin/ico_home.png></td>
							<td width=100%><a  class=sitetitle href=/><?=$HTTP_HOST?></a></td>
							<td><img src=/common/images/admin/ico_user.png></td>
							<td nowrap><span class=white><?=$__iname?></span></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><img src=/common/images/admin/ico_exit.png></td>
							<td><a href=/common/auth/logout.php><span class=white>Выход</span></a></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td bgcolor=#156485 valign=top height=100%>
					<table border=0 cellspacing=0 cellpadding=0 width=206>

<?
	$__acontent=$db->query("select distinct o.* from users_items i, users_belongs b, users_rights r, users_groups g, users_objects o where o.oprimary='y' and i.ilogin='$__admin_ident' and i.iid=b.iid and b.gid=g.gid and g.gid=r.gid and r.oid=o.oid and r.tid=1 order by o.oorder, o.oid");
	$__amc=mysql_numrows($__acontent);
	//
	for ($is=0;$is<$__amc;$is++) {
		$__atext = mysql_result($__acontent,$is,"omenu");
		$__alink = mysql_result($__acontent,$is,"olink");
		$__aiid = mysql_result($__acontent,$is,"oid");
		$__aicon = mysql_result($__acontent,$is,"oicon");
		$__ascontent=$db->query("SELECT o.* FROM users_objects o where o.oparent=$__aiid order by o.oorder, o.oid");
		$__asmc=mysql_numrows($__ascontent);
?>
						
						
						<tr>
							<td background="/common/images/admin/adminmenu1.jpg" height="36">
								<div style="float:left;margin-left:10px"><img src="/common/images/admin/<?=$__aicon?>"></div><div style="float:left;margin-left:5px;padding-top:3px"><a class=nav onClick="setAdmMenuCookie(<? echo $__aiid;?>);<? echo ($__alink=="#"?"location.reload()":"");?>" href="<? echo $__alink;?>"><? echo $__atext;?></a></div>



<?
	$__ascontent=$db->query("SELECT o.* FROM users_objects o where o.oparent=$__aiid order by o.oorder, o.oid");
	$__asmc=mysql_numrows($__ascontent);
	if($__aiid==$__acmi&&$__asmc>0) {
?>
<div style="clear:both"></div>
<div style="background-color:#0F4F6A;width:166px;padding-left:40px;padding-bottom:10px">
<?
		//
		for ($js=0;$js<$__asmc;$js++) {
			$__atext = mysql_result($__ascontent,$js,"omenu");
			$__alink = mysql_result($__ascontent,$js,"olink");
			$__aiid = mysql_result($__ascontent,$js,"oid");
?>
		<a class=subnav style="display:block" href="<? echo $__alink;?>"><? echo $__atext;?></a>
<? 
		}
?>
</div>
<?
	}
?>












							</td>
						</tr>
<?
	}
?>
						
						
						
						
						
						<tr>
							<td><img id="adminsecond" src="/common/images/admin/adminsecond.jpg" width="206" height="11" alt="" /></td>
						</tr>
<?
	$__acontent=$db->query("select distinct o.* from users_items i, users_belongs b, users_rights r, users_groups g, users_objects o where o.oprimary<>'y' and i.ilogin='$__admin_ident' and i.iid=b.iid and b.gid=g.gid and g.gid=r.gid and r.oid=o.oid and r.tid=1 order by o.oorder, o.oid");
	$__amc=mysql_numrows($__acontent);
	//
	for ($is=0;$is<$__amc;$is++) {
		$__atext = mysql_result($__acontent,$is,"omenu");
		$__alink = mysql_result($__acontent,$is,"olink");
		$__aicon = mysql_result($__acontent,$is,"oicon");
		$__aiid = mysql_result($__acontent,$is,"oid");
		$__ascontent=$db->query("SELECT o.* FROM users_objects o where o.oparent=$__aiid order by o.oorder, o.oid");
		$__asmc=mysql_numrows($__ascontent);
?>
 						<tr>
							<td background="/common/images/admin/adminmenu2.jpg" height="36">
								<div style="float:left;margin-left:10px"><img src="/common/images/admin/<?=$__aicon?>"></div><div style="float:left;margin-left:5px;padding-top:3px"><a class=nav onClick="setAdmMenuCookie(<? echo $__aiid;?>);<? echo ($__alink=="#"?"location.reload()":"");?>" href="<? echo $__alink;?>"><? echo $__atext;?></a></div>

<?
	$__ascontent=$db->query("SELECT o.* FROM users_objects o where o.oparent=$__aiid order by o.oorder, o.oid");
	$__asmc=mysql_numrows($__ascontent);
	if($__aiid==$__acmi&&$__asmc>0) {
?>
<div style="clear:both"></div>
<div style="background-color:#186889;width:166px;padding-left:40px;padding-bottom:10px">
<?
		//
		for ($js=0;$js<$__asmc;$js++) {
			$__atext = mysql_result($__ascontent,$js,"omenu");
			$__alink = mysql_result($__ascontent,$js,"olink");
			$__aiid = mysql_result($__ascontent,$js,"oid");
?>
		<a class=subnav style="display:block" href="<? echo $__alink;?>"><? echo $__atext;?></a>
<? 
		}
?>
</div>
<?
	}
?>
							</td>
						</tr>
<?
	}
?>





					</table>
					<img src="/common/images/admin/spacer.gif" width=206 height=1>

				</td>
				<td height="100%" width=100% valign=top>
					<table border=0 cellspacing=0 cellpadding=20 width=100%>
						<tr>
							<td>



