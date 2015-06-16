<!doctype html>
<meta charset=utf-8>
<title>Feedback</title>

<form action="feedback.php" name="feedback" method="post">
Speaker's last name: <input type="text" name="speaker"><br><br>

<strong>The speaker was knowledgeable about the topic and provided the information in an interesting manner that facilitated my learning:</strong><br>
<input type="radio" name="knowledgeable" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="knowledgeable" value="agree">Agree - 
<input type="radio" name="knowledgeable" value="neutral">Neutral - 
<input type="radio" name="knowledgeable" value="disagree">Disagree - 
<input type="radio" name="knowledgeable" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>The objectives for this speaker's presentation were met:</strong><br>
<input type="radio" name="objectives" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="objectives" value="agree">Agree - 
<input type="radio" name="objectives" value="neutral">Neutral - 
<input type="radio" name="objectives" value="disagree">Disagree - 
<input type="radio" name="objectives" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>The content of this topic was free of commercial bias.</strong><br>
<input type="radio" name="bias" value="stronglyAgree" checked>Strongly Agree - 
<input type="radio" name="bias" value="agree">Agree - 
<input type="radio" name="bias" value="neutral">Neutral - 
<input type="radio" name="bias" value="disagree">Disagree - 
<input type="radio" name="bias" value="stronglyDisagree">Strongly Disagree<br><br>

<strong>Please add your comments.</strong><br>
<textarea name="comments" rows="5" cols="40"></textarea><br><br>

<input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit']) || ($_POST['speaker']) || ($_POST['knowledgeable']) || ($_POST['objectives']) || ($_POST['bias']) || ($_POST['comments'])) {

$mysqli = new mysqli("localhost", "root", "", "speaker-evaluation");
if ( $mysqli->connect_error) {
	die( "Cannot connect " );
}

// insert feedback data
$sql = "INSERT INTO evaldata (speaker, knowledgeable, objectives, bias, comments) VALUES ( '{$mysqli->real_escape_string($_POST['speaker'])}', '{$mysqli->real_escape_string($_POST['knowledgeable'])}','{$mysqli->real_escape_string($_POST['objectives'])}','{$mysqli->real_escape_string($_POST['bias'])}','{$mysqli->real_escape_string($_POST['comments'])}')";
$insert = $mysqli->query($sql);

if ( $insert ) {
	echo "Success! Row ID: { $mysqli->insert_id}";
} else {
	die("Error: {$mysqli->errno} : {$mysqli->error}");
}

// close the connection
$mysqli->close();
}
?>