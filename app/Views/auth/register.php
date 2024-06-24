<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">

</head>

<body class="antialiased bg-slate-200">
    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <h1 class="text-4xl font-medium mb-4">Register</h1>

        <!-- Error Message -->
        <?php if ($errors = session('errors')) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc list-inside">
                    <?php if (is_array($errors)) : ?>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach ?>
                    <?php else : ?>
                        <li><?= htmlspecialchars($errors) ?></li>
                    <?php endif ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Registration Form -->
        <form method="POST" action="/register" class="my-5">
            <?= csrf_field() ?>
            <div class="flex flex-col space-y-5">
                <label for="name">
                    <p class="font-medium text-slate-700 pb-2">Name</p>
                    <input id="name" name="name" type="text" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter your name" value="<?= old('name') ?>">
                </label>
                <label for="username">
                    <p class="font-medium text-slate-700 pb-2">Username</p>
                    <input id="username" name="username" type="text" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter Username" value="<?= old('username') ?>">
                </label>
                <label for="password">
                    <p class="font-medium text-slate-700 pb-2">Password</p>
                    <input id="password" name="password" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter your password">
                </label>
                <label for="password_confirm">
                    <p class="font-medium text-slate-700 pb-2">Confirm Password</p>
                    <input id="password_confirm" name="password_confirm" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Confirm your password">
                </label>
                <button class="w-full py-3 font-medium text-green-950 bg-amber-400 hover:bg-yellow-400 rounded-lg border-yellow-400 hover:shadow inline-flex space-x-2 items-center justify-center">
                    <span>Register</span>
                </button>
                <p class="text-center">
                    Already have an account?
                    <a href="/login" class="text-green-950 font-medium inline-flex space-x-1 items-center">
                        <span>Login now </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </span>
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>