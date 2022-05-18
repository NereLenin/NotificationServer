<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 md-sm-0">
                <img src="/images/main.jpg" alt="">
            </div>
            <div class="col-sm-6 text-center text-sm-left d-flex flex-column justify-content-center">
                <p class="lead">Веб интерфейс для менеджера уведомлений.</p>
                <a class="btn btn-primary btn-lg" href="auth/login" role="button">Войти</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
