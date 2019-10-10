<?php
session_start();

//check if a user is already logged in, redirect to welcome page if logged in

require_once 'function/functions.php';
isUserLoggedin();
// if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]=== true){

//     header("location: welcome.php");
//     exit;
// }
require_once "config/conn.php";
//define variables and initialize with empty values

$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //sanitize post_variables
    $sanpost_username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);

    $sanpost_password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);


    //Validate Username
    if(empty($sanpost_username)){
        $username_err = "Please enter username.";
    } else{
        $username = $sanpost_username;
    }
    //Validate Password
    if(empty($sanpost_password)){
        $password_err = "Please enter your password.";
    } else{
        $password = $sanpost_password;
    }

    //validate the user credentials

    if(empty($username_err) && empty($password_err)){

       
        // the error variables should be empty for a succesfful log in.

        //Prepare a selct statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt=$pdo->prepare($sql)){
            
            //Bind variables to the prepared statement as parameters

            $stmt->bindParam(":username",$param_username,PDO::PARAM_STR);

            //set parameters
            $param_username = $username;

            //Attempt to execute the prepared statement
            
            if($stmt->execute()){
                //the prepared statement was successfully executed
                //if the resource was succesfully created, and the number of rows is equla to 1.  now verify the password
                var_dump($username);

                if($stmt->rowCount() == 1){

                    if($data = $stmt->fetch()){

                        $user_id = $data["id"];

                        $username = $data["username"];

                        $hashed_password = $data["password"];

                        if(password_verify($password,$hashed_password)){
                          //Correct password if true
                          //start a new session
                          session_start();
                          //store data in session variables
                          
                          $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $user_id;
                          $_SESSION["username"] =$username;
                          //redirect user to welcome page
                          header("location: welcome.php");
                        } else{
                           //display an error message if username doesnt exist
                           $password_err="The password enetered was not valid." ;
                        }
                    } 

                }
                else{
                    //Username was not found
                    $username_err="No account found with this username";
                }
                
            }//error in fetch the data associated wuth stmt
            else{
                //redirect tp error page
                echo "oops something whent wrong in fething dfata please try again later";
            }
        }
        //close statement
        unset($stmt);
        
        
    }
    unset($pdo);
}
?>

