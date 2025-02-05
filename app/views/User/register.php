<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <main class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Create Account</h2>
                <p class="mt-2 text-gray-600">Join us</p>
            </div>

            <?php if (!empty($data['errors'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul>
                        <?php foreach ($data['errors'] as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6 bg-white p-8 rounded-lg shadow" method="POST" action="<?php echo URLROOT . '/User/register'?>">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input name="prenom" type="text" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                        <?php if(isset($errors['prenom'])): ?>
                            <div class="text-red"><?php echo $errors['prenom']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input name="nom" type="text" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input name="email" type="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="Roleselect" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                        <option value="2">Teacher</option>
                        <option value="3">Etudiant</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input name="password" type="password" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                </div>

                <button name="Createacc"  type="submit" class="w-full bg-primary py-2 px-4 border border-transparent rounded-md text-sm font-medium btn-hover focus:outline-none bg-purple-600 hover:bg-purple-700">
                    Create Account
                </button>

                <div class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="<?php echo URLROOT . '/User/login'?>" class="font-medium text-purpel-600 hover:text-purpel-500">Log in</a>
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
