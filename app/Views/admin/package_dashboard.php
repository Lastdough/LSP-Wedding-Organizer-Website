<?= $this->extend('admin/template/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center pb-4">
    <h2 class="text-2xl font-bold">Wedding Packages</h2>
    <div class="flex space-x-4">
        <!-- Search Form -->
        <form action="<?= site_url('admin/') ?>" method="get" class="flex items-center">
            <input type="text" id="searchInput" name="search" placeholder="Search wedding packages..." class="text-black py-2 px-4 rounded-l-lg focus:outline-none border" />
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-r-lg hover:bg-blue-600">Search</button>
        </form>
        <a href="<?= site_url('admin/package/create') ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">Add Package</a>
    </div>
</div>

<!-- Wedding Packages Table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Package Name</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Price (IDR)</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Capacity</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Created At</th>
                <th class="hidden sm:table-cell py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Updated At</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Status</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php foreach ($packages as $package) : ?>
                <tr>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($package['package_name']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars(number_format($package['price'], 0, ',', '.')) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($package['capacity']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars(date("d M Y H:i", strtotime($package['created_at']))) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars(date("d M Y H:i", strtotime($package['updated_at']))) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($package['status_publish']) ?></td>
                    <td class="flex items-center py-3 px-4">
                        <!-- Edit Button -->
                        <a href="<?= site_url('admin/package/edit?id=' . $package['id']) ?>" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors mr-2">Edit</a>
                        <a href="<?= site_url('package/view/?id=' . $package['id']) ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700 transition-colors mr-2">View</a>
                        <!-- Delete Button -->
                        <form action="<?= site_url('admin/package/delete') ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this package?');">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $package['id'] ?>">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>