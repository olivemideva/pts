<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/station.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pts.css'); ?>">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>PTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .btn {
   display:inline-block;
   padding:10px 20px;
   background-color: black;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:#bcf5e7;
   cursor:pointer;
}

.btn:hover {
  background-color: #fc6a03;
  color:white;
}
</style>
</head>
<body>

<div class="body">
<a href="<?= base_url('view_prisoners'); ?>"><span class="las la-arrow-circle-left" id="back"></span></a>

<form class="add-form" method="POST" action="<?= base_url('#'); ?>">
   <?= csrf_field(); ?>
      <!-- form header -->
      <div class="form-header">
      </div>

      <!-- form body -->
      <div class="form-body">

          <div id="chart_div" style="height: 400px; width: 100%"></div>

</form>

      </div>    

</body>
<!-- Load chart library-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  $(function(){
    Highcharts.chart('chart_div', {

        title: {
            text: 'Prisoner progress'
        },

        yAxis: {
            title: {
                text: 'Rating of field'
            }
        },

        xAxis: {
        categories: <?= $fields ?>
    },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        series: <?= $data ?>,

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

        });
  });
</script>
</html>











