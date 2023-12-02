<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$product_id = $_POST['product_id'] ?? null;
if (!$product_id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE product_id = :product_id');
$statement->bindValue(':product_id', $product_id);
$statement->execute();

header('Location: index.php');