<?php
session_start();
$currentPage = 'cart';
$pageTitle = 'Корзина';
include 'header.php';
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Ваша корзина</h1>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
        </ol>
    </nav>
    
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="alert alert-info">Ваша корзина пуста</div>
        <a href="shop.php" class="btn btn-primary">Вернуться в магазин</a>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $id => $item): 
                        $sum = $item['price'] * $item['quantity'];
                        $total += $sum;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= number_format($item['price'], 2, '.', ' ') ?> ₽</td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= number_format($sum, 2, '.', ' ') ?> ₽</td>
                            <td>
                                <a href="remove_from_cart.php?id=<?= $id ?>" class="btn btn-danger btn-sm">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Итого:</strong></td>
                        <td colspan="2"><strong><?= number_format($total, 2, '.', ' ') ?> ₽</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="shop.php" class="btn btn-outline-primary">Продолжить покупки</a>
            <a href="checkout.php" class="btn btn-success">Оформить заказ</a>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>