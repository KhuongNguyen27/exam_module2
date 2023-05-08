<?php 
    include_once 'include/header.php';
    include_once 'db.php';
    global $conn;
    $id = $_GET['id'];
    // khởi tạo câu truy vấn
    $sql = "SELECT * FROM staff_list WHERE ID = '$id'";
    // khởi tạo đối tượng chứa kết quả truy vấn trả về
    $mysql = $conn->query($sql);
    // thiết lập kiểu dữ liệu trả về
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    // khởi tạo biến chứa giá trị trả về
    $rows = $mysql->fetchAll();
    // Lấy giá trị cần thiết
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name_staff= $_POST['Name_staff'];
    $Position= $_POST['Position'];
    $Branch= $_POST['Branch'];
    $Old= $_POST['Old'];
    $Day_of_start= $_POST['Day_of_start'];
    $Slary= $_POST['Slary'];
    $sql = "UPDATE Staff_list SET Name_staff = '$Name_staff', Position='$Position', Branch = '$Branch', Old='$Old', Day_of_start='$Day_of_start', Slary='$Slary' WHERE ID = '$id'";
    try { 
        $conn->query($sql);
        header("Location: index.php");
    }catch(Exception $e) {
        echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include 'include/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once 'include/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'POST'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name staff</label>
                        <input type="text" class="form-control" name='Name_staff' value = "<?php echo $rows['Name_staff']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Position</label>
                        <input type="text" class="form-control" name='Position' value = "<?php echo $rows['Position']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Branch</label>
                        <input type="text" class="form-control" name='Branch' value = "<?php echo $rows['Branch']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Old</label>
                        <input type="text" class="form-control" name='Old' value = "<?php echo $rows['Old']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Day of start</label>
                        <input type="text" class="form-control" name='Day_of_start' value = "<?php echo $rows['Day_of_start']?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Slary</label>
                        <input type="text" class="form-control" name='Slary' value = "<?php echo $rows['Slary']?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

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