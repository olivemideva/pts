<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/station.css'); ?>">


    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\station\templates\sidebar.php'); ?>

<div class="mainDiv">
  <div class="cardStyle">     
  <form> 
      <h2 class="formTitle">
        CHANGE PASSWORD
      </h2>
      <div class="inputDiv">
      <label class="inputLabel" for="password">Current Password</label>
      <input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" name="npass" class="form-control"  placeholder="New Password">
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Submit
      </button>
    </div>
      
  </form>

  </div>
</div>
</div>

</body>
</html>