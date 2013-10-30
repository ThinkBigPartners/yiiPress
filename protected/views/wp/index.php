<?php
ob_start();
	wp();
	require_once( ABSPATH . WPINC . '/template-loader.php' );
	$content = ob_get_contents();
ob_end_clean();

echo $this->insertWPClips($content);
?>