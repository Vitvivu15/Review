<?php
session_start();

require_once('../../api/connection.php');
if (isset($_REQUEST["id"]) && $_REQUEST["id"]){
    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM category WHERE id = $id";

    $result = mysqli_query($dbCon, $sql);

    if (mysqli_num_rows($result) > 0) {
            $sql = 'UPDATE category Set status = 2  WHERE id = '.$id;
            $result = $dbCon->query($sql);
            $dbCon-> close();

            if($result) {
                $_SESSION["success"] = "Xoá thành công.";
                header("Location: ./quanlytheloai.php");
                exit();
            } else {
                $_SESSION["error"] = "Lỗi khi xóa thể loại.";
                $dbCon-> close();
                header("Location: ./quanlytheloai.php");
                exit();
            }       
        }
}
$dbCon-> close();
header("Location: ./quanlytheloai.php");

?>