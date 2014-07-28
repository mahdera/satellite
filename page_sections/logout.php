<?php
	require_once '../core/init.php';

	$user = new User();
	$user->logout();

	header("Location: index.php");
?>
<script type="text/javascript">
	window.location.href = "index.php";
</script>
