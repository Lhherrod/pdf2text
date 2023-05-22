<?php
include(basePath('views/partials/head.php'));
?>

<h1 class="text-center text-4xl">Upload Transaction Sheet</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="spreadsheet">
    <button type="submit">submit</button>
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors['spreadsheet'] as $error) : ?>
            <p class="text-red-500 mt-6"> <?= $error ?></p>
        <?php endforeach; ?>
    <?php endif ?>
</form>