<?= $this->extend('admin/template/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center pb-4">
    <h2 class="text-2xl font-bold">Edit Wedding Package</h2>
</div>

<?php if (isset($error)) : ?>
    <div id="errorPopup" class="fixed bottom-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">
        <?= htmlspecialchars($error); ?>
        <button onclick="document.getElementById('errorPopup').style.display='none'" class="text-lg ml-2">&times;</button>
    </div>
<?php endif; ?>

<form id="packageForm" method="POST" action="<?= site_url('admin/package/update?id=' . $package['id']) ?>" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="package_name" class="block text-gray-700 text-sm font-bold mb-2">Package Name:</label>
        <input type="text" id="package_name" name="package_name" value="<?= htmlspecialchars($package['package_name']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <div class="mb-4">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price (IDR):</label>
        <input type="number" id="price" name="price" value="<?= htmlspecialchars($package['price']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <div class="mb-4">
        <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity:</label>
        <input type="number" id="capacity" name="capacity" value="<?= htmlspecialchars($package['capacity']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>

    <!-- Picture Input -->
    <div class="mb-4">
        <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Picture:</label>
        <input type="file" id="picture" name="picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="previewImage();">
        <!-- Image Preview Container -->
        <div id="imagePreviewContainer" class="mt-2">
            <?php if ($package['image']) : ?>
                <img id="imagePreview" src="data:image/jpeg;base64,<?= base64_encode($package['image']) ?>" alt="Image Preview" class="max-w-xs mt-2" />
            <?php else : ?>
                <img id="imagePreview" src="#" alt="Image Preview" class="hidden max-w-xs mt-2" />
            <?php endif; ?>
        </div>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
        <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?= htmlspecialchars($package['description']) ?></textarea>
    </div>

    <!-- Buttons for Draft and Publish -->
    <div class="flex justify-end">
        <button type="submit" name="status_publish" value="draft" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors mr-2">Save as Draft</button>
        <button type="submit" name="status_publish" value="publish" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">Publish</button>
    </div>
</form>

<script>
    function previewImage() {
        var preview = document.getElementById('imagePreview');
        var file = document.getElementById('picture').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.classList.add('hidden');
        }
    }
    document.getElementById('packageForm').addEventListener('submit', function(event) {
        tinymce.triggerSave();
    });
</script>

<?= $this->endSection() ?>