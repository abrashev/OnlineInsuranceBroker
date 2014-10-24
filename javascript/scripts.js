//javascript code
//xhr.setRequestHeader("Authentication", "username:password in base64")

//makes request to connect.php where another request is made to underwriter with all parameters
function registerUser(){
	//if(validateReg()==true){
	$.post( "./connect.php", $( "#new_user" ).serialize()).done(function( data ) {
alert( "You have registered! Go to login now!");

$('#resetform').click();
});
	
	//}
}

function validateReg(){
	 var what=true;
	$("#new_user :input").each(function(){
    var thevalue = $(this).val();//the value of the current input element
    var thename = $(this).attr('name');//input name
    var thetype = $(this).attr('type');//input type
	if(thevalue==""){
		$(this).effect("highlight",3000).select();
	 what=false;
	return false;
	}
});
/*var postcode=$("#user_address_attributes_postcode").val();
	if(checkPostcode(postcode)==false){
		$("#user_address_attributes_postcode").focus();
		alert("Postcode is not valid");
	return false;	
	}
	*/
	if(what==true){registerUser();}
	return false;
	
}

function validateQuote(){
		/*$( "#new_quotation" ).each(function( index,element ) {
 console.log(index.value);
 
});*/
var what=true;
//http://stackoverflow.com/questions/14683504/iterate-through-all-form-elements-irrespective-of-their-type
if($( "#quotation_breakdowncover" ).val()==0 && $( "#quotation_windscreenrepair_f" ).is(":checked")){
		//alert("select one");
		$( "#quotation_breakdowncover" ).val(2);
		//$("#quotation_windscreenrepair_t").attr( "checked","checked" );
		//$("#quotation_windscreenrepair_f").attr( "checked","" );
		what=false;
			return false;
		
	}/*
	one:
  identification: kgedwashye
  quotepremium: 15
  policyexcess: 16
  breakdowncover: 3
  windscreenrepair: true
  excesspaid: 5
  user_id: 1
  
two:
  identification: efdwwwltng
  quotepremium: 1
  policyexcess: 16
  breakdowncover: 3
  windscreenrepair: true
  excesspaid: 5
  user_id: 2
  
  one:
  title: Mr
  surname: Petkov
  firstname: Stoyan
  phone: 235346
  dateofbirth: 1987-10-10
  licencetype: false
  licenceperiod: 4
  occupation: 4

two:
  title: Mrs
  surname: Ivanova
  firstname: Penka
  phone: 5346436
  dateofbirth: 1990-11-05
  licencetype: true
  licenceperiod: 2
  occupation: 2
  */
$("#new_quotation :input").each(function(){
    var thevalue = $(this).val();//the value of the current input element
    var thename = $(this).attr('name');//input name
    var thetype = $(this).attr('type');//input type
	if(thevalue==""){
		$(this).effect("highlight",3000).select();
		what=false;
	return false;
	}
});

if(what==true){createQuote();}
return false;	
//}

}

function createQuote(){
	//if(validateQuote()==true){
	$.post( "./connect.php", $( "#new_quotation" ).serialize()).done(function( data ) {
//alert( "You have saved this quotation!");
$('#savedidentification').html("You have saved this quotation!<br />Your identification number is: "+data+"<br />Please write it down for later retrieve");
$('#resetquote').click();
});
	//}
}

