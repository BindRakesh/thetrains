<?php 
include("include/db.php");
if(isset($_REQUEST['insert']))
    {
       $station_name = $_POST["station_name"];
       $line= mysqli_real_escape_string($con,$_POST['line']);
       $rank= mysqli_real_escape_string($con,$_POST['rank']);  


//***********************code to check whether station name already exist in database or not *************************
       $sel_all = "select * from stations where station_name='$station_name'";
       $run_sel_all = mysqli_query($con,$sel_all);
       if($run_sel_all){
       $num_rec = mysqli_num_rows($run_sel_all);
       }
       if($num_rec>0){
       	echo "<script>alert('this station name is already exist in database')</script>";
       	echo "<script>document.open('insert_train.php')</script>";
       }else{			//****************code for inserting station data in database *******************

       if($line=="h"){
	$insert = "insert into stations(id,station_name,h,rank) values (id,'$station_name',1,'$rank')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<script>alert('data inserted') </script>";
	}
	else{
		echo "<script>alert('data not inserted inserted') </script>";		
	}
}elseif($line=="c"){
	$insert = "insert into stations(id,station_name,c,rank) values (id,'$station_name',1,'$rank')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<script>alert('data inserted') </script>";
	}
	else{
		echo "<script>alert('data not inserted inserted') </script>";		
	}
	}elseif($line=="w"){
		$insert = "insert into stations(id,station_name,w,rank) values (id,'$station_name',1,'$rank')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<script>alert('data inserted') </script>";
	}
	else{
		echo "<script>alert('data not inserted inserted') </script>";		
	}
	}elseif($line=="th"){
		$insert = "insert into stations(id,station_name,th,rank) values (id,'$station_name',1,'$rank')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<script>alert('data inserted') </script>";
	}
	else{
		echo "<script>alert('data not inserted inserted') </script>";		
	}
	}   
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head><title>
	Insert Station Details
</title>
<style>
.mar{
	margin-left: 20vw;
}
</style>
</head>
<body>
	<h1>Insert New Station Details</h1>
<form action=insert_station.php method="POST">

<div class="mar">	
	<table border="1" style="border-spacing: 2px;">
		<tr>
			<td>Station Name </td>
			<td><input type="text" name="station_name" required="required"></td>
		</tr>
		<tr>
			<td rowspan="5">Line </td>
		</tr>
		<tr>
			<td><input type="radio" name="line" value="h" required="required">Harbour </td>
		</tr>
		<tr>
			<td><input type="radio" name="line" value="c">Central</td>
		</tr>
		<tr>
			<td><input type="radio" name="line" value="w">Western </td>
		</tr>
		<tr>
			<td><input type="radio" name="line" value="th">Trans-Harbour </td>
		</tr>
		<tr>
			<td> Rank </td>
			<td> <input type="text" required="required" name="rank"> </td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="insert" value="Insert"></center></td>
		</tr>
	</table>
</div>
</form>
<h3> Note: insert Train rank according to station number example: cst-1,masjid bandar-2........khandeshwar-24,panvel-25  like this.</h3> 
</body>
</html>