<?php
// connect to the database
$server="localhost:3306";
$username="root";
$password="";
$database_name="costumer_details";
$errors = array();
$con = mysqli_connect($server, $username, $password, $database_name);
if($con){
    if (isset($_POST['login'])) {
        // receive all input values from the register.php form
        $username = mysqli_real_escape_string($con, $_POST['user']);  
        $pass = mysqli_real_escape_string($con, $_POST['pass']);  
      
        $sql = "select * from car where email = '$username' and password = '$pass'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            session_start();

    $_SESSION["name"] = $row["name"];
    $_SESSION["DOB"] = $row["DOB"];
    $_SESSION["address"] = $row["address"];
    $_SESSION["carname"] = $row["car_name"];
    $_SESSION["companyname"] = $row["car_company"];
    $_SESSION["carnumber"] = $row["car_number"];
    $_SESSION["email"] = $row["email"];

                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
    }
}
?>