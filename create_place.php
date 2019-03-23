<?php require_once 'actions/db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="col-lg-3">
    <h2>Add Item Here</h2>
    <form class="form-horizontal" action="actions/a_create_place.php" method="POST">

      <div class="form-group">
        <label class="control-label col-sm-2">Item Name</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" name="itemname">
        </div>
      </div>
         <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Item Type</label>
        <div class="col-sm-10">          
         <input type="text" class="form-control" placeholder="" name="itemtype">  
      </div>
    </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Item Description</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" placeholder="" name="itemdescr">
        </div>
      </div>
       <div class="form-group">
      <label class="control-label col-sm-2">Item Web Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="https://examplelink" name="itemweb"> 
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

           foreach ($rows as $row) {
            echo "<option value='".$row['locationID']."'>".$row['locationAddress']."</option>";
          }
          ?>   
        </select>
      </div>
    </div>
    <button type="submit">Insert Item</button>
</form>
    <a href="admin.php"><button type="button">Back</button>
    </body>
    </html>