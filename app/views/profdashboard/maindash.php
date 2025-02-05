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
            <h1 class="text-2xl font-bold mb-8">Dashboard Overview</h1>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm mb-1">Total Students</h3>
                    <p class="text-3xl font-bold">10</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm mb-1">Active Courses</h3>
                    <p class="text-3xl font-bold">10</p>
                </div>
            </div>
            <!-- Popular Courses -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-4">Your Popular Courses</h2>
                <div class="space-y-4">

                    <div class="flex items-center justify-between">
                        <div>
                        <div class="flex items-center mb-2">
                            <img src="" alt="Course" class="w-12 h-12 rounded object-cover mr-4"/>
                            <div>
                                <p class="font-semibold">hhhh</p>
                                <p class="text-gray-500">students</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
