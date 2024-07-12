<?php

$title = "Feedback Success";

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
            <div class="mx-auto max-w-xl">
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="mx-auto w-full max-w-xl text-center">
                        <h1 class="block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">TruthWhisper</h1>
                        <h3 class="text-gray-500 my-2">Thanks a lot for your submission!</h3>
                    </div>

                    <div class="mt-10 mx-auto w-full max-w-xl">
                        <img src="/assets/images/success.jpg" alt="" />
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