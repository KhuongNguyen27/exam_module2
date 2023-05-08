<?php
// include_once '../db.php';
// try {
//     $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
//     $file = isset($_GET['file']) ? $_GET['file'] : 0;
//     if (is_numeric($id) && $id > 0) {
//         $stmt = $conn->prepare("DELETE FROM $file WHERE Id = $id");
//         $stmt->execute(array($id));
//         header('Location: http://localhost/Case_study/include/index.php');
//         exit();
//     }
// } catch (Exception $e) {
//     echo "DELETE FROM $file WHERE id = $id";
// }
include_once '../db.php';
try {
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $sql = "DELETE FROM staff_list WHERE ID = '$id'";
    $conn->query($sql);
    header('Location: ../index.php');
    exit();
    }
catch (Exception $e) {
    echo "Invalid file or ID";
    echo "Error deleting record: " . $e->getMessage();
}
?>
