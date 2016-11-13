<?php if ($successMessagesList): ?>
    <div class="alert alert-success">
        <?php foreach ($successMessagesList as $message): ?>
        <span><?= $message ?><span><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($errorMessagesList): ?>
    <div class="alert alert-danger">
        <?php foreach ($errorMessagesList as $message): ?>
        <span><?= $message ?><span><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>