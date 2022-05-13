<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container" style="max-width: 540px;">

    <?= form_open_multipart('notification/store'); ?>
    <div class="form-group">
        <label for="text">Текст уведомления:</label>
        <input type="text" class="form-control <?= ($validation->hasError('text')) ? 'is-invalid' : ''; ?>" name="text"
               value="<?= old('text'); ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('text') ?>
        </div>

    </div>
        <div class="form-group">
            <label for="time">Дата уведомления:</label>
            <input type="datetime-local" class="form-control <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= old('time'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('time') ?>
            </div>
        </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="submit">Добавить уведомление</button>
    </div>
    </form>


    </div>
<?= $this->endSection() ?>
