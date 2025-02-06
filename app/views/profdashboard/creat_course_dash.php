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
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold mb-8">Create New Course</h1>

            <form class="space-y-8" method="post" action="<?php echo URLROOT . '/courses/createCourse'?>" enctype="multipart/form-data">
                <!-- Basic Information -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold mb-6">Basic Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Course Title</label>
                            <input type="text" name="course_title" class="w-full p-2 border rounded-md" placeholder="Enter course title"/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Course Image</label>
                            <input type="file" name="course_image" class="w-full p-2 border rounded-md" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Course Description</label>
                            <textarea name="course_description" class="w-full p-2 border rounded-md h-32" placeholder="Enter course description"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                            <input name="tags" id="tagsInput" type="text" class="w-full p-2 border rounded-md" placeholder="Enter course Tags"/>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select class="w-full p-2 border rounded-md" name="categories_select">
                                        <?php foreach ($data['categories'] as $op){ ?>
                                            <option value="<?php echo $op->category_id ?>"><?php echo $op->name?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course Type:</label>
                                <select name="course_type" id="course_type" class="w-full p-2 border rounded-md" required onchange="toggleFields()">
                                    <option value="video">Video</option>
                                    <option value="document">Document</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Content -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold mb-6">Course Content</h2>

                    <div id="video_fields" style="display:none;">
                        <label for="video_file" class="block text-sm font-medium text-gray-700 mb-2">Upload Video (MP4 only):</label>
                        <input type="file" name="course_content" class="w-full p-2 border rounded-md" accept="video/mp4"><br>
                    </div>

                    <div id="document_fields" style="display:none;">
                        <label for="document_content" class="block text-sm font-medium text-gray-700 mb-2">Document Content (Text):</label>
                        <textarea placeholder="Enter Your Course Content.." name="course_content" rows="10" cols="50" class="w-full p-2 border rounded-md"></textarea><br>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold mb-6">Pricing</h2>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                                <input type="number" name="course_price" class="w-full p-2 border rounded-md" placeholder="Enter price"/>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="submit" name="CreateCourseSub" class="bg-purple-600 text-white px-6 py-2 rounded-md hover:bg-purple-700">
                        Publish Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function toggleFields() {
        const courseType = document.getElementById('course_type').value;

        if (courseType === 'video') {
            document.getElementById('video_fields').style.display = 'block';
            document.getElementById('document_fields').style.display = 'none';
        } else if (courseType === 'document') {
            document.getElementById('video_fields').style.display = 'none';
            document.getElementById('document_fields').style.display = 'block';
        }
    }

    window.onload = toggleFields;

    $(document).ready(function () {

        $('#tagsInput').tagsinput();
    });
</script>
</body>
</html>
