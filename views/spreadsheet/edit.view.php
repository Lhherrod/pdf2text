 spreadsheet parser edit
 <?php
    include(basePath('views/partials/head.php'));
    ?>

 <form method="POST" enctype="multipart/form-data" action="/spreadsheet-file">
     <input type="text" name="name" required value="<?= $file['name'] ?? '' ?>">
     <input type="hidden" name="_method" value="PATCH">
     <input type="hidden" name="id" value="<?= $file['id']?>">
     <button type="submit">update</button>
     <?php if (!empty($errors['spreadsheet'])) : ?>
         <p class="text-red-500"><?= $errors['spreadsheet'] ?></p>
     <?php endif ?>
 </form>

 <?php

function generateNumbers(int $start, int $end): Generator {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}
$generator = generateNumbers(1, 5);
foreach ($generator as $number) {
    if ($number === 3) {
        $generator->send(6);
    }
    echo $number . " ";
}


 
 ?>

 <div class="mt-6 flex">
 <form method="POST">
     <input name="id" type="hidden" value="<?= $file['id'] ?>">
     <input name="_method" type="hidden" value="DELETE">
     <button class=" mr-6 text-red-500">Delete</button>
 </form>
 
 <a href="/spreadsheet-files">Cancel</a>
 </div>