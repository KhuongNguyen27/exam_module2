<?php include_once 'include/header.php';?>
<?php include_once 'db.php';?>
<body id="page-top">
    <div id="wrapper">
        <?php include 'include/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php 
                include_once 'include/nav.php';
                include_once 'table.php';
                ?>
            <?php include_once 'include/footer.php'?>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>