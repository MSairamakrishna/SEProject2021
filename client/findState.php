

<?php 
$country=intval($_GET['country']);
include("connect.php");

$query="SELECT * FROM village_mngt WHERE did='$country'";

$result=mysqli_query($conn,$query);

?>
<select name="state" >
<option>Select Taluka</option>
<?php
while($row=mysqli_fetch_array($result)) 
{ 
 	?>
	<option value=<?php echo $row['vid']; ?>>
	<?php echo $row['village']; ?>
	</option>
	<?php 
} ?>
</select>
