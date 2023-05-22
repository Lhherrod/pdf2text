<?php
include(basePath('views/partials/head.php'));
?>

<h1 class="text-center text-4xl">Registration</h1>

<section class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="w-full sm:w-[400px] md:w-[500px] px-5 mx-auto text-center border-none">
                    <form id="demo-form" class="text-[blueviolet] border-none" action="/register" method="POST">
                        <div class="mb-3">
                            <input name="email" value="<?= $_POST['email'] ?? '' ?>" type="" placeholder="Your Email..." autofocus class="w-full rounded border-indigo-300 focus:border-indigo-300 focus:ring-indigo-300">
                            <?php if (!empty($errors['email'])) : ?>
                                <p class="text-red-500 mt-6"><?= $errors['email']?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <input name="name" value="<?= $_POST['name'] ?? '' ?>" type="text" placeholder="Your Name..." autofocus class="w-full rounded border-indigo-300 focus:border-indigo-300 focus:ring-indigo-300">
                            <?php if (!empty($errors['name'])) : ?>
                                <p class="text-red-500 mt-6"><?= $errors['name']?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <input name="password"  value="<?= $_POST['password'] ?? '' ?>" type="password" placeholder="Your Password..." required class="w-full rounded border-indigo-300 focus:border-indigo-300 focus:ring-indigo-300">
                            <?php if (!empty($errors['password'])) : ?>
                                <p class="text-red-500 mt-6"><?= $errors['password']?></p>
                            <?php endif ?>
                        </div>
                        <div class="flex justify-between mb-3">
                            <!-- <p class="text-red-500 text-sm" v-if="ContactStore.errors['g-recaptcha-response']">{{
                                ContactStore.errors['g-recaptcha-response'][0] }}
                            </p> -->
                        </div>
                        <button class="bg-purple-800 text-white py-2 px-3 rounded hover:bg-purple-600 active:bg-purple-700 transition-colors shadow-md shadow-[#103] w-full flex items-center justify-center mt-3 g-recapatcha">
                            <!-- <div class="text-center">
                                <button class="transition duration-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" disabled>
                                    <svg class="animate-spin h-5 w-5 mx-auto text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </button>
                            </div> -->
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                </svg>
                                Submit Request
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>