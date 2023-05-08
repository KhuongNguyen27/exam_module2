<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name_book = $_GET['name_book'];
    $category_id = $_GET['category_id'];
    $author = $_GET['author'];
    $publication_date = $_GET['publication_date'];
    $amount = $_GET['amount'];
    $price = $_GET['price'];
    $sql = "INSERT INTO books (name_book,category_id,author,publication_date,amount,price) VALUES ('$name_book','$category_id','$author','$publication_date','$amount','$price')";
    try{
        $conn->query($sql);
        $sql = "INSERT INTO books (name_book,category_id,author,publication_date,amount,price) VALUES ($name_book,$category_id,$author,$publication_date,$amount,$price)";
        $Time = date('Y-m-d H:i:s');
        $home = "INSERT INTO home(TableChange,Record,Time) VALUES('call_card','$sql','$Time')";
        $mysql = $conn->query($home);
        header("Location: books.php");
    } catch(Exception $e) {
        // echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'GET'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name='name_book' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Category</label>
                        <input type="text" class="form-control" name='category_id' placeholder="Number">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Author</label>
                        <input type="text" class="form-control" name='author' placeholder="Char">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Publication of date</label>
                        <input type="text" class="form-control" name='publication_date' placeholder="YY/MM/DD">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Amount</label>
                        <input type="text" class="form-control" name='amount' placeholder="Number">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Price</label>
                        <input type="text" class="form-control" name='price' placeholder="Number">
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