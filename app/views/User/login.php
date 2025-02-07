<?php require_once APPROOT . '/views/inc/header.php'; ?>

<main class="min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold">Welcome Back</h2>
            <p class="mt-2 text-gray-600">Please login to your account</p>
        </div>

        <form class="mt-8 space-y-6 bg-white p-8 rounded-lg shadow" method="post" action="<?php echo URLROOT . '/User/login'?>">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
            </div>

            <button type="submit" name="signinsubmit" class="w-full bg-primary py-2 px-4 border border-transparent rounded-md text-sm font-medium btn-hover focus:outline-none bg-purple-600 hover:bg-purple-700">
                Log In
            </button>

            <div class="text-center text-sm text-gray-600">
                Not registered yet?
                <a href="<?php echo URLROOT . '/User/register'?>" class="font-medium text-purpel-600 hover:text-purpel-500">Create an account</a>
            </div>
        </form>
        <?php

        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $type = $message['type'];
            $text = $message['text'];

            echo "
            <script>
                Swal.fire({
                    icon: '$type',
                    title: '$type',
                    text: '$text',
                    confirmButtonText: 'OK'
                });
            </script>
        ";

            unset($_SESSION['message']);
        }
        ?>
    </div>
</main>
