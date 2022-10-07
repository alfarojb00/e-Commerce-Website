<?php
    include 'includes/conn.php';
    $id = $_GET['id'];
    $conn = $pdo->open();
    $query = "SELECT p.name,n.notificationid FROM notifications n inner join products p  on n.productid = p.id WHERE n.userid = :userid ORDER BY notificationid DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute(['userid'=>$id]);
    $data = $stmt->fetch();
    header("Content-type:application/json");
    sleep(5);
    echo json_encode($data);
    $pdo->close();

?>