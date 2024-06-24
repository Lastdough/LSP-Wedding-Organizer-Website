<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">

    <style>
        .description-content h1 {
            font-size: 2rem !important;
            font-weight: 600 !important;

        }

        .description-content h2 {
            font-size: 1.5rem !important;
            font-weight: 600 !important;

        }

        .description-content h3 {
            font-weight: 600 !important;

        }

        .description-content table,
        th,
        td {
            border: 0.1px solid #000;
        }

        .description-content ul {
            list-style-type: disc;
            list-style-position: inside;
        }

        .description-content ol {
            list-style-type: decimal;
            list-style-position: inside;
        }

        .description-content ul ul,
        ol ul {
            list-style-type: circle;
            list-style-position: inside;
            margin-left: 15px;
        }

        .description-content ol ol,
        ul ol {
            list-style-type: lower-latin;
            list-style-position: inside;
            margin-left: 15px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="<?= site_url('/') ?>" class="text-2xl font-bold text-gray-800">Wedding Organizer</a>
            <nav class="space-x-4">
                <a href="<?= site_url('/about') ?>" class="text-gray-700 hover:text-gray-900">About</a>
                <a href="<?= site_url('/packages') ?>" class="text-gray-700 hover:text-gray-900">Packages</a>
                <?php if (!session('isLoggedIn')) : ?>
                    <a href="<?= site_url('/login') ?>" class="text-blue-500 hover:text-blue-700">Login</a>
                    <a href="<?= site_url('/register') ?>" class="text-blue-500 hover:text-blue-700">Register</a>
                <?php else : ?>
                    <a href="<?= site_url('/orders') ?>" class="text-blue-500 hover:text-blue-700"><?= session('name') ?> Orders</a>
                    <a href="<?= site_url('/logout') ?>" class="text-blue-500 hover:text-blue-700">Logout</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p class="text-gray-400">&copy; <?= date('Y') ?> Wedding Organizer. All rights reserved.</p>
            <div class="mt-4">
                <a href="<?= site_url('/') ?>" class="text-gray-400 hover:text-white mx-2">Home</a>
                <a href="<?= site_url('/about') ?>" class="text-gray-400 hover:text-white mx-2">About</a>
                <a href="<?= site_url('/packages') ?>" class="text-gray-400 hover:text-white mx-2">Packages</a>
                <a href="<?= site_url('/contact') ?>" class="text-gray-400 hover:text-white mx-2">Contact</a>
            </div>
        </div>
    </footer>

</body>

</html>