<?php
	
	$token = 'bot token';
	$chat_id = 'receiver chat id';
	$website = "https://yande.re/post.json?tags=tamamo_no_mae&limit=1";
	
	$getdata = file_get_contents($website);
	$dataarray = json_decode($getdata, TRUE);
	$sample_url = $dataarray[0]['sample_url'];
	$source_url = $dataarray[0]['source'];
	$pic_id = &$dataarray[0]['id'];
	
	$website = "https://api.telegram.org/bot{$token}/sendPhoto?chat_id={$chat_id}&photo={$sample_url}";
	$update = file_get_contents($website);
	$updatearray = json_decode($update, TRUE);
	if ((bool)$updatearray["ok"]){
	echo '<br>[  OK  ]';
	} else{
	echo '<br>[ Fail ]';
	}
	$msg = '<a href="https://yande.re/post/show/';
	$msg .= $pic_id;
	$msg .= '">みこーん！</a>';
	$website = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=HTML&text={$msg}&disable_web_page_preview=1&disable_notification=1";
	$update = file_get_contents($website);
	$updatearray = json_decode($update, TRUE);
	if ((bool)$updatearray["ok"]){
	echo '<br>[  OK  ]';
	} else{
	echo '<br>[ Fail ]';
	}
	
?>
