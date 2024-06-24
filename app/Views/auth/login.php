<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="antialiased bg-slate-200">
    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <h1 class="text-4xl font-medium">Login</h1>
        <form action="/login" method="POST" class="my-5">
            <?= csrf_field() ?>
            <div class="flex flex-col space-y-5">
                <label for="username">
                    <p class="font-medium text-slate-700 pb-2">Username</p>
                    <!-- <input id="username" name="username" type="text" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter Username" value="<?= old('username') ?>"> -->
                    <input id="username" name="username" type="username" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter Username">
                </label>
                <label for="password">
                    <p class="font-medium text-slate-700 pb-2">Password</p>
                    <input id="password" name="password" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="Enter your password">
                </label>
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
                <button class="w-full py-3 font-medium text-green-950 bg-amber-400 hover:bg-yellow-400 rounded-lg border-yellow-400 hover:shadow inline-flex space-x-2 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Login</span>
                </button>
                <p class="text-center">
                    Not registered yet?
                    <a href="/register" class="text-green-950 font-medium inline-flex space-x-1 items-center">
                        <span>Register now </span>
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