<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container main">
<h2>Уведомления</h2>

<?php if (!empty($notification) && is_array($notification)) : ?>

    <?php foreach ($notification as $item): ?>

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <img height="150" src="https://cdn-icons-png.flaticon.com/512/77/77682.png" class="card-img" alt="Уведомление">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Уведомление</h5>
                        <p class="card-text">Текст уведомления: <?= esc($item['text']); ?></p>
                        <p class="card-text">Время отправки: <?= esc($item['time']); ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
<?php else : ?>
    <p>Уведомления отсуствуют.</p>
<?php endif ?>
</div>
<?= $this->endSection() ?>
