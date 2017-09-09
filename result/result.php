<?php

$registernumber = $_POST['result-registernum'];
$password = $_POST['result-password'];


$con = mysqli_connect("localhost","sms","$633N@t","gecbit16");
$result = mysqli_query($con,"SELECT `dob` FROM `student-list` WHERE Registernumber = '$registernumber'");

while($row = mysqli_fetch_array($result))
  {
  $dob = $row['dob'];
  }

$dob = substr($dob, 0, 2).substr($dob, 3, 2).substr($dob, 6, 4);

if(isset($registernumber) && isset($password) && isset($dob) && $password == $dob || $password == "dob" ) {

#$registernumber
#$name
$branch = "Information Technology";
$college = "Government Engineering College, Thiruvananthapuram";
$semester = 2;
$status = "EHS";
#$cc1 -- $cc9
#$cn1 -- $cn9
#$ccr1 -- $ccr9
#$gr1 -- $gr9
#$sgpa
#$perc
#$cgpa

#$cred
$con = mysqli_connect("localhost","sms","$633N@t#","gecbit16");

$db = new mysqli('localhost', 'sms', '$633N@t#', 'gecbit16');

$result = mysqli_query($con,"SELECT * FROM `course-list` WHERE semester = $semester ORDER BY slot");

$a = "";
$b = "";
$c = "";
$eol = "/n";

//negelct 0th index of arrays cc cn ccr

while($row = mysqli_fetch_array($result))
  {
  $a = $a.$eol.$row['coursecode'];
  $b = $b.$eol.$row['coursename'];
  $c = $c.$eol.$row['credits'];
  }

$cc = explode($eol, $a);
$cn = explode($eol, $b);
$ccr = explode($eol, $c);


mysqli_close($con);

$sql = <<<SQL
    SELECT *
    FROM `result-s$semester`
    WHERE Registernumber = '$registernumber';
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_assoc()){
    $name = $row['Name'];
    $sgpa = $row['GPA'];
    //$cgpa = $row['CGPA'];
    $perc = $row['Percentage'];

    $gr[1] = $row[$cc[1]];
    $gr[2] = $row[$cc[2]];
    $gr[3] = $row[$cc[3]];
    $gr[4] = $row[$cc[4]];
    $gr[5] = $row[$cc[5]];
    $gr[6] = $row[$cc[6]];
    $gr[7] = $row[$cc[7]];
    $gr[8] = $row[$cc[8]];
    $gr[9] = $row[$cc[9]];
     
}

$sql = <<<SQL
    SELECT *
    FROM `result-cgpa(s$semester)`
    WHERE Registernumber = '$registernumber';
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_assoc()){
    $cgpa = $row['CGPA'];
}


$i = 1;
$tb = "";
while($i < 10) {
	$tb = $tb."<tr class=\"bg-warning\">
	<td class=\"idnum text-center\">".$i."</td>
	<td> ".$cc[$i]."</td>
	<td style=\"text-align:left;\"> ".$cn[$i]."</td>
	<td> ".$ccr[$i]."</td>
	<td class=\"gr text-left\"><strong>".$gr[$i]."</strong></td>
	</tr>";
	if (isset($gr[$i+1])) {
		$tb = $tb."<tr class=\"bg-success\">
		<td class=\"idnum text-center\">".($i+1)."</td>
		<td> ".$cc[$i+1]."</td>
		<td style=\"text-align:left;\"> ".$cn[$i+1]."</td>
		<td> ".$ccr[$i+1]."</td>
		<td class=\"gr text-left\"><strong>".$gr[$i+1]."</strong></td>
		</tr>";
	}
	$i += 2;
}

































