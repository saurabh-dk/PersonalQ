<!DOCTYPE html>
<?php
    include './connect.php';

    include './root.html';
    //echo "<script> location.href='./main.php';</script>"
?>

<html>
    <head>
        <title>Register</title>
    </head>

    <body class="main-body">

    <?php 
        if(isset($_POST['button1'])) {
            echo "<script> location.href='./main.php';</script>";
        } else {   
    ?>  
        <div style="text-align: center; margin-top: 5%;">
        <h3> Registration </h3>
        <form style="margin: 0 10% 0 10%;">
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group col-md-4">
                <label for="height">Height</label>
                <input type="number" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="height" placeholder="Height(cm)">
            </div>
            <div class="form-group col-md-4">
                <label for="age">Age</label>
                <input type="number" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="age" placeholder="Age">
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group col-md-4">
                <label for="height">Weight</label>
                <input type="number" class="form-control" id="weight" placeholder="Weight(Kg)">
            </div>
            <div class="form-group col-md-4">
                <label for="zip">Zip-code</label>
                <input type="number" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="zip" placeholder="Zip-code">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        </div>
    <?php    
        }

        $str = "date,county,state,fips,cases,deaths,confirmed_cases,confirmed_deaths,probable_cases,probable_deaths
        2020-12-08,Autauga,Alabama,01001,3043,42,2719,37,324,5
        2020-12-08,Baldwin,Alabama,01003,9821,138,7831,104,1990,34
        2020-12-08,Barbour,Alabama,01005,1224,29,794,25,430,4
        2020-12-08,Bibb,Alabama,01007,1299,39,1155,23,144,16
        2020-12-08,Blount,Alabama,01009,3324,46,2482,44,842,2";

        $arr = explode("\n",$str);
        for($i=1; $i < sizeof($arr); $i++)
        {
            print_r (explode(",",$arr[$i]));
            echo "<br><br>";
        }
    ?>
    
    </body>
</html>