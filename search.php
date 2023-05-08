<?php include_once 'include/header.php';?>
<?php include_once 'db.php';?>
<body id="page-top">
    <div id="wrapper">
        <?php include 'include/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php 
                include_once 'include/nav.php';
                $sql = "SELECT * FROM `Staff_list`";
                try{
                    $s = $_GET["s"];
                    $sql .= "WHERE Staff_list.ID LIKE '$s' OR Staff_list.Name_staff LIKE '$s'OR Staff_list.Position LIKE '$s'OR Staff_list.Branch LIKE '$s'OR Staff_list.Old LIKE '$s'OR Staff_list.Day_of_start LIKE '$s' OR Staff_list.Slary LIKE '$s'";
                }
                catch(Exception $e){
                    $sql = "SELECT * FROM `Staff_list`";
                }
                    
                $mysql = $conn->query($sql);
                $mysql->setFetchMode( PDO :: FETCH_ASSOC);
                $rows = $mysql->fetchAll();
                ?>
                <b style='font-family-monospace:  SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; font-size:24px; margin-left:15px;'>Manager Staff</b>
                <table  class ='table table-striped table-hover'>
                    <tr>
                        <th>ID</th>
                        <th>Name staff</th>
                        <th>Position</th>
                        <th>Branch</th>
                        <th>Old</th>
                        <th>Day of start</th>
                        <th>Slary</th>
                        <th></th>
                        <th></th>
                    <tr>
                    <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?php echo 'NS00'.$r['ID']; ?></td>
                        <td><?php echo $r['Name_staff']; ?></td>
                        <td><?php echo $r['Position']; ?></td>
                        <td><?php echo $r['Branch']; ?></td>
                        <td><?php echo $r['Old']; ?></td>
                        <td><?php echo $r['Day_of_start']; ?></td>
                        <td><?php echo $r['Slary']; ?></td>
                        <td>
                            <a onclick = "return confirm('Are you sure?')"; href="process/delete.php?id=<?php echo $r['ID'];?>">Delete</a>
                        </td>
                        <td>
                            <a href="update_staff.php?id=<?php echo $r['ID'];?>">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                
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
?>