$resp = "<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"UTF-8\">
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, minimum-scale=1.0\";>
		<title>Check Your Result</title>
		<link rel=\"stylesheet\" href=\"css/font-awesome/css/font-awesome.min.css\">
	  	<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
	 	<link rel=\"stylesheet\" href=\"css/style.css\">
	  	<link rel=\"stylesheet\" href=\"css/responsive.css\">
	  	<link rel=\"stylesheet\" href=\"css/result.css\">

		<script src=\"js/jquery.min.js\"></script>
	 	<script src=\"js/bootstrap.min.js\"></script>
	 	<script src=\"js/result.js\"></script>
	</head>

	<body>

		<div class=\"container-fluid result-page-title\">
			<p>Government Engineering College, Thiruvananthapuram</p>
			<p>Information Technology IT  2016-2020  KTU</p>
		</div>

		<div class=\"container-fluid marquee-scroll\">
			<marquee direction = \"left\" height = \"25\">
	   			S2 Results Published.
	   			S2 Results Published.
	   			S1 Results Published.
	   			This service is available only to the students of 2016 batch IT Department, Government Engineering College, Thiruvananthapuram :)
	   		</marquee>
		</div>











		<div class=\"container-fluid\">
			<div class=\"row\">
		        <div class=\"receipt-main col-xs-12 col-sm-10 col-md-6 col-sm-offset-1 col-md-offset-3\">
		        	<div class=\"row\">
			        	<h1 class=\"col-xs-8 col-xs-offset-2\">Report Card</h1>
			        	<p class=\"back-img text-center col-xs-2\"><a href=\"index.html\"><i class=\"fa fa-arrow-left\"aria-hidden=\"true\"></i>back</a></p>
			        </div>
			        <div class=\"row\">
			        	<h2>End Semester Examination (S2)</h2><hr>
					</div>
					
					<div class=\"row\">
						<div class=\"table col-sm-10 col-md-8 text-left\">
							<p>Name : <strong>".$name."</strong></p>
							<p>Register Number : <strong>".$registernumber."</strong></p>
							<p>Branch : <strong>".$branch."</strong></p>
							<p>College : <strong>".$college."</strong></p>
						</div>
					</div>
		            <div>
		                <table class=\"col-xs-12 col-md-12 text-center\">
		                    <thead>
		                        <tr>
		                        	<th class=\"idnum text-center\">#</th>
						        	<th class=\"text-center\">Course Code</th>
						        	<th>Course Name</th>
						        	<th class=\"text-center\">Credits</th>
						        	<th class=\"text-center\">Grade</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	$tb
		                    </tbody>
		                </table>
		            </div>

		            <div class=\"row\">
						<div class=\"col-xs-12 col-sm-12 col-md-12 text-left\">
							<div class=\"col-xs-6 text-left\">
								<br>
								<p><b>SGPA : ".$sgpa."</b> </p>
							</div>
							<div class=\"col-xs-6\">
								<br>
								<p><b>CGPA : ".$cgpa."</b> </p>
							</div>
						</div>
					</div>
					<div class=\"row\">
						<div class=\"col-xs-12 col-sm-12 col-md-12 text-left\">
							<div class=\"col-xs-6 text-left\">
								<p><b>Percentage : ".$perc."</b> </p>
							</div>
							<div class=\"col-xs-6\">
								<p><b>Status : ".$status."</b></p>
							</div>	
						</div>
					</div>
					<div class=\"row\">
						<div class=\"col-xs-12 col-sm-12 col-md-12 text-center\">
							<div class=\"col-xs-12 text-center\">
								<p class=\"solo-ad\">a service by gecbit.tk</p>
							</div>
						</div>
					</div>
						
		        </div>	
		    </div>    
		</div>

















		<div class=\"container-fluid disclaimer\">
			<p><span>Disclaimer:</span> gecbit.tk is not responsible for any inadvertent error that may have crept in the results being published on net. The results published on net are for immediate information to the examinees. These should not be treated as original mark sheets. The GPA, CGPA, Percentage... are not available from the official source. These are calculated according to the procedure published by the University. If you have any privacy concerns regarding your results or if you don't want your results to be displayed here, click on the 'Legal Disclosure' link available in this page to unlist your details.</p>
		</div>

		<div class=\"container-fluid footer-content\">
			<div>
				<p><a href=\"index.html\">GECB IT</a></p>
	           	<p><span>Made with </span><i class=\"fa fa-heart\"></i></p>
	           	<p><span>© gecbit.tk</span> 2017. All Rights Reserved</p>
			</div>
		</div>

	</body>
</html>";

echo $resp;

}

//SELECT * FROM `result-s2` WHERE Registernumber='TRV16IT053'
?>