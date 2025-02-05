<?php
require_once APPROOT . '/views/profdashboard/inc/header_dash.php';

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

<div class="flex">
    <!-- Sidebar -->
    <?php require_once APPROOT . '/views/profdashboard/inc/sidebar_dash.php'?>
    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">My Courses</h1>
            <div class="flex space-x-4">
            </div>
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Course Card 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="" alt="Course thumbnail" class="w-full h-48 object-cover"/>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-semibold">title</h3>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="text-gray-600">10 students</span>
                            <span class="text-gray-400 mx-2">•</span>
                            <span class="text-gray-600"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">100$</span>
                            <div class="flex space-x-2">
                                <a href="../Handling/editCourseHandling.php?id="><button class="text-blue-600 hover:text-blue-800" >Edit</button></a>
                                <a href="../Handling/deletecoursehandling.php?id="><button class="text-gray-600 hover:text-gray-800">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</body>
</html>
