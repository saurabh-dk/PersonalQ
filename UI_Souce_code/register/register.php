<?php
session_start();
?>
<!DOCTYPE html>
<?php
    include_once './../../connect.php';

    include './../root.html';
    //echo "<script> location.href='./main.php';</script>";
?>

<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="register.css" type="text/css" />
    </head>

    <body>

    <?php 

    // We were able to fetch ENUM contraint values (like for sex, 'M' and 'F')
    // But we were unable to parse them and show them in a dropdown. Same with 
    // States and counties. Hence, as an alternative, we had to hardcode those
    // values. To makes them dynamic, we have stored the raw values into PHP
    // valiables.

    $states = [
        "Alabama", 
        "Alaska",
        "Arizona", 
        "Arkansas", 
        "California", 
        "Colorado", 
        "Connecticut",  
        "Delaware", 
        "District of Columbia", 
        "Florida", 
        "Georgia", 
        "Hawaii", 
        "Idaho", 
        "Illinois", 
        "Indiana", 
        "Iowa", 
        "Kansas", 
        "Kentucky", 
        "Louisiana", 
        "Maine", 
        "Maryland", 
        "Massachusetts",
        "Michigan", 
        "Minnesota", 
        "Mississippi", 
        "Missouri", 
        "Montana", 
        "Nebraska", 
        "Nevada", 
        "New Hampshire", 
        "New Jersey", 
        "New Mexico", 
        "New York", 
        "North Carolina", 
        "North Dakota", 
        "Northern Mariana Islands",
        "Ohio", 
        "Oklahoma", 
        "Oregon", 
        "Pennsylvania", 
        "Puerto Rico",
        "Rhode Island", 
        "South Carolina", 
        "South Dakota", 
        "Tennessee", 
        "Texas", 
        "Utah", 
        "Vermont", 
        "Virginia", 
        "Virgin Islands",
        "Washington", 
        "West Virginia", 
        "Wisconsin", 
        "Wyoming"];

        $nameErr = $usernameErr = $passwordErr = $heightErr = $weightErr = $ageErr = $zipcodeErr = $countyErr = $genderErr = $stateErr = "";
        $name = $username = $password = $height = $weight = $age = $zipcode = $county = $gender = $state = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if(isset($_SESSION['passw'])) {
            $_POST['passw'] = $_SESSION['passw'];
        }

        if(isset($_POST['passw'])) {

            $conn = new mysqli ($DB_HOST, $DB_USER, $_POST['passw'], $DB_NAME, $DB_PORT);

            if ($conn->connect_errno) { echo $conn->connect_error; }

            $get_all_select = $conn->query ("SELECT county_name, fips FROM County");

            if ($get_all_select->num_rows > 0) //if values returned
            {
                $_SESSION["admin_password"] = $_POST['passw'];
                $counties = [];
                while ($row = $get_all_select->fetch_assoc ()) //loop through
                {
                    $counties[$row["fips"]] = $row["county_name"];
                }
            } else {
                echo "No results to display";
            }


                if (empty($_POST["personName"])) {
                   $nameErr = "Name is required";
                } else {
                   $name = test_input($_POST["personName"]);
                }
             
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
             
                if (empty($_POST["height"])) {
                   $heightErr = "Height is required";
                } else {
                   $height = test_input($_POST["height"]);
                }
             
                if (empty($_POST["weight"])) {
                   $weightErr = "Weight is required";
                } else {
                   $weight = test_input($_POST["weight"]);
                }
             
                if (empty($_POST["age"])) {
                   $ageErr = "Age is required";
                } else {
                   $age = test_input($_POST["age"]);
                }
             
                if (empty($_POST["zip"])) {
                   $zipcodeErr = "Zip-code is required";
                } else {
                   $zipcode = test_input($_POST["zip"]);
                }
             
                if ($_POST["inputCounty"]==0) {
                   $countyErr = "County is required";
                } else {
                   $county = test_input($_POST["inputCounty"]);
                }
             
                if ($_POST["inputSex"]==10) {
                   $genderErr = "Gender is required";
                } else {
                   $gender = test_input($_POST["inputSex"]);
                }
             
                // if (empty($_POST["state"])) {
                //    $stateErr = "State is required";
                // } else {
                //    $state = test_input($_POST["state"]);
                // }

                // echo $name . $username. $password.$height.$weight.$weight.$age.$zipcode.

                if (!empty($name) && !empty($username) && !empty($password)
                    && !empty($height) && !empty($weight) && !empty($age)
                    && !empty($zipcode) && ($county!=0) && ($gender!=10)) {
                        $get_all_select = $conn->query ("SELECT username FROM Person where username=\"".$username."\"");

                        if ($get_all_select->num_rows > 0) //if values returned
                        {
                            $usernameErr = "Username already exists";
                            $username = "";
                        } else {
                            $sql = "INSERT INTO Person (username, password, name, sex, zip_code, county_fips)
                            VALUES (\"".$username."\", \"".$password."\", \"".$name."\",\"".$gender."\", ".$zipcode.", ".$county.")";
                            if ($conn->query($sql) === TRUE) {  
                                $_SESSION["name"] = $name;
                                $_SESSION["username"] = $username;
                                $_SESSION["age"] = $age;
                                $_SESSION["zipcode"] = $zipcode;
                                $_SESSION["fip"] = $county;
                                $_SESSION["sex"] = $gender;

                                $metric = "INSERT INTO Metrics (weight, height, age, username) 
                                VALUES (\"".$weight."\", \"".$height."\", \"".$age."\",\"".$username."\")";
                                if ($conn->query($metric) === TRUE) { 
                                    $_SESSION["weight"] = $weight;
                                    $_SESSION["height"] = $height;
                                    echo "<script> location.href='./../home/main.php';</script>";
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            $conn->close();
                        }
                    } else {
                        echo "in else ";
                    }
            
        ?>
        <div style="text-align: center; margin-top: 5%;">
        <h3> Registration </h3>
        <form action="./register.php" style="margin: 5% 10% 0 10%;" method="POST">
            <div class="form-row" >
                <div class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <span class="error"><?php echo $usernameErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="height">Height</label>
                    <input type="number" name="height" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="height" placeholder="Height(cm)">
                    <span class="error"><?php echo $heightErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="age">Age</label>
                    <input type="number" min="0" name="age" step="1" oninput="validity.valid||(value='');" class="form-control" id="age" placeholder="Age">
                    <span class="error"><?php echo $ageErr;?></span>
                </div>
            </div>
            <div class="form-row" >
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <span class="error"><?php echo $passwordErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="weight">Weight</label>
                    <input type="number" name="weight" class="form-control" id="weight" placeholder="Weight(Kg)">
                    <span class="error"><?php echo $weightErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="zip">Zip-code</label>
                    <input type="number" name="zip" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="zip" placeholder="Zip-code">
                    <span class="error"><?php echo $zipcodeErr;?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="personName">Name</label>
                    <input type="text" class="form-control" id="personName" name="personName" placeholder="Your name">
                    <span class="error"><?php echo $nameErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCounty">County</label>
                    <select id="inputCounty" name="inputCounty" class="selectpicker form-control" data-live-search="true">
                        <option selected value="0">Choose...</option>
                        <?php
                            foreach($counties as $fip => $county) {
                                echo "<option value=\"".$fip."\">".$county."</option>";
                            }
                        ?>
                    </select>
                    <span class="error"><?php echo $countyErr;?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputSex">Sex</label>
                    <select id="inputSex" name="inputSex" class="selectpicker form-control">
                        <option selected value="10">Choose...</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <span class="error"><?php echo $genderErr;?></span>
                </div>
            </div>
            <input type="hidden" name="passw" value = <?php echo $_POST['passw'] ?>>
            <button type="submit" class="btn btn-primary" name="registerSubmit">Register</button>
        </form>
        <a class="nav-link active" href="./../login/login.php">Already registered? Login here</a>
        </div>
        <?php
        } else {
            ?>
            <form action="register.php" method="POST">
                Enter Password <input name="passw" type="password">
                <input type="submit" name="submit">
            </form>
        
        
    <?php    
        }
    ?>
    
    </body>
</html>