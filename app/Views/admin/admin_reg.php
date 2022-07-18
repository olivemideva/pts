<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\admin\templates\sidebar.php'); ?>

   <form class="add-form" method="post" action="<?= base_url('add_user'); ?>">

      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">

        <div class="horizontal-group">
          <div class="form-group left">
            <label for="first_name" class="label-title">User's First name *</label>
            <input type="text" id="first_name" class="form-input" placeholder="Enter first name" name="first_name"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></span>
          </div>
          <div class="form-group right">
            <label for="last_name" class="label-title">User's Last name *</label>
            <input type="text" id="last_name" class="form-input" placeholder="Enter last name" name="last_name"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'last_name') : '' ?></span>
          </div>
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="other_name" class="label-title"> User's Other name </label>
            <input type="text" id="other_name" class="form-input" placeholder="Enter other name *optional*" name="other_name"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'other_name') : '' ?></span>
          </div>
          <div class="form-group right">
            <label for="email" class="label-title">User's email address *</label>
            <input type="email" class="form-input" id="time" placeholder="Enter email address" name="email"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
          </div>
          <div class="horizontal-group">
          <div class="form-group left">
            <label for="nationalid" class="label-title">User's national id*</label>
            <input type="text" id="national" class="form-input" placeholder="Enter national id" name="national_id"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'national_id') : '' ?></span>
          </div>
          <div class="form-group right">
            <label for="contact" class="label-title">User's phone number*</label>
            <input type="text" id="contact" class="form-input" placeholder="Enter phone number" name="mobile"/>
            <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'mobile') : '' ?></span>
          </div>
        </div>

        <div class="horizontal-group">
          <div class="form-group left">
            <label class="label-title" for="gender"> User's Gender</label>
                   <select name="gender">
                     <option value="none" selected>SELECT</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                   </select>
                   <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'gender') : '' ?></span>
            </div>
          </div>
          <div class="form-group right">
            <label class="label-title" for="role"> User's Role</label>
                   <select name="role">
                     <option value="none" selected>SELECT</option>
                     <option value="3">Police officer</option>
                     <option value="2">Court official</option>
                     <option value="1">Prison warden</option>
                     <option value="4">Parole officer</option>
                     <option value="0">Admin</option>
                   </select>
                   <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'role') : '' ?></span>
          </div>
        </div>

        <div class="form-footer">
        <span>* required</span>
        <button type="submit" class="btn">Register</button>
      </div>
      </div>  

        </div>
      </div>    

    </form>

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
</div>

</body>
</html>











