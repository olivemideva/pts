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
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <span class="text">PTS <br>COURT </span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="court.php">
                    <i class='bx bxs-user' ></i>
                    <span class="text">View Profile</span>
                </a>
            </li>
            <li>
                <a href="change-password.php">
                    <i class='bx bxs-edit' ></i>
                    <span class="text">Change Password</span>
                </a>
            </li>
            <li>
                <a href="view-defendants.php">
                    <i class='bx bx-menu' ></i>
                    <span class="text">View Defendants</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">DASHBOARD</a>
        <!-- NAVBAR -->

        </nav>
    </section>
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
        <tr>
            <td>ST1</td>
            <td>Wachira</td>
            <td>Dominic</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        <tr>
            <td>ST2</td>
            <td>Machira</td>
            <td>Devin</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        <tr>
            <td>ST3</td>
            <td>Wafula</td>
            <td>Dominic</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        <tr>
            <td>ST4</td>
            <td>Winstone</td>
            <td>Ndiragu</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        <tr>
            <td>ST5</td>
            <td>Wachira</td>
            <td>Dominic</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        <tr>
            <td>ST6</td>
            <td>Wachira</td>
            <td>Dominic</td>
            <td>15-05-2002</td>
            <td>Dominic Stevo</td>
            <td>Stealing chickens</td>
            <td><i class='bx bxs-edit' ></i></td>
        </tr>
        
       
    </tbody>
</table>
    </div>

</div>
    <script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i=> {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})


const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
    if(window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if(searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
})


if(window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
    if(this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})

const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if(this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})
    </script>
</body>
</html>