<?php 
require_once '../../../wp-load.php';
	$price = $_GET['filler'];

	$url = home_url();
	wp_redirect( home_url().'?price='.$price);
?>