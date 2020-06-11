<?php
/*
* Change the value of $password if you have set a password on the root userid
* Change NULL to port number to use DBMS other than the default using port 3306
*
*/
$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'rnypdb'; //To be completed to connect to a database. The database must exist.
$port = 3308; //Default must be NULL to use default port
$mysqli = mysqli_connect('localhost', $user, $password, $database, $port);//use remote database in place of localhost while hosting the website online
$email =$_POST["email"];
$phone = $_POST["phone"];
$portfolio = $_POST["portfolio"];
$school = $_POST["school"];
$stream = $_POST["stream"];
$experience = $_POST["experience"];
$address1 = $_POST["address"];
$committe = $_POST["comittee"];
$gender = $_POST["gender"];
$sem = $_POST["class"];
$accomodation = $_POST["radio"];
#echo $gender;
$query ="INSERT INTO entries(email, phone, portfolio, school, stream, experience, address1, committee, gender, sem, accomodation)VALUES(? , ?, ?, ?, ?, ? ,?,?, ?,?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sssssssssss",$email , $phone, $portfolio, $school, $stream, $experience , $address1, $committe, $gender ,$sem,$accomodation);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
if ($stmt->execute() === TRUE) {
    echo "registered successfully.\n";
}
else
{
    echo 'failed to enter data';
    echo $mysqli -> error;
}
echo '<p>Connection OK '. $mysqli->host_info.'</p>';
echo '<p>Server '.$mysqli->server_info.'</p>';
$mysqli->close();
?>
