<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <!-- Login Card -->
        <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900">
                    Login
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Sign in to your account
                </p>
            </div>

            <!-- Error Message -->
            <?php if (!empty($error)): ?>
                <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3">
                    <p class="text-sm text-red-600">
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?= site_url('/'); ?>" method="post" class="space-y-5">

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        placeholder="you@example.com"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5
                               text-sm text-gray-900 placeholder-gray-400
                               outline-none transition
                               focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5
                               text-sm text-gray-900 placeholder-gray-400
                               outline-none transition
                               focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                    >
                </div>

                <!-- Role -->
                <div>
                    <label
                        for="role"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Login as
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5
                               text-sm text-gray-900
                               outline-none transition
                               focus:border-gray-900 focus:ring-1 focus:ring-gray-900"
                    >
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full rounded-lg bg-gray-900 px-4 py-2.5
                           text-sm font-medium text-white
                           transition hover:bg-gray-800
                           focus:outline-none focus:ring-2
                           focus:ring-gray-900 focus:ring-offset-2"
                >
                    Login
                </button>

            </form>

        </div>

        <!-- Footer -->
        <p class="mt-6 text-center text-xs text-gray-400">
            Please enter your credentials to continue.
        </p>

    </div>

</body>
</html>