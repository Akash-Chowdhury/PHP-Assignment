<?php
	$conn = mysqli_connect('localhost','root','','test');
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Values</title>
</head>
<style>
	body {
		overflow-x: hidden;

	}
	.delete{
		margin-top: 1em;
		margin-left: 3em;
	}
</style>

<body>
	<div class="delete">
		<form method="post" action="deletedata.php">
			<button type="submit" name="delete_all_data" class="btn btn-danger">Delete All Data</button>
		</form>
	</div>
	<table class="table my-2 mx-3">
		<thead>
			<tr>
				<th scope="col">Serial No.</th>
				<th scope="col">Random Values</th>
			</tr>
		</thead>
		<tbody>
			<?php
	function getstr($length = 16)
	{
	    $keys = array_merge(range(0, 9), range('a', 'z'));
	    $key = "";
	    for ($i = 0; $i < $length; $i ++) {
	        $key .= $keys[mt_rand(0, count($keys) - 1)];
	    }
	    $randomString = $key;
	    return $randomString;
	}
	$count=1;
	$number=$_GET['entry'];
	if(isset($_GET['submit'])){
		
		while($count<=$number){
			$randstr=getstr();
			$sql="insert into ai values('$randstr')";
			$result=mysqli_query($conn, $sql);
			if($result) {
					echo '<tr>
						<th scope="row">'.$count.'</th>
						<td>'.$randstr.'</td>
					   <td>
					</tr>';
				
			}
			else{
				echo "Error: " .$sql ."<br>" . mysqli_error($conn);
				
			}
			$count=$count+1;
			
		}


	}
	?>
		</tbody>
	</table>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>

</html>

</html>