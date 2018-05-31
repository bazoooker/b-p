			<li class=guestbookli>

                                <div class="feedback-item">
<?
	if($gb['gfile']) {
?>
                                    <div class="feedback-item__img" style="background-image: url(/guestbook/image.php?gid=<?=$gb['gid']?>&mode=full);"></div>
<?
}
?>
                                    <div class="feedback-item__text">
                                        <p class="feedback__heading"><?=$gb['gmessage']?></p>
<?
	if($gb['gname']) {
?>
                                        <p class="feedback-item__person">
	<?=$gb['gname']?>
					</p>
<?
	}
?>
<?
	if($gb['gdate']) {
?>
                                        <span class="feedback-item__date"><?=frommysqldate($gb['gdate'])?></span>
<?
	}
?>

                                    </div>
                                </div>
			</li>
