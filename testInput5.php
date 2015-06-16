<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "speaker-evaluation";

/* $_SESSION['speaker'] = isset($_POST['speaker']) ? $_POST['speaker'] : "";  // this is on line 11
$_SESSION['knowledgeable'] = isset($_POST['knowledgeable']) ? $_POST['knowledgeable'] : "";  // this is on line 12
$_SESSION['objectives'] = isset($_POST['objectives']) ? $_POST['objectives'] : "";// this is on line 13
$_SESSION['bias'] = isset($_POST['bias']) ? $_POST['bias'] : "";// this is on line 13
$_SESSION['comments'] = isset($_POST['comments']) ? $_POST['comments'] : "";// this is on line 13
*/

    $submit = "";
    $speaker  = $_POST['speaker'];
    $knowledgeable  = $_POST['knowledgeable'];
    $objectives= $_POST['objectives'];
    $bias= $_POST['bias'];
    $comments= $_POST['comments'];
    if(isset($_POST['submit'])){ $submit = $_POST['submit']; }
    // send the data to the database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO evaldata (speaker, knowledgeable, objectives, bias, comments)
VALUES ('$speaker', '$knowledgeable', '$objectives', '$bias', '$comments')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// define variables and set to empty values
$speaker = $knowledgeable = $objectives = $bias = $comments = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $speaker = test_input($_POST["speaker"]);
   $knowledgeable = test_input($_POST["knowledgeable"]);
   $objectives = test_input($_POST["objectives"]);
   $bias = test_input($_POST["bias"]);  
   $comments = test_input($_POST["comments"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = htmlentities($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Speaker: <input type="text" name="speaker">
   <br><br>
   Knowledgeable: <input type="text" name="knowledgeable">
   <br><br>
    Objectives: <input type="text" name="objectives">
   <br><br>
    Bias: <input type="text" name="bias">
   <br><br>
    Comments: <input type="text" name="comments">
   <br><br>      
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $speaker;
echo "<br>";
echo $knowledgeable;
echo "<br>";
echo $objectives;
echo "<br>";
echo $bias;
echo "<br>";
echo $comments;
?>

</body>
</html>
