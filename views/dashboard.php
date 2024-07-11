<?php

$title = "Dashboard";

?>

<!DOCTYPE html>
<html lang="en">

<!-- head section -->
<?php include("common/header.php") ?>

<body class="bg-gray-100">

    <!-- navigation bar -->
    <?php include("common/navbar.php"); ?>

    <main class="">
        <div class="relative flex min-h-screen overflow-hidden bg-gray-50 py-6 sm:py-12">

            <!-- page background -->
            <?php include("common/page-background.php") ?>

            <div class="relative max-w-7xl mx-auto">
                <div class="flex justify-end">
                    <span class="block text-gray-600 font-mono border border-gray-400 rounded-xl px-2 py-1">Your feedback form link: <strong><?= $feedback_url ?> </strong></span>
                </div>
                <h1 class="text-xl text-indigo-800 text-bold my-10">Received feedback</h1>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                    <?php if (!$my_feedbacks): ?>
                        <p class="text-lg text-red-700 font-bold">Sorry, you have no feedbacks yet!</p>
                    <?php endif ?>

                    <?php foreach ($my_feedbacks as $feedback): ?>

                        <div class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="focus:outline-none">
                                <p class="text-gray-500">
                                    <pre><?= $feedback ?></pre>
                                </p>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </main>

<!-- footer -->
<?php include("common/footer.php"); ?>

</body>
</html>