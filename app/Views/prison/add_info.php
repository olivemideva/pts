<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/station.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pts.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<a href="<?= base_url('new_prisoners'); ?>"><span class="las la-arrow-circle-left" id="back"></span></a>

   <form class="add-form" method="POST" action="<?= base_url('prison_addinfo'); ?>">

   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">
      <input type="hidden" value="<?= $info_prisoner['detainee_id']?>" name="detainee_id">

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="first_name" class="label-title">Prisoner's First name *</label>
            <input type="text" id="first_name" class="form-input" placeholder="Enter first name" name="first_name" value="<?php echo $info_prisoner['first_name'] ?>" readonly/>
          </div>
          <div class="form-group right">
            <label for="last_name" class="label-title">Prisoner's Last name *</label>
            <input type="text" id="last_name" class="form-input" placeholder="Enter last name" name="last_name" value="<?php echo $info_prisoner['last_name'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="arrested_for" class="label-title">Prisoner was Arrested for *</label>
            <input type="text" id="cause" class="form-input" placeholder="Enter arrest cause" name="arrested_for" value="<?php echo $info_prisoner['arrested_for'] ?>" readonly/>
          </div>
          <div class="form-group right">
          <label for="gender" class="label-title">Prisoner's Gender *</label>
            <input type="text" id="cause" class="form-input" placeholder="Gender" name="gender" value="<?php echo $info_prisoner['gender'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="cell_no" class="label-title">Prisoner's Cell number *</label>
            <input type="text" id="cell_no" class="form-input" placeholder="Enter cell number" name="cell_no"/>
          </div>
          <div class="form-group right">
          <label for="date" class="label-title">Prisoner was Admitted on *</label>
            <input type="date" id="date" class="form-input" placeholder="Enter admission date" name="admitted_on"/>
          </div>
        </div>

        <div class="form-footer">
        <span>* required</span>
        <button type="submit" class="btn">Save</button>
      </div>
      </div>    

    </form>

</body>
</html>











