<?php 
include("include/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head><title>
	Find Trains
</title>
<style>
.mar{
	margin-left: 20vw;
} 
td{
	padding: 4px;
}

.table
{  margin: 0 0 40px 0
  width: 100%
  box-shadow: 0 1px 3px rgba(0,0,0,0.2)
  display: table
}
</style>
</head>
<body>
	<h1>Find Trains</h1>
<form action=find_trains.php method="POST">

<div class="mar">	
	<table border="1" style="border-spacing: 2px;">
		<tr>
			<td>From: </td>
			<td><input type="text" name="a" required="required"></td>
		</tr>
		<tr>
			<td colspan="2"><center><div class="arrow-up icon">,</div></center></td>
		</tr>
		<tr>
			<td >To:</td>
			<td><input type="text" name="b" required="required"></td>
		</tr>
		<tr> 
			<td colspan="2" style="padding: 4px;"><center><input type="submit" name="find" value="Find Trains" ></center> </td>
		</tr>	
	</table>
</div>
</form>
</body>
</html>
<?php
if(isset($_REQUEST['find']))
{
$source=  mysqli_real_escape_string($con,$_POST['a']);
$destination = mysqli_real_escape_string($con,$_POST['b']);
echo "$source,$destination";
if($source!="" && $destination!=""){
	//***********************************fetching rank and other details of source station ****************************************
	$sel_a= "SELECT * FROM stations WHERE station_name LIKE '$source'";
	$run_a= mysqli_query($con,$sel_a);
	$res_a= mysqli_fetch_array($run_a);
	$rank_a = $res_a['rank'];
	//********************code to fetch the line of source station *****************
	$line_a_h = $res_a['h'];
	$line_a_c = $res_a['c'];
	$line_a_w = $res_a['w'];
	$line_a_th = $res_a['th'];
	if($line_a_h==1)
	{
		$line_a="h"; 
	}elseif ($line_a_c==1) {
		$line_a="c";
	}elseif($line_a_w==1){
		$line_a="w";
	}elseif($line_a_th==1){
		$line_a="th";
	}
	else{
		echo "no line";
	}


	//*********************************** fetching rank and other details of destination station **********************************
	$sel_b= "SELECT * FROM stations WHERE station_name LIKE '$destination'";
	$run_b= mysqli_query($con,$sel_b);
	$res_b= mysqli_fetch_array($run_b);
	$rank_b = $res_b['rank'];
	//********************code to fetch the line of destination station *****************
	$line_b_h = $res_a['h'];
	$line_b_c = $res_b['c'];
	$line_b_w = $res_b['w'];
	$line_b_th = $res_b['th'];
	if($line_b_h==1)
	{
		$line_b="h"; 
	}elseif ($line_b_c==1) {
		$line_b="c";
	}elseif($line_b_w==1){
		$line_b="w";
	}elseif($line_b_th==1){
		$line_b="th";
	}
	else{
		echo "no line";
	}

//******************code to determine Traveling up or down**********************
	if($rank_a>$rank_b)	{
		$travelling="up";
	}else{
		$travelling="down";
	}
	echo "<br> travelling:$travelling";
	echo "<br>line:$line_a to $line_b";
	echo "<br>source rank:$rank_a <br>destination rank:$rank_b";

//*****************************seleting train details*********************************
	echo "<table style='border:1px solid #ddd;'>
	<tr>
	<th>From</th>
	<th>start</th>
	<th>To</th>
	<th>end</th>
	</tr>
	";
	if($line_a=="h" && $line_b=="h" && $travelling=="up"){
		$sel_train = "SELECT * FROM trains WHERE h=1 AND source_rank>=$rank_a";
		$run_sel_train = mysqli_query($con,$sel_train);
		while($res_sel_train = mysqli_fetch_assoc($run_sel_train)){
			// $train=$res_sel_train['start'];
			$start=$res_sel_train['start'];
			$start_time = $res_sel_train['start_time'];
			$destination = $res_sel_train['destination'];
			$destination_time = $res_sel_train['destination_time'];
			echo"
			<tr>
			<td>'$start'</td>
			<td>'$start_time'</td>
			<td>'$destination'</td>
			<td>'$destination_time'</td>
			</tr>
			";
			// echo "train start point: $train";
		}

	}elseif($line_a=="h" && $line_b=="h" && $travelling=="down"){
		$sel_train = "SELECT * FROM trains WHERE h=1 AND source_rank<=$rank_a";
		$run_sel_train = mysqli_query($con,$sel_train);
		while($res_sel_train = mysqli_fetch_assoc($run_sel_train)){
			// $train=$res_sel_train['start'];
			$start=$res_sel_train['start'];
			$start_time = $res_sel_train['start_time'];
			$destination = $res_sel_train['destination'];
			$destination_time = $res_sel_train['destination_time'];
			echo"
			<tr>
			<td>'$start'</td>
			<td>'$start_time'</td>
			<td>'$destination'</td>
			<td>'$destination_time'</td>
			</tr>
			";
			// echo "train start point: $train";
		}

	}

echo"</table>";

}
else{
	echo "<sricpt>alert('please enter source and destination')</script>";
}
}

?>
