<?php
$currentPage = 'shop';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Определяем заголовок страницы в зависимости от категории
$categoryTitles = [
    'laptops' => 'Ноутбуки',
    'phones' => 'Смартфоны',
    'photo' => 'Фототехника',
    'accessories' => 'Аксессуары',
    'all' => 'Все товары'
];

$pageTitle = isset($categoryTitles[$category]) ? $categoryTitles[$category] : 'Магазин';
include 'header.php';
include 'db_connect.php';

// Получаем товары из базы данных
try {
    if ($category === 'all') {
        $stmt = $pdo->query("SELECT * FROM products");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category = :category");
        $stmt->execute(['category' => $category]);
    }
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Ошибка при получении товаров: " . $e->getMessage());
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4"><?php echo $pageTitle; ?></h1>
    
    <!-- Хлебные крошки -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
        </ol>
    </nav>
    
    <!-- Фильтр категорий -->
    <div class="mb-4">
        <div class="btn-group" role="group">
            <a href="shop.php?category=all" class="btn btn-outline-secondary <?php echo $category === 'all' ? 'active' : ''; ?>">Все товары</a>
            <a href="shop.php?category=laptops" class="btn btn-outline-secondary <?php echo $category === 'laptops' ? 'active' : ''; ?>">Ноутбуки</a>
            <a href="shop.php?category=phones" class="btn btn-outline-secondary <?php echo $category === 'phones' ? 'active' : ''; ?>">Смартфоны</a>
            <a href="shop.php?category=photo" class="btn btn-outline-secondary <?php echo $category === 'photo' ? 'active' : ''; ?>">Фототехника</a>
            <a href="shop.php?category=accessories" class="btn btn-outline-secondary <?php echo $category === 'accessories' ? 'active' : ''; ?>">Аксессуары</a>
        </div>
    </div>
    
    <!-- Список товаров -->
    <div class="row">
        <?php if (empty($products)): ?>
            <div class="col-12">
                <div class="alert alert-info">Товары в этой категории отсутствуют.</div>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="text-primary fw-bold"><?php echo number_format($product['price'], 2, '.', ' '); ?> ₽</p>
                        </div>
                        <div class="card-footer bg-white">
                        <div class="card-footer bg-white">
                        <form method="post" action="add_to_cart.php">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button type="submit" class="btn btn-primary w-100">В корзину</button>
                        </form>
                        </div>
                        </div>


                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>