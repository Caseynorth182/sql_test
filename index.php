<?php
require_once 'config.php';
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
    $sql = "SELECT name, age, city FROM s_peoples WHERE (age > 30) AND name in ('Sam', 'Bob', 'Alice') ORDER BY age DESC ";
    $prepare = $conn->prepare($sql);
    $result = $conn->query($sql);
    $rows = $result->fetchALL(PDO::FETCH_ASSOC);

    // echo 'yes';
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

<ul class="list">
    <?php
    if (!empty($rows) && isset($rows)) :
        foreach ($rows as $row) :
    ?>
    <li class="list__item">
        <span><?= $row['name'] ?></span>
        <span><?= $row['age'] ?></span>
        <span><?= $row['city'] ?></span>
    </li>
    <?php
        endforeach;
    endif;
    ?>
</ul>