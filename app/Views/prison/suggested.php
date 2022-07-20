<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/parole.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\prison\templates\sidebar.php'); ?>
<h2 class="heading">RECOMMENDED FOR PAROLE</h2>
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
        </tr>
    </thead>
    <tbody>
    <?php
        
        if($suggested){
            foreach($suggested as $prisoner){
                echo '<tr>
                <td>'.$prisoner["prisoner_id"].'</td>
                <td>'.$prisoner["first_name"].'</td>
                <td>'.$prisoner["last_name"].'</td>
                <td>'.$prisoner["gender"].'</td>
                <td>'.$prisoner["arrested_for"].'</td>
                <td>'.$prisoner["sentence"].'</td>
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