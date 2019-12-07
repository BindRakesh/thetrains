<?php
date_default_timezone_set("Asia/kolkata");
$checkTime = strtotime('09:00:59');
			echo 'Check Time : '.date('H:i:s', $checkTime);
			echo '<hr>';
			
			$loginTime = strtotime('09:01:00');
			$diff = $checkTime - $loginTime;
			echo 'Login Time : '.date('H:i:s', $loginTime).'<br>';
			echo ($diff < 0)? 'Late!' : 'Right time!'; echo '<br>';
			echo 'Time diff in sec: '.abs($diff);
			
			echo '<hr>';
			
			$loginTime = strtotime('09:00:59');
			$diff = $checkTime - $loginTime;
			echo 'Login Time : '.date('H:i:s', $loginTime).'<br>';
			echo ($diff < 0)? 'Late!' : 'Right time!';
			
			echo '<hr>';
			-
			$loginTime = strtotime('09:00:00');
			$diff = $checkTime - $loginTime;
			echo 'Login Time : '.date('H:i:s', $loginTime).'<br>';
			echo ($diff < 0)? 'Late!' : 'Right time!';


?>