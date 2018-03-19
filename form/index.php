<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Questions for You</title>
	<meta content="Description" name="description">
	<meta content="Author" name="author">
    <link href="style/global.css" rel="stylesheet">
    </head>
    <body>
        <?php
        echo"<pre>", print_r($_POST, true),"<pre>";
        if(isset($_POST['submit'])){
        $firstname=filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
        $lastname=filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
        $email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
        $address1=filter_var($_POST['address1'],FILTER_SANITIZE_STRING);
        $address2=filter_var($_POST['address2'],FILTER_SANITIZE_STRING);
        $city=filter_var($_POST['city'],FILTER_SANITIZE_STRING);
        $state=filter_var($_POST['state'],FILTER_SANITIZE_STRING);
        $gender=filter_var($_POST['gender'],FILTER_SANITIZE_STRING);
        $song=filter_var($_POST['song'],FILTER_SANITIZE_STRING);
        $pokemon=filter_var($_POST['pokemon'],FILTER_SANITIZE_STRING);
        $companion=filter_var($_POST['companion'],FILTER_SANITIZE_STRING);
        $cereal=filter_var($_POST['cereal'],FILTER_SANITIZE_STRING);
        $skill=filter_var($_POST['skill'],FILTER_SANITIZE_STRING);
//Connect to Database
            $dbhostname='localhost';
            $dbusername="kylenaka_user1";
            $dbpassword="power13";
            $dbdatabase="kylenaka_randoquestion";
            
            $mysqli = new mysqli($dbhostname, $dbusername, $dbpassword, $dbdatabase);
            
            if ($mysqli->connect_errno){
                echo "<p> MySQL Error".$mysqli->error;
            }
            else{
                echo'Database Connection Successful';
            }
            $firstname = $mysqli->real_escape_string($firstname);
            $lastname = $mysqli->real_escape_string($lastname);
            $email = $mysqli->real_escape_string($email);
            $address1 = $mysqli->real_escape_string($address1);
            $address2 = $mysqli->real_escape_string($address2);
            $city = $mysqli->real_escape_string($city);
            $state = $mysqli->real_escape_string($state);
            $gender = $mysqli->real_escape_string($gender);
            $cereal = $mysqli->real_escape_string($cereal);
            $companion = $mysqli->real_escape_string($companion);
            $song = $mysqli->real_escape_string($song);
            $pokemon = $mysqli->real_escape_string($pokemon);
            $skill = $mysqli->real_escape_string($skill);                        
            $password=password_hash($password,PASSWORD_DEFAULT);
            
            $query="INSERT INTO questiondb(accountid,firstname,lastname,email,address1,address2,city,state,age,gender,cereal,companion,song,pokemon,skill)VALUES (NULL,'$firstname','$lastname','$email','$address1','$address2','$city','$state','$age','$gender','$cereal','$companion','$song','$pokemon','$skill')";
                
                if($mysqli->query($query)){
                    echo 'Insert data successful';
                }
            else{
                echo"<p>Insert Error".$mysqli->error."</p>";
            }
                
                
        $to='mrhappyrobot13@gmail.com';
        $subject='Your Form Results';
        $message="Here it is!\n\n"
                    ."Name: $firstname $lastname\n\n"
                    ."Age: $age\n\n"
                    ."Gender: $gender\n\n"
                    ."Address Line 1: $address1\n\n"
                    ."Address Line 2: $address2\n\n"
                    ."City: $city\n\n"
                    ."State: $state\n\n"
                    ."Favorite 80s Song: $song\n\n"
                    ."Favorite Starter Pokemon: $pokemon\n\n"
                    ."Companion: $companion\n\n"
                    ."Cereal Persona: $cereal\n\n"
                    ."Skill to Acquire: $skill";
            $result=mail($to,$subject,$message);
        }?>
        <form method="post">
            <fieldset>
                <legend>Personal Information:<br></legend>
        First Name:
            <input type="text" name="firstname">
        Last Name:
            <input type="text" name="lastname">
        Age: 
            <input type="number" name="age">
Gender:
  <input type="radio" name="gender" value="male" checked> Male
  <input type="radio" name="gender" value="female"> Female
  <input type="radio" name="gender" value="other"> Rather not say
        Email: 
            <input type="email" name="email">
        Address Line 1:
            <input type="text" name="address1">
        Address Line 2:
            <input type="text" name="address2">
        City:
            <input type="text" name="city">
        State:
            <input type="text" name="state">
            </fieldset>
            <fieldset>
                <legend>Questions:</legend>
        What is your favorite song from the 80's? 
            <input type="text" name="song">
        What is your favorite starter Pokemon?
            <input type="text" name="pokemon">
        If you could communicate and befriend any one animal what would it be?
            <input type="text" name="companion">
        If you could be any cereal mascot, which one would you be?
            <input type="text" name="cereal">
        If you could gain any one skill over night, what would it be?
            <input type="text" name="skill">
            </fieldset>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>