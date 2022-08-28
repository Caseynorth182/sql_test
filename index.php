<?php
// 3. Нужно написать запрос по обновлению товара: если у товара остаток 0 (stock), то нужно добавить к имени  "- закончился" 
?>
<?php require('config.php');


//take rows from bd
try {
    $sql = "UPDATE wp_products
            INNER JOIN wp_variants   ON wp_products.id = wp_variants.product_id
            SET wp_products.name =  CONCAT('-', wp_products.name) 
            WHERE wp_variants.stock = 0";
    $prepare = $conn->prepare($sql);
    $result = $conn->query($sql);
    $rows = $result->fetchALL(PDO::FETCH_ASSOC);
    // debug($rows);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
<ul>
    <?php foreach ($rows as $row) : ?>
    <li><span><?= $row['name'] ?></span> | <span><?= $row['price'] ?></span></li>
    <?php endforeach; ?>
</ul>