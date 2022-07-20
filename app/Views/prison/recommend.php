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
<a href="<?= base_url('view_prisoners')?>"><span class="las la-arrow-circle-left" id="back"></span></a>

   <form class="add-form" method="POST" action="<?= base_url('recommend'); ?>">

   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">
      <input type="hidden" value="<?= $prisoner['prisoner_id']?>" name="prisoner_id">

        <div class="horizontal-group">
          <div class="form-group left">
          <label class="label-title">Do you want to recommend prisoner for parole? *</label>
        <label for="improvement"><input type="radio" name="recommend" value="1" id="improvement"> Recommended</label>
        <label for="no_improvement"><input type="radio" name="recommend" value="0" id="no_improvement"> Not Recommended</label>
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











