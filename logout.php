<?php
session_start();
session_destroy();

//document.location.href="index.php?chlang='.$sesia.'";
if(isset($_REQUEST['badlogin'])){
header("Location: index.php?badlogin=true");
}else{
	/*$url = 'https://127.0.0.1:3001/session';
$postData = array();
/*$postData['password'] = $_POST['password'];
$postData['email'] = $_POST['email'];
//$postData['format'] = 'json';

$postData['authenticity_token']=$_SESSION['php_token'];
$postData['_method'] = 'delete';
//$postData['submit'] ='Logout';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$result1 = curl_exec($ch);
curl_close($ch);
echo $result1;*/
	 header("Location: index.php");
}
?>