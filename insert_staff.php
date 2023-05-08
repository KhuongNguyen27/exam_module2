<?php 
    include_once 'include/header.php';
    include_once 'db.php';
    global $conn;
    ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // //
    // if (empty($_POST['Staff_id'])) {
    //     $errors[] = 'Mã nhân viên không được để trống';
    // } else {
    //     $Staff_id= $_GET['Staff_id'];
    // }
    // // 
    // if (empty($_POST['Name_staff'])) {
    //     $errors[] = 'Tên nhân sự không được để trống';
    // } else {
    //     $Name_staff= $_GET['Name_staff'];
    // }
    // // 
    // if (empty($_POST['Position'])) {
    //     $errors[] = 'Vị trí làm việc không được để trống';
    // } else {
    //     $Position= $_GET['Position'];
    // }
    // if (empty($_POST['Chi nhánh'])) {
    //     $errors[] = 'Chi nhánh không được để trống';
    // } else {
    //     $Branch= $_GET['Branch'];
    // }
    // if (empty($_POST['Old'])) {
    //     $errors[] = 'Tuổi không được để trống';
    // } else {
    //     $Old= $_GET['Old'];
    // }
    // if (empty($_POST['Day_of_start'])) {
    //     $errors[] = 'Ngày bắt đầu không được để trống';
    // } else {
    // $Day_of_start= $_GET['Day_of_start'];
    // }
    // if (empty($_POST['Slary'])) {
    //     $errors[] = 'Mức lương không được để trống';
    // } else {
    //     $Slary = $_POST['Slary'];
    // }
        $Name_staff= $_GET['Name_staff'];
        $Position= $_GET['Position'];
        $Branch= $_GET['Branch'];
        $Old= $_GET['Old'];
        $Day_of_start= $_GET['Day_of_start'];
        $Slary = $_GET['Slary'];
    try {
        $sql = "INSERT INTO Staff_list (Name_staff, Position, Branch, Old, Day_of_start, Slary) VALUES ('$Name_staff','$Position','$Branch','$Old','$Day_of_start','$Slary')";
        $conn->query($sql);
        header("Location: index.php");
    }catch(Exception $e){
        if(empty($Name_staff))
            $errors[] = 'Name staff is NOT NULL';
        if(empty($Position))
            $errors[] = 'Position is NOT NULL';
        if(empty($Branch))
            $errors[] = 'Branch is NOT NULL';
        if(empty($Old))
            $errors[] = 'Old is NOT NULL';
        if(empty($Day_of_start))
            $errors[] = 'Day of start is NOT NULL';
        if(empty($Slary))
            $errors[] = 'Slary is NOT NULL';
        }
}
?>
<div id="wrapper">
        <?php include_once 'include/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once 'include/nav.php';?>
                <?php
                    echo '<pre>';
                    if(isset($errors) && count($errors)>0) {
                        for ($i=0; $i < count($errors) ; $i++) { 
                            echo '&nbsp'.$errors[$i].'<br>';
                        }   
                    }
                    echo '</pre>';
                ?>
                <form style = 'margin-left:15px;' action='' method = 'GET'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name staff</label>
                        <input type="text" class="form-control" name='Name_staff' placeholder="Nguyen Huu xxx">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Position</label>
                        <input type="text" class="form-control" name='Position' placeholder="Position">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Branch</label>
                        <input type="text" class="form-control" name='Branch' placeholder="Branch">
                    </div>
                    
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Old</label>
                        <input type="text" class="form-control" name='Old' placeholder="Old">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Day of start</label>
                        <input type="date" class="form-control" name='Day_of_start' placeholder="Day of start">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Slary</label>
                        <input type="text" class="form-control" name='Slary' placeholder="Bigint">
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