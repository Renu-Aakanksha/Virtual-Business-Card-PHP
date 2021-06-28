<?php
	include('db.php');
	$category_id=$_POST["category_id"];
	$result = $con->query("SELECT * FROM `category` where `parent`='$category_id'");
?>
<option value="">Select SubCategory</option>
<?php
if ($result->num_rows > 0) {
	while($row = $con->fetch_assoc()) {
	?>
	<option>hello</option>
		<option value="<?php echo $row["id"];?>"><?php echo $row["category"];?></option>
	<?php
	}
}

?>