<?php
session_start();
$user_id = $_SESSION['user_id'];


?>

<?php
$output = '';


if($user_id){
	if($_POST['search']!=""){
		include 'connect.php';
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM users WHERE username LIKE '%$searchq%'") or die("Could not search");
		$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'There was no friend like that name !';
		}
		else{
			while($row = mysql_fetch_array($query)){
				echo '<a href="'.$row['username'].'">'.$row['username'].'</a><br>';
				$username = $row['username'];
				$output .= '<div> '.$username.'</div>';
			}
				
		}
		
		
		//echo '<br><br><a href='.'>Go Home</a>';
		
		echo'<br><br><button type="submit" class="btn btn-success btn-xs" onclick="history.back();">Back</button>';
		
		
		
		
		
	}
}
?>