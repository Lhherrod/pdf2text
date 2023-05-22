<?php
include(basePath('views/partials/head.php'));
?>

<h1 class="text-center text-4xl">View Transaction Sheets</h1>

<div class="max-w-7xl mx-auto rounded-md">
    <ul role="list" class="divide-y divide-gray-100 rounded-lg" style="background-color: rgb(157 174 210); opacity: 1">
        <?php foreach ($csv_files as $file) : ?>
            <li class="flex justify-between gap-x-6 py-5 px-5">
                <div class="flex gap-x-4 items-center">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="public/excel_logo.png" alt="a picture of microsoft excel logo">
                    <div class="min-w-0 flex-auto">
                        <a href="/spreadsheet-file?id=<?= $file['id'] ?>" class="text-sm font-semibold leading-6 text-gray-500 hover:underline">
                            <?= htmlspecialchars($file['name']) ?>
                        </a>
                        <!-- <p class="text-sm font-semibold leading-6 text-gray-500"> <?= $file['name'] ?> </p> -->
                        <!-- <p class="text-sm font-semibold leading-6 text-gray-500">Leslie Alexander</p> -->
                        <!-- <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p> -->
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen<time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
        <?php endforeach ?>
        <li class="flex justify-between gap-x-6 py-5 px-5 hover:underline text-[#103]">
            <a href="/spreadsheet-parser/create" class="">upload transaction sheet</a>
        </li>
    </ul>

</div>