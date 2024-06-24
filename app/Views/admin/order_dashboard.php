<?= $this->extend('admin/template/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center pb-4">
    <h2 class="text-2xl font-bold">Orders</h2>
    <div class="flex space-x-4">
        <!-- Search Form -->
        <form action="<?= site_url('admin/orders') ?>" method="get" class="flex items-center">
            <input type="text" id="searchInput" name="search" placeholder="Search orders..." class="text-black py-2 px-4 rounded-l-lg focus:outline-none border" />
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-r-lg hover:bg-blue-600">Search</button>
        </form>
    </div>
</div>

<!-- Orders Table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Customer Name</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Email</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Phone</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Number of Guests</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Wedding Date</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Status</th>
                <th class="py-2 px-1 text-left text-xs sm:text-sm sm:px-4 uppercase font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($order['name']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($order['email']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($order['phone_number']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($order['number_of_guests']) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars(date("d M Y", strtotime($order['wedding_date']))) ?></td>
                    <td class="text-left py-3 px-4"><?= htmlspecialchars($order['status']) ?></td>
                    <td class="flex items-center py-3 px-4">
                        <!-- Update Status Form -->
                        <form action="<?= site_url('admin/order/update-status') ?>" method="post" class="mr-2">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <select name="status" class="bg-white border border-gray-300 text-gray-700 py-1 px-3 rounded focus:outline-none focus:border-gray-500">
                                <option value="requested" <?= $order['status'] === 'requested' ? 'selected' : '' ?>>Requested</option>
                                <option value="approved" <?= $order['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
                                <option value="rejected" <?= $order['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                            </select>
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors">Update</button>
                        </form>
                        <!-- Delete Button -->
                        <form action="<?= site_url('admin/order/delete') ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this order?');">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>