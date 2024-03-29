<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\admin\templates\sidebar.php'); ?>
<h2 class="heading">USERS</h2>
    <div class="styled-table">
              <table class="styled-table">

    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Othername</th>
            <th>Email Address</th>
            <th>National ID</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        if($users){
            foreach($users as $user){
                echo '<tr>
                <td>'.$user["user_id"].'</td>
                <td>'.$user["first_name_u"].'</td>
                <td>'.$user["last_name_u"].'</td>
                <td>'.$user["other_name"].'</td>
                <td>'.$user["email"].'</td>
                <td>'.$user["national_id"].'</td>
                <td>0'.$user["mobile"].'</td>
                <td>'.$user["roles"].'</td>
                <td><button type="button" onclick="delete_data('.$user["user_id"].')" class = "btn btn-danger">Suspend</button></td>
                </tr>';
            }
        }

        ?>     
       
    </tbody>
</table>

<?php

if($pagination_link){
    $pagination_link->setPath('manage_users');

    echo $pagination_link->links();
}

?>
        </div>
</div>

</body>
</html>
<style>
    .pagination li a{
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: 200px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .pagination li.active a{
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
<script>
    function delete_data(id)
    {
        if(confirm("Are you sure you want to delete this User?"))
        {
            window.location.href="<?php echo base_url(); ?>/delete_user/"+id;
        }
        return false;
    }
</script>