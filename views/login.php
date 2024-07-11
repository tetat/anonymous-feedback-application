<?php 

$title = "Login";

$errors = [];
$created = [];

if (isset($_SESSION["auth_error"])) {
    $errors["auth_error"] = $_SESSION["auth_error"];
    unset($_SESSION["auth_error"]);
}

if (isset($_SESSION["email_error"])) {
    $errors["email_error"] = $_SESSION["email_error"];
    unset($_SESSION["email_error"]);
}

if (isset($_SESSION["password_error"])) {
    $errors["password_error"] = $_SESSION["password_error"];
    unset($_SESSION["password_error"]);
}

if (isset($_SESSION["success"])) {
    $created["success"] = $_SESSION["success"];
    unset($_SESSION["success"]);
}

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
                        <div class="mx-auto w-full max-w-xl text-center px-24">
                            <h1 class="block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">TruthWhisper</h1>
                        </div>

                        <div class="mt-10 mx-auto w-full max-w-xl">

                            <?php if (isset($created["success"])): ?>
                                <p class="text-lg text-green-700 bg-gray-200 p-2 rounded font-bold"><?= $created["success"] ?></p>
                            <?php endif ?>

                            <?php if (isset($errors["auth_error"])): ?>
                                <p class="text-xl text-red-700 bg-gray-200 p-2 rounded font-bold"><?= $errors["auth_error"] ?></p>
                            <?php endif ?>

                            <form class="space-y-6" action="/login/store" method="POST" novalidate>

                                <!-- <input type="hidden" name="_method" value="DELETE"> -->

                                <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="text-sm">
                                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                                </div>
                            </form>

                            <p class="mt-10 text-center text-sm text-gray-500">
                                Not a member?
                                <a href="/register/create" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register now!</a>
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