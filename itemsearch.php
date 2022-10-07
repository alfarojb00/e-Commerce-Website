<?php
    include 'includes/session.php';

    
    
    $item = "%{$_GET['item']}%";

    $conn = $pdo->open();

    $query = "SELECT * FROM products WHERE name LIKE :animal";

    $stmt = $conn->prepare($query);
    $item = str_replace("'","",$item);
    $stmt->execute([':animal'=>$item]);
    
    
    $data = $stmt->fetchAll();
    
?>

<?php
    if(count($data)>0){

        foreach ($data as $key => $value) {
            # code...
    
        ?>
            <a href="product.php?product=<?php echo $value['slug']?>"><?php echo $value['name']?></a>
            <br>
        <?php 
        }
    }else{
?>
No DATA
<?php 
}

?>