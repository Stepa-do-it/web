<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    include 'db_connect.php';
    
    $product_id = (int)$_POST['product_id'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        
        if ($product) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += 1;
            } else {
                $product['quantity'] = 1;
                $_SESSION['cart'][$product_id] = $product;
            }
        }
    } catch (PDOException $e) {
        die("Ошибка: " . $e->getMessage());
    }
}

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'shop.php'));
exit();
?>