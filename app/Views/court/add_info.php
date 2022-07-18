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
<?php include(APPPATH.'Views\court\templates\sidebar.php'); ?>

   <form class="add-form" method="POST" action="<?= base_url('add_info'); ?>">

   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">
      <input type="hidden" value="<?= $defendants['detainee_id']?>" name="detainee_id">

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="first_name" class="label-title">Defendant's First name *</label>
            <input type="text" id="first_name" class="form-input" placeholder="Enter first name" name="first_name" value="<?php echo $defendants['first_name'] ?>" readonly/>
          </div>
          <div class="form-group right">
            <label for="last_name" class="label-title">Defendant's Last name *</label>
            <input type="text" id="last_name" class="form-input" placeholder="Enter last name" name="last_name" value="<?php echo $defendants['last_name'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="date" class="label-title">Defendant was Arrested on *</label>
            <input type="date" id="date" class="form-input" placeholder="Enter arrest date" name="arrested_on" value="<?php echo $defendants['arrested_on'] ?>" readonly/>
          </div>
          <div class="form-group right">
          <label for="firstname" class="label-title">Defendant was Arrested for *</label>
            <input type="text" id="cause" class="form-input" placeholder="Enter arrest cause" name="arrested_for" value="<?php echo $defendants['arrested_for'] ?>" readonly/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label class="label-title" for="is_guilty">The defendant is??</label>
                   <select name="is_guilty">
                     <option value="none" selected>SELECT</option>
                     <option value="1">Guilty</option>
                     <option value="0">Not Guilty</option>
                   </select>
            </div>
            <div class="form-group right">
            <label class="label-title" for="punishment">If guilty, punishment??</label>
                   <select name="punishment">
                     <option value="none" selected>SELECT</option>
                     <option value="2">Jail term</option>
                     <option value="1">Fine</option>
                     <option value="0">Community service</option>
                   </select>
            </div>
          </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="bothnames" class="label-title">Defendant was Arrested by *</label>
            <input type="text" id="bothnames" class="form-input" placeholder="Enter arrest officer name" name="arrested_by" value="<?php echo $defendants['arrested_by'] ?>" readonly/>
          </div>
          <div class="form-group right">
          <label for="experience" class="label-title">If Jail term what is the sentence? *</label>
            <input type="text" class="form-input" name="sentence"/>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
          <label for="experience" class="label-title">If fine how much is the amount? *</label>
            <input type="text" class="form-input" name="fine"/>>
            </div>
            <div class="form-group right">
            <label for="experience" class="label-title">If community service, How long? *</label>
            <input type="text" class="form-input" name="community_service"/>
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











