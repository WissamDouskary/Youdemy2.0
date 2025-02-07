<?php require_once APPROOT . '/views/inc/header.php'?>

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

<!-- Course Header Bar -->
<div class="bg-gray-900 pt-16">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-white mb-4"><?php echo $data['course']->title ?></h1>
        <div class="flex items-center space-x-4 text-gray-300 text-sm">
            <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>prof <?php echo $data['course']->prenom . ' ' .  $data['course']->nom?></span>
            </div>
            <span>•</span>
            <span>Last updated <?php echo date('d-m-Y', strtotime($data['course']->date_creation)) ?></span>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Left Column - Course Content -->
        <div class="lg:w-2/3">
                <?php if($data['course']->course_type == 'video'): ?>
                <!-- Video Player -->
                <div class="bg-black rounded-lg overflow-hidden mb-8 ">
                    <div class="aspect-video">
                        <video class="w-full h-full" controls>
                            <source src="<?php echo str_replace("C:/xampp/htdocs/Youdemy2.0/", "../../", $data['course']->video_url); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <?php else: ?>
                <div class="bg-white rounded-lg border border-gray-200 p-6 mb-8">
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed"><?php echo $data['course']->document_content ?></p>
                    </div>
                </div>
                <?php endif; ?>

            <!-- Course Description -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-xl font-bold mb-4">About This Course</h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed"><?php echo $data['course']->description ?></p>
                </div>
            </div>
        </div>

        <!-- Right Column - Course Details -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h3 class="text-lg font-bold mb-4">Course Content</h3>

                <!-- Course Features -->
                <div class="space-y-4 mb-6">
                    <div class="flex items-center space-x-3 text-sm">
                        <span><?php echo $data['course']->description ?></span>
                    </div>
                </div>

                <!-- Tags Section -->
                <div class="mb-6">
                    <h4 class="text-sm font-semibold mb-2">Topics</h4>
                    <div class="flex flex-wrap gap-2">
                            <?php foreach ($data['tags'] as $tag): ?>
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium"><?php echo $tag->name ?> </span>
                            <?php endforeach; ?>
                    </div>
                </div>

                <!-- Already Enrolled Notice -->
                <div class="bg-purple-50 border border-purple-100 rounded-lg p-4 text-center">
                    <span class="text-purple-700 font-medium">✓ You're enrolled in this course</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'?>
