<?php
include(basePath('views/partials/head.php'));
?>

<form method="POST" enctype="multipart/form-data" action="/spreadsheet-file">
    <input class="text-black type=" text" name="name" required value="<?= $file['name'] ?? '' ?>">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $file['id'] ?>">
    <button type="submit">update</button>
    <?php if (!empty($errors['spreadsheet'])) : ?>
        <p class="text-red-500"><?= $errors['spreadsheet'] ?></p>
    <?php endif ?>
</form>

<div class="mt-6 flex">
    <form method="POST" action="/spreadsheet-file">
        <input name="id" type="hidden" value="<?= $file['id'] ?>">
        <input name="_method" type="hidden" value="DELETE">
        <button class="mr-6 text-red-500">Delete</button>
    </form>

    <a href="/spreadsheet-files" class="mr-6">Cancel</a>
    <a href="/number-cruncher">Send file to number cruncher</a>
</div>

<?php if (!empty($_SESSION['results'])) : ?>
    <p>starting balance is $100.41</p>
    <table class="mx-auto w-2/4 shadow-md mt-5 rounded bg-black border-separate border-spacing-y-2">
        <thead>
            <tr>
                <th>Month</th>
                <th>Day</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Posted Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['results'] as $result) : ?>
                <tr class="text-center">
                    <td><?= $result['A'] ?></td>
                    <td><?= $result['B'] ?></td>
                    <td><?= $result['C'] ?></td>
                    <td><?= $result['D'] ?></td>
                    <td><?= $result['E'] ?></td>
                    <td><?= $result['F'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>ending balance is $99,306.32</p>
<?php endif ?>
<?php unset($_SESSION['results']) ?>