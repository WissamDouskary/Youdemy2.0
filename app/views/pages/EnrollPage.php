<?php require_once APPROOT . '/views/inc/header.php'?>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">My Enrolled Courses</h1>
        </div>

        <?php if(!isset($_SESSION['user_id'])): ?>
            <div class="flex justify-center items-center mb-[300px]">
                <div class="flex flex-col justify-center items-center mt-72 gap-6">
                    <p>You cannot add or Show Your enrolled Courses, Make sure you have log in success !</p>
                    <a href="<?php echo URLROOT ?>/User/register"><button class="w-36 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                            Sign up
                        </button></a>
                </div>
            </div>
        <?php else: ?>

        <?php
        if (empty($data['enrolls'])): ?>
            <div class="flex justify-center items-center mb-[250px]">
                <div class="flex flex-col justify-center items-center mt-64 gap-6">
                    <p class="text-xl">You don't have an enrollment yet, please enroll in a course!</p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Search -->
        <!-- <div class="mb-8">
            <input type="text" placeholder="Search your enrolled courses..." class="w-full max-w-md px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div> -->
        <!-- Course List -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Course Card -->
            <?php foreach ($data['enrolls'] as $cour){ ?>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="relative">
                        <img src="<?php echo str_replace("C:/xampp/htdocs/Youdemy2.0/", "../", $cour->course_image); ?>" alt="Course thumbnail" class="w-full h-48 object-cover"/>
                        <?php if($cour->course_image == 'video'): ?>
                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-black bg-purple-600 rounded-full">
                            video
                            </span>
                        <?php else: ?>
                            <span class="absolute top-4 left-4 bg-white/90 px-2 py-1 rounded text-xs font-medium text-black bg-green-600 rounded-full">
                            document
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="p-6">
                        <h3 class="font-semibold mb-2 hover:text-purple-600 transition-colors">
                            <?php echo $cour->title ?>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">
                            <?php echo $cour->description ?>
                        </p>

                        <div class="flex items-center mb-4">
                            <span class="text-sm text-gray-600">By <?php echo $cour->teacher_name ?></span>
                            <span class="mx-2">•</span>
                            <span class="text-sm text-gray-600">Enrolled <?php echo date('d-m-Y', strtotime($cour->date_creation)); ?></span>
                        </div>

                        <a href="../pages/CoursePreview.php?course_id="><button class="w-full bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                View Course
                            </button></a>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>
<?php endif; ?>
<?php require_once APPROOT . '/views/inc/footer.php'?>
