<?php
	session_start();
	$removeindex = $_GET['rem'];
	$xml = new DOMDocument;
	$xml->formatOutput = true;
	$xml->preserveWhiteSpace = false;
	$xml->Load('cart.xml');
	$cart=$xml->getElementsByTagName('product')->item(0);
	$item=$cart->getElementsByTagName('products');
for($y=0;$y<$item->length;$y++){
	if($removeindex==$item[$y]->getElementsByTagName('title')->item(0)->nodeValue){
    $cart->removeChild($item[$y]);

	$test = $xml->Save('cart.xml');
	
	$message = "Successfully Removed!";
	header("location:cart.php");
}
}
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	//$redirect='cart.php';
	
	//echo "<script type='text/javascript'>window.location = '$redirect';</script>";
?>