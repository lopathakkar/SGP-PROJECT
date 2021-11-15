<?php
// connect to the database
$server="localhost:3306";
$username="root";
$password="";
$database_name="costumer_details";
$errors = array();
$con = mysqli_connect($server, $username, $password, $database_name);
if($con){
    if (isset($_POST['add'])) {
        // receive all input values from the register.php form
        $username = mysqli_real_escape_string($con, $_POST['name']);
        $DOB = mysqli_real_escape_string($con, $_POST['DOB']);
        $date_data = date ('Y-m-d', strtotime($DOB));
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $carname = mysqli_real_escape_string($con, $_POST['carname']);
        $companyname = mysqli_real_escape_string($con, $_POST['companyname']);
        $carnumber = mysqli_real_escape_string($con, $_POST['carnumber']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        // by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($email)) {
        array_push($errors, "Email is required");
        }
        if (empty($password)) {
        array_push($errors, "Password is required");
        }
            //fistly check in database that a user does not already exist with the same username and/or email.
        $get_all = "SELECT * FROM car WHERE name='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $get_all);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['name'] === $username) {
                array_push($errors, "Username is already existed");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email is already existed");
            }
        }

        // Finally, register user if no error
        if (count($errors) == 0) {
            $pwd = md5($password);//encrypt the password before inserting in the database

            $register = "INSERT INTO car (name, DOB, address, car_name, car_company, car_number, email, password)
                    VALUES('$username', '$date_data','$address', '$carname', '$companyname', '$carnumber', '$email', '$password')";
            mysqli_query($con, $register);
            header('Location: index.php');
        }
    }
}
?>