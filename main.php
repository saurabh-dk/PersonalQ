<!DOCTYPE html>
<?php
    include './connect.php';
    include './root.html';
?>
<html>
    <head>
        <title>  Open connection to ECC MariaDB server </title>
    </head>
<body>
<div class="main-body"> 
    <div style="text-align: center">
        <h2> Personal Quarantine </h2>
    </div>
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
            <h2>Vitals</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec mattis purus. Proin quis felis maximus, consequat diam non, blandit massa. Donec libero lacus, tempus ornare ex at, vulputate elementum orci. Sed vitae nibh vestibulum, lacinia justo sit amet, elementum orci. Aenean ac mi in diam malesuada viverra id id tellus. Sed auctor eget sapien vel sagittis. Nulla facilisi. Suspendisse urna sem, scelerisque ac fringilla nec, faucibus rhoncus massa. Vestibulum velit nisi, luctus faucibus aliquet et, sollicitudin ac est. Duis aliquet pharetra augue non lobortis. Sed varius nisi magna, at eleifend massa porttitor sed. Vestibulum iaculis nulla eget pulvinar ornare. Proin non elit at justo porta porta. Praesent viverra nibh eget pellentesque elementum. Sed blandit, metus id suscipit malesuada, ligula ex blandit ex, non vehicula odio sapien ut enim. Vestibulum ullamcorper urna et vehicula rhoncus.

Cras congue diam sit amet libero vehicula sagittis. Suspendisse quis purus blandit, lacinia lacus sit amet, eleifend est. Etiam tellus tellus, varius a leo vitae, vestibulum pharetra massa. Sed varius elementum tortor ac vehicula. Donec maximus in quam ac elementum. Quisque sit amet ante efficitur, gravida sapien et, tincidunt lacus. Morbi vitae pharetra nibh, sed vulputate mauris. Mauris vitae lectus in ex facilisis pharetra.

Curabitur elit neque, tincidunt placerat fringilla vitae, pellentesque in ante. Nullam varius neque non nibh auctor, in suscipit urna sollicitudin. Nullam sed molestie velit, ac eleifend diam. Vestibulum faucibus, dui vitae lobortis hendrerit, ex elit sagittis sem, ac facilisis massa arcu quis sapien. Aenean at maximus nibh, ultrices blandit dui. Nulla massa nibh, congue vel ultrices sed, cursus vel mi. Aenean ullamcorper nisl sed venenatis aliquam. Nunc pellentesque, erat eget tincidunt porttitor, felis risus viverra arcu, quis laoreet felis justo eu nisl. Nam ultrices diam id metus varius, vitae consequat lorem vehicula. Morbi at justo ac est pretium pellentesque. Donec posuere sodales facilisis. Duis elit arcu, mollis in consectetur quis, interdum id enim. Nam lorem nulla, rhoncus tristique dapibus ut, ultrices non turpis. Suspendisse finibus mauris diam, id iaculis lectus ultrices vitae.

Pellentesque mollis lorem ultrices, tincidunt velit non, volutpat velit. In lectus neque, scelerisque quis felis id, laoreet bibendum metus. Cras sollicitudin quis ipsum fermentum tristique. Vivamus tempus rhoncus tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras hendrerit, magna vitae maximus maximus, felis purus lacinia velit, nec mattis ex magna nec elit. Vestibulum quam lacus, commodo vel ipsum quis, lacinia gravida tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

Curabitur eget ornare nisl. Etiam tempus ligula sit amet consequat ornare. Aenean accumsan arcu erat, et laoreet metus euismod bibendum. Vestibulum vel turpis sem. Nunc vulputate tortor sit amet consequat fermentum. Vestibulum porttitor iaculis diam semper molestie. Nullam iaculis ligula nulla, et molestie dui accumsan non. Suspendisse blandit, metus ut imperdiet porta, urna lorem euismod odio, et cursus lacus dui vitae neque. Sed sit amet nibh viverra, ultricies sapien et, venenatis nibh. Morbi dignissim, risus non fringilla vehicula, neque dolor facilisis lorem, quis semper nunc libero vel erat. Nulla a odio mauris. Phasellus efficitur lorem quis vehicula lobortis.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/nytimes/covid-19-data/master/live/us-counties.csv');
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $data = curl_exec($ch);
// curl_close($ch);

echo $data;
?>
</body>
</html>
