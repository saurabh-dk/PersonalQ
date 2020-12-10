<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<!-- Populate enum values from database -->
<?php
function enumDropdown($table_name, $column_name, $echo = true)
{
   $con = mysql_connect(/* SERVER */, /* usr */, /* password */, /* DB NAME*/);
   if(!$con) {die('Could not connect: ' . mysql_error());}
   else { echo "Connection is successful";}

   $selectDropdown = "<select name=\"$column_name\">";
   $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
      WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
   or die (mysql_error());

   $row = mysql_fetch_array($result);
   $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

   foreach($enumList as $value)
      $selectDropdown .= "<option value=\"$value\">$value</option>";

   $selectDropdown .= "</select>";

   if ($echo)
      echo $selectDropdown;

   mysql_close($con);

   return $selectDropdown;
}
?>

<!-- Enforce required fields -->
<?php
// define variables and set to empty values
$nameErr = $usernameErr = $passwordErr = $heightErr = $weightErr = $ageErr = $zipcodeErr = $countyErr = $genderErr = $stateErr = "";
$name = $username = $password = $height = $weight = $age = $zipcode = $county = $gender = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
      $nameErr = "Name is required";
   } else {
      $name = test_input($_POST["name"]);
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
      $weightErr = "weight is required";
   } else {
      $weight = test_input($_POST["weight"]);
   }

   if (empty($_POST["age"])) {
      $ageErr = "age is required";
   } else {
      $age = test_input($_POST["age"]);
   }

   if (empty($_POST["zipcode"])) {
      $zipcodeErr = "zipcode is required";
   } else {
      $zipcode = test_input($_POST["zipcode"]);
   }

   if (empty($_POST["county"])) {
      $countyErr = "county is required";
   } else {
      $county = test_input($_POST["county"]);
   }

   if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
   } else {
      $gender = test_input($_POST["gender"]);
   }

   if (empty($_POST["state"])) {
      $stateErr = "State is required";
   } else {
      $state = test_input($_POST["state"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
?>

<h2>Personal Quarantine Registration</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

   Username: <input type="text" name="username" value="<?php echo $username;?>">
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>
   Password: <input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Gender: <?php echo $enumDropdown("Person", "sex", true); ?>
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Height [cm]: <input type="number" name="height" value="<?php echo $height;?>">
   <span class="error">* <?php echo $heightErr;?></span>
   <br><br>
   Weight [kg]: <input type="number" name="weight" value="<?php echo $weight;?>">
   <span class="error">* <?php echo $weightErr;?></span>
   <br><br>
   Age [whole years]: <input type="number" name="age" maxlength="3" value="<?php echo $age;?>">
   <span class="error">* <?php echo $ageErr;?></span>
   <br><br>
   Zipcode: <input type="number" name="zipcode" maxlength="5" value="<?php echo $zipcode;?>">
   <span class="error">* <?php echo $zipcodeErr;?></span>
   <br><br>
   County: <input type="number" name="county" value="<?php echo $county;?>">
   <span class="error">* <?php echo $countyErr;?></span>
   <br><br>
   State: <?php echo $enumDropdown("County", "state"); ?>
   <span class="error">* <?php echo $stateErr;?></span>
   <br><br>
   SendForm : <input type="submit" name="submit" value="Submit">
</form>

<?php
/*
// authentication for the db connection
$con = mysql_connect("","cis_id","password");

// establish connection to db
if (!$con){
   die('Could not connect: ' . mysql_error()); }

// select db
mysql_select_db("falshehri", $con);

$sql="INSERT INTO Person (username, password, name, sex, zip_code)
VALUES
('$_POST[username]','$_POST[password]','$_POST[name]','$_POST[gender]','$_POST[zipcode]')";

if (!mysql_query($sql,$con)){
  die('Error: ' . mysql_error()); }

// Insertion into Person table is successful, insert into county now
$sql="INSERT INTO County (fips, state, county_name, person_id)
VALUES
('999','$_POST[state]','$_POST[county]','$_POST[person_id]')";    // Manually fetch person_id
echo "Registration successful. Try logging in now **INSERT LOG IN PAGE URL HERE**."; }

// close connection to db
mysql_close($con)

*/
?>

</body>
</html>