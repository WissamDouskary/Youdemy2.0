<nav class="bg-white shadow-lg sticky w-full z-50 top-0">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <span class="text-3xl font-bold text-purple-600"><?php echo SITENAME; ?></span>
                <span class="hidden md:inline-block text-sm text-gray-500">| Learn Without Limits</span>
            </div>
            <!-- Navigation Links -->
            <ul class="hidden md:flex gap-8 text-gray-600">
                <a href="<?php echo URLROOT ?>/pages/index" class="hover:text-purple-600 transition-colors"><li>Home</li></a>
                <a href="<?php echo URLROOT ?>/pages/courses" class="hover:text-purple-600 transition-colors"><li>Courses</li></a>
                <a href="<?php echo URLROOT ?>/pages/EnrollPage" class="hover:text-purple-600 transition-colors"><li>My Enrolled</li></a>
            </ul>

            <?php if (!isset($_SESSION['role'])): ?>
                <div class="flex items-center space-x-4">
                    <a href="<?php echo URLROOT ?>/User/login">
                        <button class="text-purple-700 hover:bg-purple-50 px-6 py-2 rounded-md transition-colors">Login</button>
                    </a>
                    <a href="<?php echo URLROOT ?>/User/register">
                        <button class="bg-purple-600 text-white px-6 py-2 rounded-md hover:bg-purple-700 transition-colors shadow-md hover:shadow-lg">Sign Up</button>
                    </a>
                </div>
            <?php else: ?>
            <div class="flex items-center space-x-4 relative group">
                <div class="cursor-pointer flex items-center space-x-2">
                    <a href="<?php echo URLROOT ?>/User/logout" class="block px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:rounded_full flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
</nav>
