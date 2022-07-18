<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/prison.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\prison\templates\sidebar.php'); ?>

<div class="styled-table">
        <table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Arrested For</th>
            <th>Sentence</th>
            <th>ADD INFO</th>
        </tr>
    </thead>
    <tbody>
    <?php
        
        if($new_prisoner){
            foreach($new_prisoner as $prisoner){
                echo '<tr>
                <td>'.$prisoner["detainee_id"].'</td>
                <td>'.$prisoner["first_name"].'</td>
                <td>'.$prisoner["last_name"].'</td>
                <td>'.$prisoner["gender"].'</td>
                <td>'.$prisoner["arrested_for"].'</td>
                <td>'.$prisoner["sentence"].'</td>
                <td><a href="'.base_url('fetch_prisoner/' .$prisoner["detainee_id"]).'"><i class="bx bxs-edit"></i></a></td>
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