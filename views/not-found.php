<?php

$title = "Not Found";

?>

<!DOCTYPE html>
<html lang="en">

<!-- head section -->
<?php include("common/header.php") ?>

<body class="bg-gray-100">
<!-- navigation bar -->
<?php include("common/navbar.php"); ?>

<main class="">
    
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-0 sm:py-12">
        <!-- page background -->
        <?php include("common/page-background.php") ?>
        <div class="relative max-w-7xl mx-auto">
            <!-- <img class="h-auto" src="https://sitechecker.pro/wp-content/uploads/2023/06/404-status-code.png" alt="" > -->
            <img class="h-auto rounded" src="/assets/images/404-status-code.png" alt="Not Found" >
        </div>
    </div>
</main>

<!-- footer -->
<?php include("common/footer.php"); ?>

</body>
</html>