<?php
$currentPage = 'index';
$pageTitle = 'Главная';
include 'header.php';
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Добро пожаловать в TechShop!</h1>
    <p class="lead text-center mb-5">Лучший магазин электроники с 2010 года</p>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="images/products/asus_vivobook_15.png" class="card-img-top" alt="Ноутбуки">
                <div class="card-body">
                    <h5 class="card-title">Ноутбуки</h5>
                    <p class="card-text">Широкий выбор ноутбуков для работы и игр.</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="shop.php?category=laptops" class="btn btn-primary w-100">Посмотреть</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="images/products/xiaomi_redmi_note_10.png" class="card-img-top" alt="Смартфоны">
                <div class="card-body">
                    <h5 class="card-title">Смартфоны</h5>
                    <p class="card-text">Последние модели от ведущих производителей.</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="shop.php?category=phones" class="btn btn-primary w-100">Посмотреть</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="images/products/canon_eos_250d.png" class="card-img-top" alt="Фототехника">
                <div class="card-body">
                    <h5 class="card-title">Фототехника</h5>
                    <p class="card-text">Профессиональные камеры и аксессуары.</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="shop.php?category=photo" class="btn btn-primary w-100">Посмотреть</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="images/products/sony_wh1000xm4.png" class="card-img-top" alt="Аксессуары">
                <div class="card-body">
                    <h5 class="card-title">Аксессуары</h5>
                    <p class="card-text">Все необходимое для ваших устройств.</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="shop.php?category=accessories" class="btn btn-primary w-100">Посмотреть</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>