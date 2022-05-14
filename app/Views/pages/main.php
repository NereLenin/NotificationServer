<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <div class="jumbotron text-center">
        <p class="lead">Веб интерфейс для менеджера уведомлений.</p>
        <a class="btn btn-primary btn-lg" href="auth/login" role="button">Войти</a>
    </div>
<?= $this->endSection() ?>
