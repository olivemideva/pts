<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/court.css'); ?>">

    <title>PTS</title>
</head>
<body>
    <div class="body">
<?php include(APPPATH.'Views\court\templates\sidebar.php'); ?>
<h2 class="heading">DEFENDANTS</h2>
<div class="styled-table">
        <table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Arrested On</th>
            <th>Arrested By</th>
            <th>Arrested for</th>
            <th>Add Info</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        if($detainees){
            foreach($detainees as $detainee){
                echo '<tr>
                <td>'.$detainee["detainee_id"].'</td>
                <td>'.$detainee["first_name"].'</td>
                <td>'.$detainee["last_name"].'</td>
                <td>'.$detainee["arrested_on"].'</td>
                <td>'.$detainee["arrested_by"].'</td>
                <td>'.$detainee["arrested_for"].'</td>
                <td><a href="'.base_url('fetch_detainee/' .$detainee["detainee_id"]).'"><i class="bx bxs-edit "></i></a></td>
                </tr>';
            }
        }

        ?> 
       
    </tbody>
</table>
    </div>
    </div>
</body>
</html>