function addIncidents(num){
	$( "#divincidents").empty();
	if(num>0){
	
	for(var o=0;o<num;o++){
 $("#divincidents").append( "<label for='user_incidents_attributes_"+o+"_description'>Description</label><input id='user_incidents_attributes_"+o+"_description' name='user[incidents_attributes]["+o+"][description]' type='text'>" );
 $("#divincidents").append( "<label for='user_incidents_attributes_"+o+"_valueofclaim'>Value of claim</label><input id='user_incidents_attributes_"+o+"_valueofclaim' name='user[incidents_attributes]["+o+"][valueofclaim]' type='text'><br />" );
 
 $("#divincidents").append("<label for='user_incidents_attributes_"+o+"_typeofincident'>Type of Incident</label>"+
   "<select id='user_incidents_attributes_"+o+"_typeofincident' name='user[incidents_attributes]["+o+"][typeofincident]'><option value='head on'>Head on</option>"+
   "<option value='road departure'>Road departure</option><option value='rear end'>Rear end</option><option value='side'>Side collision</option><option value='rollover'>Rollover</option></select>");
 
 $("#divincidents").append("<label for='user_incidents_attributes_"+o+"_dateofincident'>Date of Incident</label>"+
   " <input id='user_incidents_attributes_"+o+"_dateofincident' placeholder='2012-08-24' name='user[incidents_attributes]["+o+"][dateofincident]' type='text'><br />");
    //$( "#user_incidents_attributes_"+o+"_dateofincident" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	}
	
 
	}
	
}

function makeDates(){
	
	$( "input[id$='dateofincident']" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	
}
//Makes request to the Underwriter site with all form parameters serialized
function updateInfo(){
	$.post( "./connect.php", $( "#edit_user_"+userinfo.address.user_id ).serialize()).done(function( data ) {
alert( "User profile is updated");
});
	
}

var userinfo;
//Makes request to Underwriter and the response is user data which is inserted in profile tags
function getUser(){
	
$.getJSON( "./connect.php?userinfo=infoaboutme", function( data ) {
	//if(data!="{This is not your account, access denied}"){
//var items = [];
userinfo=data;
//PROFILE FORM
$( "#showtitle" ).html( data.title );
$( "#showfirstname" ).html( data.firstname );
$( "#showsurname" ).html( data.surname );
$( "#showphone" ).html( data.phone );
$( "#showdateofbirth" ).html( data.dateofbirth );
if(data.licencetype==true){
	
	$( "#showlicencetype" ).html( "FULL" );
}else{
	$( "#showlicencetype" ).html( "PROVISIONAL" );
	
}
$( "#showlicenceperiod" ).html( data.licenceperiod+" years" );
$( "#showoccupation" ).html( data.occupation.name );
$( "#showincidents" ).html( data.incidents.length +" incidents");
$( "#showstreet" ).html( data.address.street );
$( "#showcity" ).html( data.address.city );
$( "#showcounty" ).html( data.address.county );
$( "#showpostcode" ).html( data.address.postcode );
//EDIT FORM

$( "#user_surname" ).val( data.surname );
$( "#user_firstname" ).val( data.firstname );
$( "#user_title" ).val( data.title);
$( "#user_phone" ).val( data.phone);
var dt=data.dateofbirth;
var n=dt.split("-");
$( "#user_dateofbirth_1i" ).val( n[0]);
if(n[1].indexOf(0)=="0"){
	n[1]=n[1].split("0");
$( "#user_dateofbirth_2i" ).val( n[1]);

}else $( "#user_dateofbirth_2i" ).val( n[1]);
if(n[2].indexOf(0)=="0"){
	n[2]=n[2].split("0");
$( "#user_dateofbirth_3i" ).val( n[2]);

}else $( "#user_dateofbirth_3i" ).val( n[2]);

$( "#user_licenceperiod" ).val( data.licenceperiod);
$( "#user_occupation_id" ).val( data.occupation.id);
$( "#user_address_attributes_street" ).val( data.address.street);
$( "#user_address_attributes_city" ).val( data.address.city);
$( "#user_address_attributes_county" ).val( data.address.county);
$( "#user_address_attributes_postcode" ).val( data.address.postcode);
/*$.each( data, function( key, val ) {
	if(key=="created_at"){
		items.push( "<li class='timeago' title='"+val+"'></li>" );
		
	}else{
items.push( "<li id='" + key + "'>" + key +": "+val + "</li>" );
	}
	
});
$( "<ul/>", {
"class": "my-new-list",
html: items.join( "" )
}).appendTo( "#respond" );*/
//	}
//var users=JSON.parse(data);
//var AUTH_TOKEN = $('meta[name=csrf-token]').attr('content');
});	

//JQuery.timeago("li#created_at");	
}

//CALCULATES premium based on value of vehicle and type of cover and windscreen selected as well as makes 30% discount when user have no incidents
function calculatePremium(){
	var value=$("#quotation_vehicle_attributes_value").val();
	if(value>100){
	var cover=$("#quotation_breakdowncover").val()/100;
	 
	
	var cost=value*cover;
	var dsc="No discount";
	if ( $("#quotation_windscreenrepair_t").is( ":checked" ) ){
		cost=cost+30;	
	}
	if(userinfo.incidents.length==0){
		cost=cost*0.70;	
		dsc="Your Discount is: 30%";
	}
	
$("#calculatedpremium").html(dsc+"<br />Premium: &pound;"+cost.toFixed());
	}else{
		//alert("ENTER VEHICLE VALUE");
		$("#quotation_vehicle_attributes_value").effect("highlight",3000).select();
	}
	
}
//VALIDATE LOGIN SCREEN EMAIL AND PASSWORD
function validateLogin(){
	var email=$("#email").val();
	var pass=$("#password").val();
	if(checkEmail(email)==false){
		$("#email").focus();
		alert("Email is not valid");
	return false;	
	}
	if(pass.length<5){
		$("#password").focus();
		alert("Password is less than 5");
	return false;
	}
	 
	$("#login-form").submit();
	//return false;
	 
}


//CHECKS IF EMAIL PATTERN LOOKS LIKE GENUINE
function checkEmail(inputvalue){	
    var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(pattern.test(inputvalue)){         
		//alert("true"); 
		return true;  
    }else{   
		//alert("false");
		return false; 
    }
}

//CHECKS IF post code is genuine
function checkPostcode(inputvalue){	
    var pattern=/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/;
    if(pattern.test(inputvalue)){         
		//alert("true"); 
		return true;  
    }else{   
		//alert("false");
		return false; 
    }
}

$(document).ready(function() {
$("#tabs").tabs();//.addClass( "ui-tabs-vertical ui-helper-clearfix" );
//$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
$.timeago.settings.allowFuture = true;
$("#numincidents").change(function() {
	$( "input[id*='dateofincident']" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	});
	
$("#quotation_breakdowncover").change(function() {
if(this.value==0){
	$("#quotation_windscreenrepair_t").attr( "checked","checked" );
	$("#quotation_windscreenrepair_f").attr( "checked","" );
 
 	//$("#quotation_windscreenrepair_f").attr( "checked","null" );

}
});

});
var covers=["No cover","no cover","Roadside","At home","European"]
function retrieveQuote(){
	var ident=$("#identification").val();
	if(ident.length==10){
	 $.getJSON( "./connect.php?usermyquote="+ident, function( data ) {
		 //alert(data);
		if(data.length==0){
			alert("This is not real identification number");
			 
			return;	
		}
		 if(data.length>0) {
			 //Populate the fields with returned data
			 $("#showretrieve").show().effect("highlight");
			 $("#premium").html("&pound;"+data[0].quotepremium);
			 $("#datecalculated").attr("title",data[0].created_at).timeago();
			if(data[0].windscreenrepair==true){
	
	$( "#repair" ).html( "Included" );
}else{
	$( "#repair" ).html( "Not included" );
	
}
			 $("#breakcover").html(covers[data[0].breakdowncover]);
			 $("#showregistration").html(data[0].vehicle.registration);
			 $("#showmileage").html(data[0].vehicle.mileage+" kilometers");
			 $("#showvalue").html("&pound;"+data[0].vehicle.value);
			 $("#showparking").html(data[0].vehicle.parkinglocation);
			 $("#showstart").attr("title",data[0].vehicle.policystart).timeago();
			 
		}else{
			$("#showretrieve").hide();
			alert("Wrong identification number");
		 }
		 
	 });
	}else{
		$("#identification").focus();
		alert("Identification is not 10 symbols");
	}
	/* var posting = $.get('http://127.0.0.1:3000/quotations/search.json', { q:'bgthyn'} );
// Put the results in a div
posting.done(function( data ) {
//var content = $( data ).find( "#content" );
$( "#showtitle" ).html( data.title );
});*/

	
}
