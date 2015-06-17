<!doctype html>
<meta charset="utf-8">
<title>Snowbird CME</title>

<!-- code content section (CCS)
doctype
title
meta
style
logo
header
dates
nav (top)
headline (images that are eye catching)
for (who it is for)
nav (bottom)
footer
  copyright
  
summary: this page will, generally, have a logo, header, pictures, buttons, copyright
-->

<meta name="description" content="Continuing education conference for Physician Assistants and Nurse Practitioners.">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="../styles/snowbird.css">

<div id="logo"><img src="../img3/logo.jpg" alt="logo"></div>

<div id="feedback">

 <strong>Overall Program Goal:</strong><br />
 To provide a variety of speakers<br /> 
 and topics that are current and<br /> 
 relevant to Nurse Practitioners<br />
 and Physician Assistants that will<br />
 allow them to increase their knowledge<br />
 and improve their clinical practice.<br />
 <center><hr width="200px"></center>
<!--we have our html form here where user information will be entered-->
<form action='index.php' method='post'>
    <strong>Please let us know the following...</strong><br /><br />
"I think the overall purpose/goal for<br /> 
this activity was met."<br />
    <input type="radio" name="purpose" value="stronglyAgree" checked="checked" />Strongly Agree<br />
    <input type="radio" name="purpose" value="agree" />Agree<br />
    <input type="radio" name="purpose" value="neutral" />Neutral<br />
    <input type="radio" name="purpose" value="disagree" />Disagree<br />
    <input type="radio" name="purpose" value="stronglyDisagree" />Strongly Disagree<br />
Comments: <input type="text" name="pcomments"/><br /><br />

<strong>"This activity was worthwhile for<br /> 
my professional practice."</strong><br />
    <input type="radio" name="worthwhile" value="stronglyAgree" checked="checked" />Strongly Agree<br />
    <input type="radio" name="worthwhile" value="agree" />Agree<br />
    <input type="radio" name="worthwhile" value="neutral" />Neutral<br />
    <input type="radio" name="worthwhile" value="disagree" />Disagree<br />
    <input type="radio" name="worthwhile" value="stronglyDisagree" />Strongly Disagree<br />
Comments: <input type="text" name="wcomments"/><br /><br />

<strong>"As a health care provider, this activity<br /> 
will enhance my knowledge/skill."</strong><br />
    <input type="radio" name="enhance" value="stronglyAgree" checked="checked" />Strongly Agree<br />
    <input type="radio" name="enhance" value="agree" />Agree<br />
    <input type="radio" name="enhance" value="neutral" />Neutral<br />
    <input type="radio" name="enhance" value="disagree" />Disagree<br />
    <input type="radio" name="enhance" value="stronglyDisagree" />Strongly Disagree<br />
Comments: <input type="text" name="ecomments"/><br /><br />
<strong>As a result of this activity, <br />
please share at least one action<br />
you will take to change your <br />
professional practice/performance.</strong><br />
    <textarea name="myaction" cols="30" rows="5"></textarea><br /><br />
<strong>What other health care/professional<br />
topics would you like to see presented?</strong><br />
	<textarea name="topics" cols="30" rows="5"></textarea><br /><br />
<strong>What suggestions do you have to<br />
 improve the conference?</strong><br />
	<textarea name="improve" cols="30" rows="5"></textarea><br /><br />

                <input type='submit' name='submit' value='Submit' />

</form><br><br>
 
</div>

<?php

if (isset($_POST['submit']) && 
	($_POST['purpose']) && 
	($_POST['pcomments']) && 
	($_POST['worthwhile']) && 
	($_POST['wcomments']) && 
	($_POST['enhance']) && 
	($_POST['ecomments']) && 
	($_POST['myaction']) && 
	($_POST['topics']) && 
	($_POST['improve'])) {

$hostname = "conferenceeval.db.4442101.hostedresource.com";
$username = "conferenceeval";
$dbname = "conferenceeval";

//These variable values need to be changed by you before deploying
$password = "evalConference2#";
$usertable = "evaldata";

$mysqli = new mysqli("$hostname", "$username", "$password", "$dbname");
if ( $mysqli->connect_error) {
	die( "Cannot connect " );
}

// insert feedback data
$sql = "INSERT INTO $usertable (purpose, pcomments, worthwhile, wcomments, enhance, ecomments, myaction, topics, improve) 
VALUES ( 
 '{$mysqli->real_escape_string($_POST['purpose'])}',
 '{$mysqli->real_escape_string($_POST['pcomments'])}', 
 '{$mysqli->real_escape_string($_POST['worthwhile'])}', 
 '{$mysqli->real_escape_string($_POST['wcomments'])}', 
 '{$mysqli->real_escape_string($_POST['enhance'])}', 
 '{$mysqli->real_escape_string($_POST['ecomments'])}', 
 '{$mysqli->real_escape_string($_POST['myaction'])}', 
 '{$mysqli->real_escape_string($_POST['topics'])}', 
 '{$mysqli->real_escape_string($_POST['improve'])}')";

$insert = $mysqli->query($sql);

if ( $insert ) {
	echo "Thank you for your feedback";
} else {
	die("Error: {$mysqli->errno} : {$mysqli->error}");
}

// close the connection
$mysqli->close();
}
?>
<!-- http://snowbirdcme.org/evals/conferenceeval.php -->