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

   <form class="add-form" method="post" action="<?= base_url('new_detainee'); ?>">

      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="first_name" class="label-title">Detainee's First name *</label>
            <input type="text" id="first_name" class="form-input" placeholder="Enter first name" name="first_name" value="<?= set_value('first_name'); ?>"/>
          </div>
          <div class="form-group right">
            <label for="last_name" class="label-title">Detainee's Last name *</label>
            <input type="text" id="last_name" class="form-input" placeholder="Enter last name" name="last_name" value="<?= set_value('last_name'); ?>" />
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="date" class="label-title">Detainee's Arrested on *</label>
            <input type="date" id="date" class="form-input" placeholder="Enter arrest date" name="arrested_on" min="2022-07-20" max="2022-07-21" value="<?= set_value('arrested_on'); ?>"/>
          </div>
          <div class="form-group right">
            <label for="time" class="label-title">Detainee's Arrest time *</label>
            <input type="time" class="form-input" id="time" placeholder="enter arrest time" name="arrested_time" value="<?= set_value('arrested_time'); ?>">
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">Detainee's Arrested for *</label>
            <input type="text" id="cause" class="form-input" placeholder="Enter arrest cause" name="arrested_for" value="<?= set_value('arrested_for'); ?>"/>
          </div>
          <div class="form-group right">
            <label for="bothnames" class="label-title">Detainee's Arrested by *</label>
            <input type="text" id="bothnames" class="form-input" placeholder="Enter arrest officer name" name="arrested_by" value="<?= set_value('arrested_by'); ?>"/>
          </div>
        </div>

        <div class="horizontal-group">
          <div class="form-group left">
            <label class="label-title">Detainee's Gender *:</label>
            <div class="input-group">
              <label for="male"><input type="radio" name="gender" value="male" id="male"> Male</label>
              <label for="female"><input type="radio" name="gender" value="female" id="female"> Female</label>
            </div>
          </div>
          <div class="form-group right">
            <label for="experience" class="label-title">Detainee's Age *</label>
            <input type="number" min="18" max="80"  value="18" class="form-input" name="age" value="<?= set_value('age'); ?>"/>
          </div>
        </div>
        <div class="form-group">
          <label for="choose-file" class="label-title">Detainee's Possession</label>
          <textarea class="form-input" rows="3" cols="50" style="height:auto" name="posessions" value="<?= set_value('posessions'); ?>"></textarea>
        </div>
        <div class="form-footer">
        <span>* required</span>
        <button type="submit" class="btn">Create</button>
      </div>
      </div>    

      <div class="form-group">
        <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>
    </div>
    <div class="form-group">
    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    </div>
    </form>

    </div>
</body>
</html>