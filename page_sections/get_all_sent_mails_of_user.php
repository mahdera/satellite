<?php
	require_once '../core/init.php';
	$userId = $_GET['uId'];
	$data = array();

	$mail = new Mail();
	$sentMailList = $mail->getAllMailsFrom($userId);

	if($sentMailList->count()){	
		$data = $sentMailList->getResults();
		$data['success'] = true;
	}
	
	echo json_encode($data);
?>