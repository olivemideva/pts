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
    <style>
      .label-title{
        margin-bottom: 50px;
      }
      label{
        padding-bottom: 50px;
        padding-top: 50px;
      }
    </style>
</head>
<body>

<div class="body">
<a href="<?= base_url('suggested')?>"><span class="las la-arrow-circle-left" id="back"></span></a>

   <form class="add-form" method="POST" action="<?= base_url('decision'); ?>">

   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">
      <input type="hidden" value="<?= $prisoner['prisoner_id']?>" name="prisoner_id">
      <input type="hidden" value="0" name="recommend">
      <?php 
        if(session()->get('loggedUser')){
        $session = session();
        ?>
           <input type="hidden" value="<?=$session->get('loggedUser')?>" name="parole_officer">
    <?php 
        }
         ?>

        <div class="horizontal-group">
          <div class="form-group left">
          <label class="label-title" for="decision">This Prisoner has been suggested for Parole, Do you approve or not? *</label>
        <select name="decision">
            <option value="none" selected>SELECT</option>
            <option value="1">Approve</option>
            <option value="0">Deny</option>
        </select>
        </div>
        </div>

        <div class="form-footer">
        <span>* required</span>
        <button type="submit" class="btn">Done</button>
      </div>
      </div>    

    </form>

</body>
</html>











