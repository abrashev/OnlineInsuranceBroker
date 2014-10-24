<?php
session_start();
if(isset($_SESSION['php_username'])){

	header("Location: main.php");
}
if (isset($_REQUEST['mytoken'])){
	//echo 'good';
	$_SESSION['PHP_AUTH_TOKEN']=$_REQUEST['mytoken'];
 	header("Location: index.php");
}

function auth(){
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
  //exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
}
}

 //echo '<br /><p>'.$_REQUEST["email"].'</p>';
 //http_request (HTTP_METH_PUT, 'www.example.com');
 //auth();
 //userLogin();
?>
<!DOCTYPE html>
<html>
<head>

<title>Insurance Broker System - Login</title>
<link href="css/style.css" media="all" rel="stylesheet" />
<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="shortcut icon" href="favicon.png" />
<script src="javascript/jquery-1.10.2.js"></script>
<script src="javascript/jquery-ui.js"></script>
<script type="text/javascript" src="javascript/scripts.js"></script>

</head>
<body>

<?php
/*if(isset($_POST['email'])){
	print_r($_POST);
	//header("Location: main.php");

//using Curl
$url = 'http://127.0.0.1:3000/session';
$postData = array();
$postData['password'] = $_POST['password'];
$postData['email'] = $_POST['email'];
$postData['format'] = 'html';
$postData['commit'] ='Login';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$result1 = curl_exec($ch);
curl_close($ch);
echo $result1;
}*/
/*The following works:
$url = 'http://127.0.0.1:3000/session';
$auth = base64_encode('admin@abv.bg:taliesin');
$header = array("Authorization: Basic $auth");
$opts = array( 'http' => array ('method'=>'POST','header'=>$header));//GET
$ctx = stream_context_create($opts);
$what =file_get_contents($url,false,$ctx);
*/

?>
<div class="header">
     
</div>
<div class="content">
<noscript><h3>Javascript is turned off. It must be on if you want to use the page</h3></noscript>
 <a href="register.php" class="btn btn-default">Register</a>
<?php if(isset($_REQUEST['badlogin']))   echo '<h4>You entered wrong credentials</h4>';?>
<h3>Login</h3>
<form accept-charset="UTF-8" action="connect.php" method="post" id="login-form"><input name="utf8" type="hidden" value="&#x2713;" />

  <div>
    <label for="email">Email</label><br />
    <input autofocus="autofocus" id="email" name="email" type="text" />
  </div>
  <div>
    <label for="password">Password</label><br />
    <input id="password" name="password" type="password" /><br /><br />
  </div>
  <div>
    <input name="commit" type="button" onClick="validateLogin();" value="Log in"
    class="btn btn-default" />
  
  </div>
</form>
<br />


</div>

</body>
</html>