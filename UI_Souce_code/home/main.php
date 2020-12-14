<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<?php
    include_once './../../connect.php';
    include './../root.html';
?>

<?php

    if(isset($_POST['vitalsSubmit'])) {
        $query = "INSERT INTO Vitals (temperature";
        $temp = $_POST['temp'];
        if(!empty($_POST['heartrate'])) {
            $query .= ", heartbeat_rate";
        }
        if(!empty($_POST['oxygen'])) {
            $query .= ", oxygen_level";
        }
        if(!empty($_POST['testName'])) {
            $query .= ", test_type";
        }
        if($_POST['testRes']!=10) {
            $query .= ", test_result";
        }
        $query .= ", username) VALUES (".$temp;
        if(!empty($_POST['heartrate'])) {
            $query .= ",". $_POST['heartrate'];
        }
        if(!empty($_POST['oxygen'])) {
            $query .= ",". $_POST['oxygen'];
        }
        if(!empty($_POST['testName'])) {
            $query .= ",". $_POST['testName'];
        }
        if($_POST['testRes']!=10) {
            $query .= ",". $_POST['testRes'];
        }
        $query .= ", \"". $_SESSION['username'] . "\")";
        $conn = new mysqli (DB_HOST, DB_USER, $_SESSION['admin_password'], DB_NAME, DB_PORT);

        if ($conn->connect_errno) { echo $conn->connect_error; }

        if ($conn->query($query) === TRUE) {
            echo "Vitals added";
        } else {

            echo("Error description: " . $query . mysqli_error($conn));
        }
        
	    $conn->close();
    }

?>
<html>
    <head>
        <title>PersonalQ</title>
        <link rel="stylesheet" href="main.css" type="text/css" />
    </head>
    <body>
        <div class="main-body">
            <div style="width: 35%; padding: 12px;">
                <canvas id="myChart"></canvas>

            </div>
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vitals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Metrics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Exposure</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="symptom-tab" data-toggle="tab" href="#symptom" role="tab" aria-controls="symptom" aria-selected="false">Symptoms</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div style="text-align: center;">
                <form action="./main.php" style="margin: 20px 5%;" method="POST">
                    <div class="form-row" >
                        <div class="form-group col-md-4">
                            <label for="temp">Temperature (C)</label>
                            <input type="number" class="form-control" id="temp" name="temp" placeholder="Temperature">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="heartrate">Heart Rate (bpm)</label>
                            <input type="number" name="heartrate" min="0" step="1" oninput="validity.valid||(value='');" class="form-control" id="heartrate" placeholder="Heart rate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="oxygen">Oxygen Level (%)</label>
                            <input type="number" min="0" name="oxygen" step="1" oninput="validity.valid||(value='');" class="form-control" id="oxygen" placeholder="Oxygen Level">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="testName">Name of the test</label>
                            <input type="number" name="testName" class="form-control" id="testName" placeholder="Test Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="testRes">Was the test result positive</label>
                            <select id="testRes" name="testRes" class="form-control">
                                <option selected value="10">Choose...</option>
                                <option value="P">Positive</option>
                                <option value="N">Negative</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="vitalsSubmit">Update</button>
                </form>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
                        View History
                    </button>
                </div>


                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Your Vitals History</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                        $conn = new mysqli ($DB_HOST, $DB_USER, $_SESSION['admin_password'], $DB_NAME, $DB_PORT);

                                        if ($conn->connect_errno) { echo $conn->connect_error; }
                            
                                        $get_all_select = $conn->query ("SELECT * FROM Vitals where username=\"".$_SESSION['username']."\" ORDER BY timestamp DESC");
                            
                                        if ($get_all_select->num_rows > 0) //if values returned
                                        {
                                            echo "<table class=\"table\">
                                                <thead>
                                                    <tr>
                                                    <th scope=\"col\">Time</th>
                                                    <th scope=\"col\">Temperature</th>
                                                    <th scope=\"col\">Heartbeat</th>
                                                    <th scope=\"col\">Oxygen (%)</th>
                                                    <th scope=\"col\">Test Name</th>
                                                    <th scope=\"col\">Test Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                            while ($row = $get_all_select->fetch_assoc ()) //loop through
                                            {
                                                
                                                echo  "<tr>
                                                    <th scope=\"row\">".$row['timestamp']."</th>
                                                    <td>".$row['temperature']."</td>
                                                    <td>".$row['heartbeat_rate']."</td>
                                                    <td>".$row['oxygen_level']."</td>
                                                    <td>".$row['test_type']."</td>
                                                    <td>".$row['test_result']."</td>
                                                    </tr>";
                                                   
                                            }
                                            echo "
                                            </tbody>
                                            </table>";
                                        } else {
                                            echo "No results to display";
                                        }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2>Metrics</h2>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <h2>Exposure</h2>
                </div>
                <div class="tab-pane fade" id="symptom" role="tabpanel" aria-labelledby="contact-tab">
                    <h2>Symptoms</h2>
                </div>
            </div>
        </div>
    </body>
</html>

<script>    
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<?php
if (isset ($_POST['submit'])) // If submit button pressed
{
	$passwd = $_POST['password'];
	$conn = new mysqli (DB_HOST, DB_USER, $passwd, DB_NAME, DB_PORT);

	if ($conn->connect_errno) { echo $conn->connect_error; }

	//create new connection object
	$get_all_select = $conn->query ("SELECT name_first FROM authors");
	if ($get_all_select->num_rows) //if values returned
	{
		while ($row = $get_all_select->fetch_assoc ()) //loop through
		{
			echo $row["name_first"] . "<br>";
		}
	}//end inner-if
	else
	{
		echo "no results returned.<br>\n";
	}
	$conn->close ();
	unset ($_POST); 
}
else
{
?> 
    <!-- <div class="main-body"> 
        <form method="post" action="main.php">
            Enter password: <input type="password" name="password"><br>
            <input type="submit" name="submit">
        </form>
    </div> -->
<?php
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/nytimes/covid-19-data/master/live/us-counties.csv');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

// echo $data;

$str = "date,county,state,fips,cases,deaths,confirmed_cases,confirmed_deaths,probable_cases,probable_deaths
2020-12-09,Autauga,Alabama,01001,3087,42,2751,37,336,5
2020-12-09,Baldwin,Alabama,01003,9974,141,7928,105,2046,36
2020-12-09,Barbour,Alabama,01005,1240,30,796,26,444,4
2020-12-09,Bibb,Alabama,01007,1317,39,1171,23,146,16";

$arr = explode("\n", $data);

$query = "INSERT INTO CASES (cases_count, county_fips)\n";

$firstLine = true;
$tempString = "VALUES ";
for ($i=1, $len=count($arr); $i<$len; $i++) {
    
    
    // parse the values in the line at hand
    $city_data = explode(",", $arr[$i]);
    $case_count = $city_data[4];
    $county_fips = $city_data[3];
    
    // death count is optional
    // if(empty($city_data[5])) {
    //     $death_count = "";
    // }
    // else {
    //     $death_count = $city_data[5];
    // }
    
    if (!empty($county_fips)) {
        if(!$firstLine) {
            $tempString .= ",\n";
        }
        else {
            $firstLine = false;
        }
        $tempString .= "(";
        
        $tempString .= $case_count . "," . $county_fips;
        $tempString .= ")\n\n\n";
    }

}

$query .= $tempString;        // @NOTE: do not include the semi-colon at the end of the query so it can be used by mysql_query() call as is.

// print $query;



?>
</body>
</html>
