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
<meta charset="utf-8">
<title>Insurance Broker System - Register</title>

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
<a href="index.php" class="btn btn-default">Login</a>
<noscript><h3>Javascript is turned off. It must be on if you want to use the page</h3></noscript>
 <h1>Sign up as a new user</h1>

<form accept-charset="UTF-8" action="" class="new_user" enctype="multipart/form-data" id="new_user" method="post">
<div style="margin:0;padding:0;display:inline">
<input name="utf8" value="&#x2713;" type="hidden"></div>
<input name="new_user" value="new" type="hidden">
<div>
    <b><label for="user_title">Title</label></b><br />

	<select id="user_title" name="user[title]"> 
    <option value="Mr" selected="selected">Mr</option>
	<option value="Mrs">Mrs</option>
	<option value="Miss">Miss</option>
	<option value="Ms">Ms</option>
	<option value="Doctor">Doctor</option>
	<option value="Captain">Captain</option>
	<option value="Duchess">Duchess</option>
	<option value="Duke">Duke</option>
	<option value="Father">Father</option>
	<option value="General">General</option>
	<option value="Lady">Lady</option>
	<option value="Lord">Lord</option>
	<option value="Lieutenant">Lieutenant</option>
	<option value="Lieutenant Colonel">Lieutenant Colonel</option>
	<option value="Major">Major</option>
	<option value="Master">Master</option>
	<option value="Professor">Professor</option>
	<option value="Reverend">Reverend</option>
	<option value="Sir">Sir</option>
	<option value="Squire">Squire</option>
	<option value="Squadron Leader">Squadron Leader</option></select>
  <br />
      <b><label for="user_firstname">First name</label></b><br>
      <input autofocus="autofocus" id="user_firstname" name="user[firstname]" type="text">
      <br><br>
  
    <div>
      <b><label for="user_surname">Surname</label></b><br>
      <input id="user_surname" name="user[surname]" type="text">
      <br><br>
    </div>

    <div>
      <b><label for="user_phone">Phone</label></b><br>
      <input id="user_phone" name="user[phone]" type="tel">
      <br><br>
    </div>
 
  <div>
      <b><label for="user_dateofbirth">Date of Birth</label></b><br>
     <select id="user_dateofbirth_1i" name="user[dateofbirth(1i)]">
<option value="1935">1935</option>
<option value="1936">1936</option>
<option value="1937">1937</option>
<option value="1938">1938</option>
<option value="1939">1939</option>
<option value="1940">1940</option>
<option value="1941">1941</option>
<option value="1942">1942</option>
<option value="1943">1943</option>
<option value="1944">1944</option>
<option value="1945">1945</option>
<option value="1946">1946</option>
<option value="1947">1947</option>
<option value="1948">1948</option>
<option value="1949">1949</option>
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
</select>
<select id="user_dateofbirth_2i" name="user[dateofbirth(2i)]">
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option selected="selected" value="12">December</option>
</select>
<select id="user_dateofbirth_3i" name="user[dateofbirth(3i)]">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option selected="selected" value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

      <br><br>
    </div>
	
	 <div>
      <input checked="checked" id="licencetype_t" name="licencetype" value="t" type="radio">
<label for="licencetype_t">Full</label>
<input id="licencetype_f" name="licencetype" value="f" type="radio">
<label for="licencetype_f">Provisional</label>
      <br><br>
    </div>
	
	 <div>
      <b><label for="user_licenceperiod">Licence Period</label></b><br>
	   <select id="user_licenceperiod" name="user[licenceperiod]"><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>

<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
<option value="61">61</option>
<option value="62">62</option>
<option value="63">63</option>
<option value="64">64</option>
<option value="65">65</option>
<option value="66">66</option>
<option value="67">67</option>
<option value="68">68</option>
<option value="69">69</option>
<option value="70">70</option>
<option value="71">71</option>
<option value="72">72</option>
<option value="73">73</option>
<option value="74">74</option>
<option value="75">75</option>
<option value="76">76</option>
<option value="77">77</option>
<option value="78">78</option>
<option value="79">79</option>
<option value="80">80</option></select>years
      <br><br>
    </div>
 
  <div>
      <b><label for="user_occupation_id">Occupation</label></b><br>
	    <select id="user_occupation_id" name="user[occupation_id]"><option selected="selected" value="1">Academic</option>
<option value="2">Actor</option>
<option value="3">Artist</option>
<option value="4">Doctor</option>
<option value="5">Librarian</option>
<option value="6">Student</option>
<option value="7">Accountant</option>
<option value="8">Architect</option>
<option value="9">Dentist</option>
<option value="10">Economists</option>
<option value="11">Writer</option>
<option value="12">Engineer</option>
<option value="13">Lawyer</option>
<option value="14">Nurse</option>
<option value="15">Pharmacist</option>
<option value="16">Physician</option>
<option value="17">Physiotherapist</option>
<option value="18">Psychologist</option>
<option value="19">Scientist</option>
<option value="20">Social worker</option>
<option value="21">Statistician</option>
<option value="22">Surgeon</option>
<option value="23">Teacher</option>
<option value="24">Math Professor</option>
<option value="25">Bank Examiner</option>
<option value="26">Museum Curator</option>
<option value="27">Casino Dealer</option>
</select>
      <br><br>
    </div>
	
	</div>
	<div>
 Incidents:<select id="numincidents" onChange="addIncidents(this.value);"><option value="0" selected="selected">None</option>
		<option value="1">1</option><option value="2">2</option>
		</select>
	</div>
	<div id="divincidents"></div>
	<div class="newadd">
	  
		<strong>Address</strong>
        <div>
          <b><label for="user_address_attributes_street">Street</label></b><br>
          <input id="user_address_attributes_street" name="user[address_attributes][street]" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_city">City</label></b><br>
          <input id="user_address_attributes_city" name="user[address_attributes][city]" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_county">County</label></b><br>
          <input id="user_address_attributes_county" name="user[address_attributes][county]" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_postcode">Post code</label></b><br>
          <input id="user_address_attributes_postcode"  placeholder="sy24 5be" name="user[address_attributes][postcode]" type="text">
          <br><br>
        </div>
		 </div>
		 
		 <div class="newadd">
    
        <div>
          <b><label for="user_user_detail_attributes_email">Email</label></b><br>
          <input id="user_user_detail_attributes_email" placeholder="youremail@abv.bg" name="user[user_detail_attributes][email]" type="email">
          <br><br>
        </div>
        <div>
          <b><label for="user_user_detail_attributes_password">Password</label></b><br>
          <input id="user_user_detail_attributes_password" name="user[user_detail_attributes][password]" type="password">
          <br><br>
        </div>
        <div>
          <b><label for="password_confirmation">Confirm password</label></b><br>
          <input id="user_user_detail_attributes_password_confirmation" name="user[user_detail_attributes][password_confirmation]" type="password">
          <br><br>
        </div>
   	<input type="reset" id="resetform" value="Reset" class="btn btn-default">
	    <input name="commit" value="Create" type="submit" onClick="validateReg();return false;"
       class="btn btn-default">
	
	</div></form>
   
    </div>

</body>
</html>