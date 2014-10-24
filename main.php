<?php
session_start();
$GLOBALS['underwriter']="https://127.0.0.1:3001";
//this returns the logged in user id from get_my_id method in UsersController in underwritter application
 function getmyid(){
	 
	 $url = $GLOBALS['underwriter']."/get_my_id.json";
$data = array('email'=>$_SESSION['php_username']);

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
//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$obj = json_decode($result);
$_SESSION['php_id']=$obj->{'id'};
//echo $obj->{'id'};
 }
 
if(!isset($_SESSION['php_username'])){

	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>

<title>Insurance Broker System</title>
<link href="css/style.css" media="all" rel="stylesheet" />
<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="shortcut icon" href="favicon.png" />
<script src="javascript/jquery-1.10.2.js"></script>
<script src="javascript/jquery-ui.js"></script>
<script type="text/javascript" src="javascript/jquery.timeago.js"></script>
<script type="text/javascript" src="javascript/scripts.js"></script>

</head>
<body onLoad="getUser()">

<noscript><h3>Javascript is turned off. It must be on if you want to use the page</h3></noscript>
<div class="header">

</div>


<div class="content">
Signed in as <h4><?php echo $_SESSION['php_username']; ?></h4>
 <form action="logout.php" class="button_to" method="post"> 
 <input type="submit" value="Log out" class="btn btn-danger" /> </form>
<div class="navigation" id="tabs">
    <ul id="menu"><li id="home"><a href="#tabs-1">Home</a></li>
    <li id="newquote"><a href="#tabs-2">Request Quotation</a></li>
     <li id="retrieve"><a href="#tabs-3" >Retrieve Quotation</a></li>
    <li id="profile"><a href="#tabs-4">Profile</a></li>
    <li id="editprofile"><a href="#tabs-5">Edit Profile</a></li>
    </ul><br />
	<div id="tabs-1">
		<h2>Broker Insurance WebPage</h2>
	</div>
    
    <div id="tabs-2">
	 
     <h2>Request a quotation</h2>
     <p id="savedidentification"></p>
<form accept-charset="UTF-8" action="" class="new_quotation" enctype="multipart/form-data" id="new_quotation" method="post">
<div style="margin:0;padding:0;display:inline">
<input name="utf8" value="✓" type="hidden"></div>
<input name="new_quote" value="newquote" type="hidden">
<p id="calculatedpremium" title="This is the Premium including the discount you have"></p>
 <div class="field">
    <label for="quotation_policyexcess">Policyexcess</label>
	 - 16% 
  </div>
  
  <div class="field">
    <label for="quotation_breakdowncover">Breakdowncover</label><br>
	 <select id="quotation_breakdowncover" name="quotation[breakdowncover]"><option value="0">No cover</option>
<option value="2" selected="selected" >Roadside</option>
<option value="3">At home</option>
<option value="4">European</option></select>
	 
  </div>
  <div class="field">
     <label for="quotation_windscreenrepair">Windscreenrepair</label><br>
	 <input id="quotation_windscreenrepair_t" name="quotation[windscreenrepair]" value="t" type="radio">
<label for="quotation_windscreenrepair_t">YES</label>
<input  id="quotation_windscreenrepair_f" name="quotation[windscreenrepair]" value="f"  checked="checked" type="radio">
<label for="quotation_windscreenrepair_f">NO</label>
	 
  </div>
  
  <div class="field" id="quotation_excess">
    <label for="quotation_excesspaid">Excesspaid</label> -
	 5%
  </div>
  
 
  <div class="field"><input id="quotation[user_id]" name="quotation[user_id]" value="<?php echo $_SESSION['php_id']; ?>" type="hidden"></div>
 <div class="newadd">
	  
	  
	  <strong>Vehicle:</strong><p>
</p><h5>Registration:<input id="quotation_vehicle_attributes_registration" name="quotation[vehicle_attributes][registration]" placeholder="Enter vehicle registration" type="text"></h5>

<h5>Annual mileage:<input id="quotation_vehicle_attributes_mileage" name="quotation[vehicle_attributes][mileage]" value=""  placeholder="Enter vehicle mileage" type="text"></h5>
<h5>Estimated value:<input id="quotation_vehicle_attributes_value" name="quotation[vehicle_attributes][value]" value="" placeholder="Enter vehicle value" type="text"></h5>
<h5>Parking Location:
<select id="quotation_vehicle_attributes_parkinglocation" name="quotation[vehicle_attributes][parkinglocation]">
<option value="">Select</option>
																	
																	<option value="Driveway">Driveway/Carport</option>
																	
																	<option value="Garage">Locked Garage</option>
																	
																	<option value="Public place">Public Place</option>
																	
																	<option value="Private property">Private Property</option>
																	
																	<option value="Road">Street/Road</option>
																	
																	<option value="Unlocked garage">Unlocked Garage</option></select>
</h5>
<h5>Start of policy:<select id="quotation_vehicle_attributes_policystart_1i" name="quotation[vehicle_attributes][policystart(1i)]">

<option selected="selected" value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
</select>
<select id="quotation_vehicle_attributes_policystart_2i" name="quotation[vehicle_attributes][policystart(2i)]">
<option value="1">January</option>
<option selected="selected" value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option  value="12">December</option>
</select>
<select id="quotation_vehicle_attributes_policystart_3i" name="quotation[vehicle_attributes][policystart(3i)]">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option selected="selected" value="7">7</option>
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
</select>
</h5>
	
	  </div>
	 
  <div class="actions">
  <input value="Calculate Premium" type="button" onclick="calculatePremium();" 
  class="btn btn-default" class="btn btn-default">
  <input type="reset" value="Reset form" id="resetquote"class="btn btn-warning" >
    <input name="commit" value="Save Quotation" type="button" onclick="validateQuote();return false;"
    class="btn btn-success">
  </div>
</form>
  
	</div>
    
    <div id="tabs-3">
	  <div id="respond"></div>
      <form>
      <input type="text" size="25" id="identification" placeholder="identification number" name="identification"/>
      <input type="button" id="getquote" onClick="retrieveQuote();return false;" value="Retrieve"
      class="btn btn-success"/>
	 </form>
     
     <div id="showretrieve">

<p>
  <strong>Quotation Premium:</strong>
  <h5 id="premium"></h5>
</p>
<p>
  <strong>Date Calculated:</strong>
  <h5 id="datecalculated"></h5>
</p>

<p>
  <strong>Policy excess:</strong>
  16%
</p>
<p>
  <strong>Breakdown cover:</strong>
  <h5 id="breakcover"></h5>
</p>
 <p>
     <strong>Windscreen repair:</strong>
	 <h5 id="repair"></h5>
	 
  </p>
  
  <p>
    <strong>Excess Paid</strong>
	 5%
  </p>
 
<p>
<strong>Insurance for Vehicle:</strong>
</p><p><strong>Registration:</strong><h5 id="showregistration"></h5></p>
<p><strong>Annual mileage:</strong><h5 id="showmileage"></h5></p>
<p><strong>Estimated value:</strong><h5 id="showvalue"></h5></p>
<p>
  <strong>Parking location:</strong>
  <h5 id="showparking"></h5>
</p>
<p><strong>Start of policy:</strong><h5 id="showstart"></h5></p>
</div>

	</div>
    
    <div id="tabs-4">
	 
<p>
  <strong>Title:</strong>
  <h5 id="showtitle"> </h5>
</p>



<p>
  <strong>Firstname:</strong>
  <h5 id="showfirstname"> </h5>
</p>

<p>
  <strong>Surname:</strong>
  <h5 id="showsurname"> </h5>
</p>

<p>
  <strong>Phone:</strong>
  <h5 id="showphone"> </h5>
  
</p>

<p>
  <strong>Dataofbirth:</strong>
  <h5 id="showdateofbirth"> </h5>
</p>

<p>
  <strong>License type:</strong>
  <h5 id="showlicencetype"> </h5>
</p>

<p>
  <strong>License period:</strong>
  <h5 id="showlicenceperiod"> </h5>
</p>
 
<p>
  <strong>Occupation:</strong>
  <p id="showoccupation"> </p>
</p>

<p>
  <strong>Driver History:</strong>
  <h5 id="showincidents"> </h5>
</p>

<p>ADDRESS:</p>
<p id="showstreet"></p>
  <p id="showcity"></p>
  <p id="showcounty"></p>
  <p id="showpostcode"></p>

	</div>
    
	<div id="tabs-5">
 <h1>Editing user profile</h1>

<form accept-charset="UTF-8" action="" class="edit_user" enctype="multipart/form-data" id="<?php echo "edit_user_".$_SESSION['php_id']; ?>" method="post">
<div style="margin:0;padding:0;display:inline">
<input name="utf8" value="✓" type="hidden"><input name="_method" value="patch" type="hidden">
</div>

  <div class="field">
    <label for="user_title">Title</label><br>
	<select id="user_title" name="user[title]">
    <option value="Mr">Mr</option>
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
	 
  </div>
  <div class="field">
    <label for="user_surname">Surname</label><br>
    <input id="user_surname" name="user[surname]" value="" type="text">
  </div>
  <div class="field">
    <label for="user_firstname">Firstname</label><br>
    <input id="user_firstname" name="user[firstname]" value="" type="text">
  </div>
  <div class="field">
    <label for="user_phone">Phone</label><br>
    <input id="user_phone" name="user[phone]" placeholder="Enter text here..." value="" type="text">
  </div>
 
  <div class="field">
    <label for="user_dateofbirth">Dateofbirth</label><br>
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
<option selected="selected" value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
</select>
<select id="user_dateofbirth_2i" name="user[dateofbirth(2i)]">
<option selected="selected" value="1">January</option>
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
<option value="12">December</option>
</select>
<select id="user_dateofbirth_3i" name="user[dateofbirth(3i)]">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option selected="selected" value="8">8</option>
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
</select>

  </div>

  <div class="field">
  
   
     <label for="user_licencetype">Licencetype</label><br>
	
   <input checked="checked" id="user_licencetype_t" name="user[licencetype]" value="t" type="radio">
<label for="user_licencetype_t">Full</label>
<input id="user_licencetype_f" name="user[licencetype]" value="f" type="radio">
<label for="user_licencetype_f">Provisional</label>
		
  </div>
  <div class="field">
    <label for="user_licenceperiod">Licenceperiod</label><br>
    <select id="user_licenceperiod" name="user[licenceperiod]"><option value="1">1</option>
<option selected="selected" value="2">2</option>
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
<option value="80">80</option></select> years
	
  </div>
 
		<div>
        
       <b><label for="user_occupation_id">Occupation</label></b><br>
	    <select id="user_occupation_id" name="user[occupation_id]">
        <option selected="selected" value="1">Academic</option>
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
	  
        </div>
		
		   
   
	
		<strong>Address</strong>
        <div>
          <b><label for="user_address_attributes_street">Street</label></b><br>
          <input id="user_address_attributes_street" name="user[address_attributes][street]" value="" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_city">City</label></b><br>
          <input id="user_address_attributes_city" name="user[address_attributes][city]" value="" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_county">County</label></b><br>
          <input id="user_address_attributes_county" name="user[address_attributes][county]" value="" type="text">
          <br><br>
        </div>
		<div>
          <b><label for="user_address_attributes_postcode">Post code</label></b><br>
          <input id="user_address_attributes_postcode" name="user[address_attributes][postcode]" value="" type="text">
          <br><br>
        </div>
		
		
<input id="user_address_attributes_id" name="user[address_attributes][id]" value="<?php echo $_SESSION['php_id']; ?>" type="hidden">
  <div class="actions">
    <input name="commit" value="Update User" class="btn btn-success" type="button" onClick="updateInfo();getUser();return false;">
  </div>
</form>

  </div>
  <?php echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
  </div>

</div>
</body>
</html>