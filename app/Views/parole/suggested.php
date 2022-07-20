<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/parole.css'); ?>">

    <title>PTS</title>
</head>
<body>

<div class="body">
<?php include(APPPATH.'Views\parole\templates\sidebar.php'); ?>
<h2 class="heading">SUGGESTED FOR PAROLE</h2>
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
            <th>More Info</th>
            <th>Respond</th>
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
                <td><a href="'.base_url('fetch_recommended/' .$prisoner["prisoner_id"]).'"><i class="las la-eye"></i></a></td>
                <td><a href="'.base_url('fetch_response/' .$prisoner["prisoner_id"]).'"><i class="bx bxs-message-add"></i></a></td>
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