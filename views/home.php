<?php

$title = "Home";

?>

<!DOCTYPE html>
<html lang="en">

<!-- head section -->
 <?php include("common/header.php") ?>

<body class="bg-gray-100">
<!-- navigation bar -->
<?php include("common/navbar.php"); ?>

<main class="">
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        
        <!-- page background -->
        <?php include("common/page-background.php") ?>

        
        <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
            <div class="mx-auto max-w-md text-center px-">
                <h1 class="block font-bold text-3xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">TruthWhisper</h1>
                <div class="divide-y divide-gray-300/50">
                    <div class="space-y-6 py-8 text-base leading-7 text-gray-600 px-12">
                        <h2>A better way to get anonymous feedback!</h2>
                        <div class="flex justify-center">
                            <img class="max-h-72" src="assets/images/letter.png" alt="">
                        </div>
                    </div>
                    <div class="pt-8 text-base font-semibold leading-7">
                        <p class="text-gray-900">Sounds interesting?</p>
                        <p>
                            <a href="/login/create" class="text-sky-500 hover:text-sky-600">Let's start!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php include("common/footer.php"); ?>

</body>
</html>