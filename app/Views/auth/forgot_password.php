<?= $this->extend('templates/layout');
echo strlen($message) ?>
<?= $this->section('content') ?>
    <div class="container">
        <div class="col-lg-6">
            <h1><?php echo lang('Auth.forgot_password_heading'); ?></h1>
            <p><?php echo sprintf(lang('Auth.forgot_password_subheading'), $identity_label); ?></p>
            <div id="infoMessage"><?php echo $message; ?></div>
            <?php echo form_open('auth/forgot_password'); ?>
            <div class="form-group">
                <label for="identity"><?php echo(($type === 'email') ? sprintf(lang('Auth.forgot_password_email_label'), $identity_label) : sprintf(lang('Auth.forgot_password_identity_label'), $identity_label)); ?></label>
                <?php echo form_input($identity, '', 'class="form-control"'); ?>
            </div>
            <p><?php echo form_submit('submit', lang('Auth.forgot_password_submit_btn'), 'class="btn btn-primary"'); ?>
                <?php echo form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>