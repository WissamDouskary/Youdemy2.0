<?php
require_once APPROOT . '/views/inc/header.php';
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
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#7C3AED'
                });
            </script>
        ";

    unset($_SESSION['message']);
}
?>

<?php
if (isset($_SESSION['Log'])) {
    $message = $_SESSION['Log'];
    $type = $message['type'];
    $text = $message['text'];

    echo "<script>
        Swal.fire({
            title: '$type',
            text: '$text',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Register',
            cancelButtonText: 'Log In'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../pages/sign_up.php';
            } else if (result.isDismissed) {
                window.location.href = '../pages/login.php';
            }
        });
    </script>";

    unset($_SESSION['Log']);
}
?>


<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Search and Filters -->
    <div class="flex flex-col md:flex-row gap-4 mb-8">
        <div class="md:w-2/3">
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                placeholder="Search for courses..."
                id="search-box"
                hx-get="../Handling/searchHandle.php"
                hx-trigger="keyup"
                hx-target="#results"
                hx-swap="innerHTML"
                name="searchfield"
            >
        </div>
        <div class="md:w-1/3 flex gap-2">
            <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                <option>Sort by: Most Popular</option>
                <option>Highest Rated</option>
                <option>Newest</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
            </select>
        </div>
    </div>
    <!-- Course List -->
    <div class="">
        <div id="results" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Course Card 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <!-- Course Thumbnail -->
                    <div class="relative">
                        <img src="" alt="Course thumbnail" class="w-full h-48 object-cover"/>
                        <!-- course type -->
                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-white bg-purple-600 rounded-full">
                            Video
                        </span>
<!--                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-white bg-green-600 rounded-full">-->
<!--                            document-->
<!--                            </span>-->
                    </div>

                    <div class="p-6">
                        <!-- Course Title -->
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold hover:text-purple-600 transition-colors">
                                title
                            </h3>
                        </div>

                        <!-- Course Description -->
                        <p class="text-gray-600 text-sm mb-4">
                             description
                        </p>

                        <!-- Instructor & Date -->
                        <div class="flex items-center mb-3">
                            <span class="text-sm text-gray-600">By ahmad</span>
                            <span class="mx-2">•</span>
                            <span class="text-sm text-gray-600">Updated 20-20-2020</span>
                        </div>

                        <!-- Course Stats -->
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                1020
                            </div>
                            <span class="mx-2">•</span>
                            <div>
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">tag</span>
                            </div>
                        </div>
                        <!-- Price and Enroll Button -->
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-purple-600">50$</span>
                            <div>
                                <a href=""><button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                        View
                                    </button></a>
                                <a href="../Handling/enrollHandle.php?course_id="><button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                        Enroll Now
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>