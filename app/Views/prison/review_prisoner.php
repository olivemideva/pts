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
<a href="<?= base_url('view_prisoners'); ?>"><span class="las la-arrow-circle-left" id="back"></span></a>

   <form class="add-form" method="POST" action="<?= base_url('prisoner_review'); ?>">

   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">
      <input type="hidden" value="<?= $review_prisoner['prisoner_id']?>" name="prisoner_id">

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="first_name" class="label-title">Prisoner's First name *</label>
            <input type="text" id="first_name" class="form-input" placeholder="Enter first name" name="first_name" value="<?php echo $review_prisoner['first_name'] ?>" readonly/>
          </div>
          <div class="form-group right">
            <label for="last_name" class="label-title">Prisoner's Last name *</label>
            <input type="text" id="last_name" class="form-input" placeholder="Enter last name" name="last_name" value="<?php echo $review_prisoner['last_name'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="arrested_for" class="label-title">Prisoner was Arrested for *</label>
            <input type="text" id="cause" class="form-input" placeholder="Enter arrest cause" name="arrested_for" value="<?php echo $review_prisoner['arrested_for'] ?>" readonly/>
          </div>
          <div class="form-group right">
          <label for="gender" class="label-title">Prisoner's Gender *</label>
            <input type="text" id="cause" class="form-input" placeholder="Gender" name="gender" value="<?php echo $review_prisoner['gender'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="participation" class="label-title">Participation *</label>
            <input type="number" max="10" step=".1" id="participation" class="form-input" placeholder="Participation review out of 10" name="participation"/>
          </div>
          <div class="form-group right">
          <label for="behaviour" class="label-title">Behaviour *</label>
            <input type="number" max="10" step=".1" id="behaviour" class="form-input" placeholder="Behaviour review out of 10" name="behaviour"/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="team_work" class="label-title">Team Work *</label>
            <input type="number" max="10" step=".1" id="team_work" class="form-input" placeholder="Team Work review out of 10" name="team_work"/>
          </div>
          <div class="form-group right">
          <label for="social_interaction" class="label-title">Social Interaction *</label>
            <input type="number" max="10" step=".1" id="social_interaction" class="form-input" placeholder="Social interaction review out of 10" name="social_interaction"/>
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











