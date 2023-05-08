<?php include_once '../include_part/header.php';?>
<?php include_once '../db.php';?>
<body id="page-top">

    <div id="wrapper">
        <?php include '../include_part/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once '../include_part/nav.php';?>
                <?php
                $records_per_page = 5;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $records_per_page;
                $sql = "SELECT * FROM d_book LIMIT $records_per_page OFFSET $offset";
                $mysql = $conn->query($sql);
                $mysql->setFetchMode( PDO :: FETCH_ASSOC);
                $rows = $mysql->fetchAll();
                ?>
                
                <table  class ='table table-striped table-hover'>
                    <tr>
                        <th>ID</th>
                        <th>Name book</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Publication date</th>
                        <th>amount</th>
                        <th>price</th>
                        <th></th>
                        <th></th>
                    <tr>
                    <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?php echo $r['ID']; ?></td>
                        <td><?php echo $r['name_book']; ?></td>
                        <td><?php echo $r['category_book']; ?></td>
                        <td><?php echo $r['author']; ?></td>
                        <td><?php echo $r['publication_date']; ?></td>
                        <td><?php echo $r['amount']; ?></td>
                        <td><?php echo $r['price'] ?></td>
                        <td>
                            <a href = "update_book.php?Id=<?php echo $r['ID'];?>&file=books" >Edit</a>
                        </td>
                        <td>
                        <a onclick = "return confirm('Are you sure?')"; href="../process/delete.php?Id=<?php echo $r['ID'];?>&file=books">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php
                    $sql_count = "SELECT COUNT(*) as total FROM books";
                    $stmt_count = $conn->query($sql_count);
                    $stmt_count->setFetchMode(PDO::FETCH_ASSOC);
                    $row_count = $stmt_count->fetch();
                    $total_records = $row_count['total'];
                    $total_pages = ceil($total_records / $records_per_page);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                            <li style = 'margin-left: 15px' style = 'margin-left: 15px' class="page-item <?php if ($i==$current_page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav> 
                
                <form style = 'margin-left:15px;' action='insert_book.php' method = 'POST'>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label  class="col-form-label">Insert new record</label>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                <div>
                </form>  
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
        </div>
        <?php include_once '../include_part/footer.php'?>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>