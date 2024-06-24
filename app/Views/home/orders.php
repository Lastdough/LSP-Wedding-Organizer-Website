<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-8">My Orders</h2>

    <?php if (session()->has('message')) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"><?= session('message') ?></span>
        </div>
    <?php endif; ?>

       <?php if (empty($orders)) : ?>
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">No Orders Found</strong>
            <span class="block sm:inline">You have not placed any orders yet.</span>
        </div>
        <div class="text-center mt-4">
            <a href="<?= site_url('/packages') ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">Browse Packages</a>
        </div>
    <?php else : ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4 text-left text-sm uppercase font-semibold">Package</th>
                        <th class="py-2 px-4 text-left text-sm uppercase font-semibold">Status</th>
                        <th class="py-2 px-4 text-left text-sm uppercase font-semibold">Wedding Date</th>
                        <th class="py-2 px-4 text-left text-sm uppercase font-semibold">Guests</th>
                        <th class="py-2 px-4 text-left text-sm uppercase font-semibold">Notes</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td class="py-3 px-4"><?= htmlspecialchars($order['package_id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($order['status']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($order['wedding_date']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($order['number_of_guests']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($order['notes']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>