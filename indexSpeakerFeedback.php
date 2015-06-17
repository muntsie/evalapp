<!doctype html>

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

<title>Snowbird CME</title>

<meta charset="utf-8">
<meta name="description" content="Continuing education conference for Physician Assistants and Nurse Practitioners.">
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet" href="../styles/snowbird.css">

<div id="logo"><img src="../img3/logo.jpg" alt="logo"></div>

<form action="index.php" name="feedback" method="post">
Speaker's first and last name:<br>
<input type="text" name="speaker"><br><br>

<strong>The speaker was knowledgeable<br>
 about the topic and provided the<br>
 information in an interesting manner<br>
 that facilitated my learning:</strong><br>
<input type="radio" name="knowledgeable" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="knowledgeable" value="agree">Agree<br>
<input type="radio" name="knowledgeable" value="neutral">Neutral - 
<input type="radio" name="knowledgeable" value="disagree">Disagree<br> 
<input type="radio" name="knowledgeable" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>The objectives for this<br>
speaker's presentation were met:</strong><br>
<input type="radio" name="objectives" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="objectives" value="agree">Agree<br>
<input type="radio" name="objectives" value="neutral">Neutral - 
<input type="radio" name="objectives" value="disagree">Disagree<br> 
<input type="radio" name="objectives" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>The content of this topic<br>
 was free of commercial bias.</strong><br>
<input type="radio" name="bias" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="bias" value="agree">Agree<br>
<input type="radio" name="bias" value="neutral">Neutral - 
<input type="radio" name="bias" value="disagree">Disagree<br> 
<input type="radio" name="bias" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>Please add your comments.</strong><br>
<textarea name="comments" rows="5" cols="40"></textarea><br><br>

<input type="submit" name="submit" value="Submit">
</form>

<?php


if (isset($_POST['submit']) && ($_POST['speaker']) && ($_POST['knowledgeable']) && ($_POST['objectives']) && ($_POST['bias']) && ($_POST['comments'])) {

$hostname = "speakerfeedback.db.4442101.hostedresource.com";
$username = "speakerfeedback";
$dbname = "speakerfeedback";

//These variable values need to be changed by you before deploying
$password = "feedbackSpeaker2#";
$usertable = "evaldata";

$mysqli = new mysqli("$hostname", "$username", "$password", "$dbname");
if ( $mysqli->connect_error) {
	die( "Cannot connect " );
}

// insert feedback data
$sql = "INSERT INTO $usertable (speaker, knowledgeable, objectives, bias, comments) VALUES ( '{$mysqli->real_escape_string($_POST['speaker'])}', '{$mysqli->real_escape_string($_POST['knowledgeable'])}','{$mysqli->real_escape_string($_POST['objectives'])}','{$mysqli->real_escape_string($_POST['bias'])}','{$mysqli->real_escape_string($_POST['comments'])}')";
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