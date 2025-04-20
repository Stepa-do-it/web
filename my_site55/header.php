<?php
session_start();
?>
<?php
$currentPage = isset($currentPage) ? $currentPage : 'index';
$pageTitle = isset($pageTitle) ? $pageTitle : 'Магазин электроники';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - TechShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Основные стили */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        
        /* Шапка */
        header {
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        /* Навигация */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .nav-link.active {
            font-weight: 600;
        }
        
        /* Карточки товаров */
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            height: 180px;
            object-fit: contain;
            padding: 15px;
        }
        
        .card-body {
            display: flex;
            flex-direction: column;
        }
        
        /* Кнопки */
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            margin-top: auto;
        }
        
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        
        /* Подвал */
        footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }
        
        footer h5 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">TechShop</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'index') ? 'active' : ''; ?>" href="index.php">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'shop') ? 'active' : ''; ?>" href="shop.php">Магазин</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($currentPage == 'about') ? 'active' : ''; ?>" href="about.php">О нас</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link <?= ($currentPage == 'cart') ? 'active' : '' ?>" href="cart.php">
                            Корзина
                            <?php if (!empty($_SESSION['cart'])): ?>
                            <span class="badge bg-danger"><?= array_sum(array_column($_SESSION['cart'], 'quantity')) ?></span>
                            <?php endif; ?>
                             </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container my-5">