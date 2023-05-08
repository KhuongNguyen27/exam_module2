<?php 
    include_once '../include_part/header.php';
    include_once '../db.php';
    global $conn;
    $id = $_GET['Id'];
    $sql = "SELECT * FROM books WHERE ID = $id";
    $mysql = $conn->query($sql);
    $mysql->setFetchMode(PDO :: FETCH_ASSOC);
    $rows = $mysql->fetchAll();
    $rows = $rows[0];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name_book = $_POST['name_book'];
        $category_id = $_POST['category_id'];
        $author = $_POST['author'];
        $publication_date = $_POST['publication_date'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $sql = "UPDATE books SET name_book = '$name_book', category_id = '$category_id', author = '$author', publication_date = '$publication_date', amount = '$amount', price = '$price' WHERE ID = $id ";
        try{ 
            $conn->query($sql);
            $sql = "UPDATE books SET name_book = $name_book, category_id = $category_id, author = $author, publication_date = $publication_date, amount = $amount, price = $price WHERE ID = $id ";
            $Time = date('Y-m-d H:i:s');
            $home = "INSERT INTO home(TableChange,Record,Time) VALUES('call_card','$sql','$Time')";
            $mysql = $conn->query($home);
            header("Location: books.php");
        } catch(Exception $e) {
            echo "Error: <br>" . $sql . "<br>Please contact admin to fix problem";
}
}
?>
<div id="wrapper">
        <?php include '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <form style = 'margin-left:15px;' action='' method = 'POST'>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name='name_book' value="<?php echo $rows['name_book'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Category</label>
                        <input type="text" class="form-control" name='category_id' value="<?php echo $rows['category_id'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Author</label>
                        <input type="text" class="form-control" name='author' value="<?php echo $rows['author'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Publication of date</label>
                        <input type="text" class="form-control" name='publication_date' value="<?php echo $rows['publication_date'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Amount</label>
                        <input type="text" class="form-control" name='amount' value="<?php echo $rows['amount'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Price</label>
                        <input type="text" class="form-control" name='price' value="<?php echo $rows['price'];?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script src=../"vendor/jquery/jquery.min.js"></script>
<script src=../"vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src=../"vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src=../"js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src=../"vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src=../"js/demo/chart-area-demo.js"></script>
<script src=../"js/demo/chart-pie-demo.js"></script>