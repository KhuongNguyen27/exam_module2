<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                $records_per_page = 5;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $records_per_page;
                $sql = "SELECT * FROM staff_list LIMIT $records_per_page OFFSET $offset";
                $mysql = $conn->query($sql);
                $mysql->setFetchMode( PDO :: FETCH_ASSOC);
                $rows = $mysql->fetchAll();
                ?>
                <b style='font-family-monospace:  SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; font-size:24px; margin-left:15px;'>Manager Staff</b>
                <table  class ='table table-striped table-hover'>
                    <tr>
                        <th>Staff id</th>
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
                <form style = 'block:display; margin-left:1030px' action='insert_staff.php' method = 'POST'>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
                </form> 
                <?php
                        $sql_count = "SELECT COUNT(*) as total FROM staff_list";
                        $stmt_count = $conn->query($sql_count);
                        $stmt_count->setFetchMode(PDO::FETCH_ASSOC);
                        $row_count = $stmt_count->fetch();
                        $total_records = $row_count['total'];
                        $total_pages = ceil($total_records / $records_per_page);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i=1; $i<=$total_pages; $i++) { ?>
                            <li style = 'margin-left: 15px;' class="page-item <?php if ($i==$current_page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        
</body>
</html>