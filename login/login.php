<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<?php
    include_once './../../connect.php';

    include './../root.html';

    //echo $_SESSION["admin_password"];
?>

<?php

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = $password = "";
    $usernameErr = $passwordErr = "";
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
     } else {
        $username = test_input($_POST["username"]);
     }
  
     if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
     } else {
        $password = test_input($_POST["password"]);
     }

     if (!empty($username) && !empty($password)) {
         
        $conn = new mysqli ($DB_HOST, $DB_USER, $_SESSION['admin_password'], $DB_NAME, $DB_PORT);
        
        if ($conn->connect_errno) { echo $conn->connect_error; }

        $get_all_select = $conn->query ("SELECT * FROM Person where username=\"".$username."\" AND binary password=\"".$password."\"");
        if ($get_all_select->num_rows > 0) //if values returned
        {
            while ($row = $get_all_select->fetch_assoc ()) //loop through
            {
                // echo $row["username"] . "<br>";
                // echo $row["county_fips"] . "<br>";
                $_SESSION["name"] = $row["name"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["age"] = $row["age"];
                $_SESSION["zipcode"] = $row["zip_code"];
                $_SESSION["fip"] = $row["county_fip"];
                $_SESSION["sex"] = $row["sex"];
                echo "<script> location.href='./../home/main.php';</script>";
            }
        } else {
            echo "No Users with that username found.";
        }
     }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css" type="text/css" />
    <title>Login</title>
</head>
<body>
        <div style="text-align: center; margin-top: 5%;">
            <h3> Login </h3>
            
            <form action="./login.php" style="margin: 0 30%;" method="POST">
                <div class="form-row" >
                    <div class="form-group col-md-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        <span class="error"><?php echo $usernameErr;?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <span class="error"><?php echo $passwordErr;?></span>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary" name="loginSubmit">Login</button>
        </form>
        <a class="nav-link active" href="./../register/register.php">New? Register here</a>
</body>
</html>