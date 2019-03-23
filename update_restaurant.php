<?php 

require_once 'actions/db_connect.php';

if($_GET['id']) {
	$id = $_GET['id'];

	$sql = "SELECT * FROM restaurants WHERE restaurantID = {$id}";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();


	?>

	<div class="col-lg-3">
		<h2>Edit Item Here</h2>
		<form class="form-horizontal" action="actions/a_update_restaurant.php" method="POST">

			<div class="form-group">
				<label class="control-label col-sm-2">Item Name</label>
				<div class="col-sm-10">
					<input type="name" class="form-control" name="itemname" value="<?php 
					echo $row['restaurantName']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd">Item Tel</label>
				<div class="col-sm-10">          
					<input type="text" class="form-control" name="itemtel" value="<?php 
					echo $row['restaurantTel']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Item Descr</label>
				<div class="col-sm-10">          
					<input type="text" class="form-control" placeholder="" name="itemdescr" value="<?php 
					echo $row['restaurantDescr']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd">Item Type</label>
				<div class="col-sm-10">          
					<input type="text" class="form-control" placeholder="" name="itemtype" value="<?php 
					echo $row['restaurantType']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Item Web Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="https://examplelink" name="itemweb" value="<?php 
					echo $row['restaurantWebAddress']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Item Location</label>
				<div class="col-sm-10">          
					<select name="itemloc">
						<?php 
						$sql = "SELECT * from `location`;";
						$result = mysqli_query($conn, $sql);
						$rows = $result->fetch_all(MYSQLI_ASSOC);

						foreach ($rows as $row1) {
							echo "<option value='".$row1['locationID']."'>".$row1['locationAddress']."</option>";
						}
						?>   
					</select>
				</div>
			</div>

			<input type="hidden" name="id" value="<?php echo $row['restaurantID']?>">
			<button type="submit">Save Changes</button>
			<a href="admin.php"><button type="button">Back</button></a>
		</form>
	</div>
	<?php
}
?>