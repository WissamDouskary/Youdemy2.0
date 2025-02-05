<?php
require_once APPROOT . '/views/inc/header.php';
?>
<?php
session_start();
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

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-purple-900 to-purple-700 text-white pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="md:w-2/3">
                <span class="text-purple-200 text-sm font-medium mb-2 block">WELCOME TO YOUDEMY</span>
                <h1 class="text-5xl font-bold mb-6 leading-tight">Transform Your Future With Expert-Led Learning</h1>
                <p class="text-xl mb-8 text-purple-100">Join millions of learners worldwide and master new skills with our comprehensive course library.</p>
                <div class="flex space-x-4">
                    <button class="bg-white text-purple-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors shadow-lg hover:shadow-xl">
                        Start Learning Now
                    </button>
                    <button class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-purple-900 transition-all">
                        Browse Courses
                    </button>
                </div>
                <div class="mt-12 flex items-center space-x-8">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="ml-2">10K+ Courses</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="ml-2">1M+ Students</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        <span class="ml-2">4.8/5 Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="max-w-7xl mx-auto px-4 py-20">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-3xl font-bold">Explore Top Categories</h2>
            <a href="#" class="text-purple-600 hover:text-purple-700 font-medium">View All Categories →</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all transform hover:-translate-y-1">
                <div class="text-4xl mb-6">💻</div>
                <h3 class="text-xl font-semibold mb-2">Programming</h3>
                <p class="text-gray-600">1,500+ courses</p>
                <div class="mt-4 text-purple-600">Learn More →</div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all transform hover:-translate-y-1">
                <div class="text-4xl mb-6">📊</div>
                <h3 class="text-xl font-semibold mb-2">Business</h3>
                <p class="text-gray-600">2,300+ courses</p>
                <div class="mt-4 text-purple-600">Learn More →</div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all transform hover:-translate-y-1">
                <div class="text-4xl mb-6">🎨</div>
                <h3 class="text-xl font-semibold mb-2">Design</h3>
                <p class="text-gray-600">980+ courses</p>
                <div class="mt-4 text-purple-600">Learn More →</div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all transform hover:-translate-y-1">
                <div class="text-4xl mb-6">📱</div>
                <h3 class="text-xl font-semibold mb-2">Marketing</h3>
                <p class="text-gray-600">1,200+ courses</p>
                <div class="mt-4 text-purple-600">Learn More →</div>
            </div>
        </div>
    </div>
<?php
require_once APPROOT . '/views/inc/footer.php';
?>