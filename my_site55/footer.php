<style>
/* Обязательные стили для правильного позиционирования */
html, body {
    margin: 0;
    padding: 0;
    width: 100%;
}
body {
    position: relative;
    min-height: 100vh;
}
.site-footer {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #343a40; /* Цвет фона на случай переопределения */
}
</style>

<footer class="site-footer text-white py-4">
    <div class="container-fluid px-0"> 
        <div class="row mx-0">
            <div class="col-md-4">
                <h5>Контакты</h5>
                <p>Email: info@techshop.ru</p>
                <p>Телефон: +7 (123) 456-78-90</p>
            </div>
            <div class="col-md-4">
                <h5>Адрес</h5>
                <p>г. Москва, ул. Технологическая, д. 42</p>
            </div>
            <div class="col-md-4">
                <h5>Часы работы</h5>
                <p>Пн-Пт: 9:00 - 20:00</p>
                <p>Сб-Вс: 10:00 - 18:00</p>
            </div>
        </div>
        <hr class="my-4 bg-light mx-0"> <!-- Добавил mx-0 -->
        <div class="text-center">
            <p>&copy; <?= date('Y') ?> TechShop. Все права защищены.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>