<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container" style="max-width: 540px;">

    <?= form_open_multipart('notification/update'); ?>
    <input type="hidden" name="id" value="<?= $notification["id"] ?>">

    <div class="form-group">
        <label for="name">Текст уведомления:</label>
        <input type="text" class="form-control <?= ($validation->hasError('text')) ? 'is-invalid' : ''; ?>" name="text"
               value="<?= $notification["text"]; ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('text') ?>
        </div>

    </div>

        <div class="form-group">
            <label for="birthday">Время отправки</label>
            <input type="datetime" class="form-control <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= $notification["time"] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('time') ?>
            </div>
        </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="submit">Сохранить</button>
    </div>
    </form>
    </div>
<?= $this->endSection() ?>
