<?php
session_start();
$GLOBALS['underwriter']="127.0.0.1:3001";
//This function makes request to a specific url with data parameters,refferrer url and type of method (GET or POST)
//using fsocketopen
function post_request($url, $data, $referer='',$method) {
 
    // Convert the data array into URL Parameters like a=b&foo=bar etc.
    $data = http_build_query($data);
 
    // parse the given URL
    $url = parse_url($url);
 
    if ($url['scheme'] != 'https') { 
        die('Error: Only HTTP request are supported !');
    }
 
    // extract host and path:
    $host = $url['host'];
	$port = 3001;
    $path = $url['path'];
 
    // open a socket connection on port 80 - timeout: 30 sec
    $fp = fsockopen($host, $port, $errno, $errstr, 30);
 
    if ($fp){
 
        // send the request headers:
        fputs($fp, "$method $path HTTP/1.1\r\n");//POST
        fputs($fp, "Host: $host\r\n");
 
        if ($referer != '')
            fputs($fp, "Referer: $referer\r\n");
 
        fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fputs($fp, "Content-length: ". strlen($data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $data);
 
        $result = ''; 
        while(!feof($fp)) {
            // receive the results of the request
            $result .= fgets($fp, 128);
			//return $result;
        }
    }
    else { 
        return array(
            'status' => 'err', 
            'error' => "$errstr ($errno)"
        );
    }
 
    // close the socket connection:
    fclose($fp);
 
    // split the result header from the content
   $result = explode("\r\n\r\n", $result, 2);//explode("\r\n\r\n", $result, 2);
 
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
 
    // return as structured array:
  return array(
        'status' => 'ok',
        'header' => $header,
        'content' => $content
    );
	//return $result;
}
//RETRIEVE A QUOTE WITH YOUR IDENTIFICATION NUMBER
 function getMyQuote(){
	$user=$_SESSION['php_username'];
	$pass=$_SESSION['php_password'];
$url = "https://$user:$pass@".$GLOBALS['underwriter']."/quotations/search.json";
$data = array('q'=>$_GET['usermyquote']);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

 echo $result;
 }
 
 //GET all info about a user from in json format
function getUserInfo(){
	$user=$_SESSION['php_username'];
	$pass=$_SESSION['php_password'];
	$myid=$_SESSION['php_id'];
$url = "https://$user:$pass@".$GLOBALS['underwriter']."/users/$myid.json";
$data = array('id'=>$myid);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;
//$result=explode("",$result,2);
//echo $result;
//echo $result;
///var_dump($result);
}
 
 //FUNCTION WHICH MAKES REQUEST TO SESSIONS CONTROLLER#userlogin WITH BASIC AUTHENTICATION
function login(){
	
	$user=$_POST['email'];
	$pass=$_POST['password'];
	 //$token=$_POST['authenticity_token'];
	//'authenticity_token'=>$token,
//$url = "https://$user:$pass@".$GLOBALS['underwriter']."/session";
$url = "https://$user:$pass@".$GLOBALS['underwriter']."/login.json";
$data = array('email'=>$user,'password'=>$pass,'brokeruri'=>'https://127.0.0.1/cis-broker/main.php','format'=>'json');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//echo $result;
//var_dump($result);
if($result!="null"){
	 //echo $result;
	$obj = json_decode($result);
$_SESSION['php_id']=$obj->{'id'};
header("Location: main.php");
}else{
	header("Location: logout.php?badlogin=true");
}

}

if(isset($_POST['new_quote'])){
	if(isset($_SESSION['php_username'])){
		createQuote();	
	}
	
}

if(isset($_POST['new_user'])){
	
	registerUser();	
	
}
//Register new user-makes request to underwriter in json format
function registerUser(){
	$url = "https://".$GLOBALS['underwriter']."/users.json";
 $data =$_POST;//array('title'=>$_POST['title'],'_method'=>'patch');
//foreach ($_POST as $key => $value) array_push($data, $key=>$value);
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;
	
}

//create new quotation via request to underwriter
function createQuote(){
	$user=$_SESSION['php_username'];
	$pass=$_SESSION['php_password'];
	$myid=$_SESSION['php_id'];
$url = "https://$user:$pass@".$GLOBALS['underwriter']."/quotations.json";
 $data =$_POST;//array('title'=>$_POST['title'],'_method'=>'patch');
//foreach ($_POST as $key => $value) array_push($data, $key=>$value);
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//echo $result;
$obj = json_decode($result);
$ident=$obj->{'identification'};
	echo $ident;
}
//Make request to Update user information
function updateUser(){
	$user=$_SESSION['php_username'];
	$pass=$_SESSION['php_password'];
	$myid=$_SESSION['php_id'];
$url = "https://$user:$pass@".$GLOBALS['underwriter']."/users/$myid.json";
 $data =$_POST;//array('title'=>$_POST['title'],'_method'=>'patch');
//foreach ($_POST as $key => $value) array_push($data, $key=>$value);
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

//echo $result;
//print_r($_POST);

}

if(isset($_POST['_method']) && $_POST['_method']=='patch'){
	if(isset($_SESSION['php_username'])){
	 updateUser();
	}
}

if(isset($_GET['userinfo'])){
	if(isset($_SESSION['php_username'])){
	getUserInfo();
	}
	
}
if(isset($_GET['usermyquote'])){
	if(isset($_SESSION['php_username'])){
	getMyQuote();
	}
}
if(isset($_POST["email"])){
	//print_r($_POST);
	//session_start();
	$_SESSION['php_username']=$_POST['email'];
	$_SESSION['php_password']=$_POST['password'];
	$_SESSION['php_token']=$_POST['authenticity_token'];
	login();
}

?>