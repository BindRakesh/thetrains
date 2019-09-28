<?php 
include("include/db.php");
if(isset($_REQUEST['insert']))
    {
       $start = mysqli_real_escape_string($con,$_POST['start']);
       $destination = mysqli_real_escape_string($con,$_POST['destination']); 
       $line= mysqli_real_escape_string($con,$_POST['line']);
       $start_time = mysqli_real_escape_string($con,$_POST['start_time']);
       $destination_time =  mysqli_real_escape_string($con,$_POST['destination_time']);
       $on_sunday = mysqli_real_escape_string($con,$_POST['on_sunday']);
       $source_rank =mysqli_real_escape_string($con,$_POST['source_rank']);
       $destination_rank = mysqli_real_escape_string($con,$_POST['destination_rank']);
       $tempp= strtotime($start_time);     //conrting  string  to time 
       $start_t= date('H:i',$tempp);		//extracting only hours and minute
       $tempp2 = strtotime($destination_time);       //conrting  string  to time 
       $destination_t = date('H:i',$tempp2);		//extracting only hours and minute	
      
// ***********************code to check whether train detail already exist in database or not *************************
       $sel_all = "select * from trains where start='$start' and destination='$destination' and start_time='$start_t' and destination_time='$destination_t'";
       $run_sel_all = mysqli_query($con,$sel_all);
       if($run_sel_all){
       $num_rec = mysqli_num_rows($run_sel_all);
       }
       if($num_rec>0){
       	echo "<script>alert('Train From:$start To:$destination with timing $start_t to $destination_t is already exist in database')</script>";
       	echo "<script>document.open('insert_train.php')</script>";
       }else{
       	//********************************* insert code for harbour line **************************
       	if($line=="h"){
       		$in_train = "insert into trains(start,destination,start_time,destination_time,h,on_sunday,source_rank,destination_rank) values('$start','$destination','$start_t','$destination_t',1,$on_sunday,$source_rank,$destination_rank)";
       $run_in_train = mysqli_query($con,$in_train);
       if($run_in_train){
       	echo "<script>alert('record added')</script>";
       }
       else{
       	echo "<br>data not inserted";
       }
       	}
       	// ****************************for central line*******************
       	elseif($line=="c"){
       		$in_train = "insert into trains(start,destination,start_time,destination_time,c,on_sunday,source_rank,destination_rank) values('$start','$destination','$start_t','$destination_t',1,$on_sunday,$source_rank,$destination_rank)";
       $run_in_train = mysqli_query($con,$in_train);
       if($run_in_train){
       	echo "<script>alert('record added')</script>";
       }
       else{
       	echo "<br>data not inserted";
       }

//************************* for western line *******************
       	}
       	elseif($line=="w"){
       		$in_train = "insert into trains(start,destination,start_time,destination_time,w,on_sunday,source_rank,destination_rank) values('$start','$destination','$start_t','$destination_t',1,$on_sunday,$source_rank,$destination_rank)";
       $run_in_train = mysqli_query($con,$in_train);
       if($run_in_train){
       	echo "<script>alert('record added')</script>";
       }
       else{
       	echo "<br>data not inserted";
       }
//*******************************for trans harbour line *****************

       	}
       	elseif($line=="th"){
       		$in_train = "insert into trains(start,destination,start_time,destination_time,th,on_sunday,source_rank,destination_rank) values('$start','$destination','$start_t','$destination_t',1,$on_sunday,$source_rank,$destination_rank)";
       $run_in_train = mysqli_query($con,$in_train);
       if($run_in_train){
       	echo "<script>alert('record added')</script>";
       }
       else{
       	echo "<br>data not inserted";
       }
       }
       	
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head><title>
	Insert Train Details
</title>
<style>
.mar{
	margin-left: 20vw;
}
</style>
</head>
<body>
	<h1>Insert New Train Details</h1>
<form action=insert_train.php method="POST">

<div class="mar">	
	<table border="1" style="border-spacing: 2px;">
		<tr>
			<td>From: Time </td>
			<td><input type="text" name="start" required="required"></td>
			<td><input type="time" name="start_time" required="required"></td>
		</tr>
		<tr>
			<td>To: Time </td>
			<td><input type="text" name="destination" required="required"></td>
			<td><input type="time" name="destination_time" required="required" title="time"></td>
		</tr>
		<tr>
			<td rowspan="5">Line </td>
		</tr>
		<tr>
			<td colspan="2"><input type="radio" name="line" value="h" required="required">Harbour </td>
		</tr>
		<tr>
			<td colspan="2"><input type="radio" name="line" value="c">Central</td>
		</tr>
		<tr>
			<td colspan="2"><input type="radio" name="line" value="w">Western </td>
		</tr>
		<tr>
			<td colspan="2"><input type="radio" name="line" value="th">Trans-Harbour </td>
		</tr>
		<tr>
			<td> ON Sunday? </td>
			<td colspan="2"> <input type="radio" name="on_sunday" value="1">Yes <input type="radio" name="on_sunday" value="0">No  </td>
		</tr>
              <tr>
                     <td>Source Station Rank</td>
                     <td><input type="number" name="source_rank" required="required"></td>
              </tr>
              <tr>
                     <td>Destination Station Rank</td>
                     <td><input type="number" name="destination_rank" required="required"></td>
              </tr>
		<tr>
			<td colspan="3"><center><input type="submit" name="insert" value="Insert"></center></td>
		</tr>
	</table>
</div>
</form>
<h3> Note: insert Train rank according to station number example: cst-1,masjid bandar-2........khandeshwar-24,panvel-25  like this.</h3> 
</body>
</html>