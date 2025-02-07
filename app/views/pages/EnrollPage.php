<?php require_once APPROOT . '/views/inc/header.php'?>

<?php if(!isset($_SESSION['user_id'])): ?>
    <div class="flex justify-center items-center ">
        <div class="flex flex-col justify-center items-center mt-72 gap-6">
            <p>You cannot add or Show Your enrolled Courses, Make sure you have log in success !</p>
            <a href="../pages/sign_up.php"><button class="w-36 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                    Sign up
                </button></a>
        </div>
    </div>
<?php else: ?>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">My Enrolled Courses</h1>
        </div>

        <!-- Search -->
        <!-- <div class="mb-8">
            <input type="text" placeholder="Search your enrolled courses..." class="w-full max-w-md px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div> -->

        <!-- Course List -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Course Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="relative">
                        <img src="" alt="Course thumbnail" class="w-full h-48 object-cover"/>

<!--                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-white bg-purple-600 rounded-full">-->
<!--                        -->
<!--                        </span>-->
                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-white bg-green-600 rounded-full">
                    </span>

                    </div>

                    <div class="p-6">
                        <h3 class="font-semibold mb-2 hover:text-purple-600 transition-colors">
                            title
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            desc
                        </p>

                        <div class="flex items-center mb-4">
                            <span class="text-sm text-gray-600">By name</span>
                            <span class="mx-2">•</span>
                            <span class="text-sm text-gray-600">Enrolled 202014</span>
                        </div>

                        <a href="../pages/CoursePreview.php?course_id="><button class="w-full bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                View Course
                            </button></a>
                    </div>
                </div>
        </div>

    </div>
<?php endif; ?>

<?php require_once APPROOT . '/views/inc/footer.php'?>
