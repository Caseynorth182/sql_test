<!-- 1. Нужно вывести список товаров, у которых есть варианты с нулевой ценой.
Результатом должна быть таблица, где 2 столбца: Product_name и Count -->

<?php require('config.php');

//debug func
function debug($data)
{
    echo '<br>';
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    echo '<br>';
}
//take rows from bd
try {
    $sql = "SELECT wp_products.name, wp_variants.price FROM wp_products INNER JOIN wp_variants ON wp_products.id = wp_variants.product_id WHERE wp_variants.price < 1";
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