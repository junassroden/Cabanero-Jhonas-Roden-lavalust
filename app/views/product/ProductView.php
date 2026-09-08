<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    <!-- Notification -->
    <?php if (!empty($notification)): ?>
        <div
            id="notification"
            role="status"
            class="fixed top-5 right-5 z-50 flex items-start gap-4
                   w-full max-w-sm rounded-lg border border-green-200
                   bg-white px-5 py-4 shadow-lg"
        >
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">
                    Success
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    <?= htmlspecialchars($notification, ENT_QUOTES, 'UTF-8'); ?>
                </p>
            </div>

            <button
                type="button"
                onclick="document.getElementById('notification').remove();"
                aria-label="Close notification"
                class="text-xl leading-none text-gray-400 transition hover:text-gray-700"
            >
                &times;
            </button>
        </div>
    <?php endif; ?>


    <!-- Main Container -->
    <div class="mx-auto max-w-7xl px-6 py-10">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-sm font-medium text-gray-500">
                    Product Management
                </p>

                <h1 class="mt-1 text-2xl font-semibold tracking-tight text-gray-900">
                    <?php echo $name; ?>
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    View and manage available products.
                </p>
            </div>


            <!-- Actions -->
            <div class="flex items-center gap-3">

                <?php if ($user_role === 'admin'): ?>
                    <a
                        href="<?= site_url('/product/create'); ?>"
                        class="inline-flex items-center rounded-lg
                               bg-gray-900 px-4 py-2.5
                               text-sm font-medium text-white
                               transition hover:bg-gray-800"
                    >
                        + Add Product
                    </a>
                <?php endif; ?>

                <a
                    href="<?= site_url('/logout'); ?>"
                    class="inline-flex items-center rounded-lg
                           border border-gray-300 bg-white
                           px-4 py-2.5 text-sm font-medium text-gray-700
                           transition hover:bg-gray-50"
                >
                    Logout
                </a>

            </div>
        </div>


        <!-- Product Table Card -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <!-- Table Header -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="text-sm font-semibold text-gray-900">
                    Products
                </h2>

                <p class="mt-1 text-xs text-gray-500">
                    List of all registered products.
                </p>
            </div>


            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="border-b border-gray-200 bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 font-medium text-gray-500">
                                ID
                            </th>

                            <th class="px-6 py-4 font-medium text-gray-500">
                                Product Name
                            </th>

                            <th class="px-6 py-4 font-medium text-gray-500">
                                Description
                            </th>

                            <th class="px-6 py-4 font-medium text-gray-500">
                                Price
                            </th>

                            <th class="px-6 py-4 font-medium text-gray-500">
                                Created At
                            </th>

                            <?php if ($user_role === 'admin'): ?>
                                <th class="px-6 py-4 font-medium text-gray-500">
                                    Actions
                                </th>
                            <?php endif; ?>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        <?php foreach ($products as $product): ?>

                            <tr class="transition hover:bg-gray-50">

                                <!-- ID -->
                                <td class="whitespace-nowrap px-6 py-4 text-gray-500">
                                    <?php echo $product['id']; ?>
                                </td>


                                <!-- Product Name -->
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="font-medium text-gray-900">
                                        <?php echo $product['product_name']; ?>
                                    </span>
                                </td>


                                <!-- Description -->
                                <td class="max-w-xs px-6 py-4">
                                    <p class="truncate text-gray-500">
                                        <?php echo $product['description']; ?>
                                    </p>
                                </td>


                                <!-- Price -->
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="font-medium text-gray-900">
                                        ₱<?php echo $product['price']; ?>
                                    </span>
                                </td>


                                <!-- Created At -->
                                <td class="whitespace-nowrap px-6 py-4 text-gray-500">
                                    <?php echo $product['created_at']; ?>
                                </td>


                                <!-- Actions -->
                                <?php if ($user_role === 'admin'): ?>
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <a
                                                href="<?= site_url('/product/edit/' . $product['id']); ?>"
                                                class="text-sm font-medium text-gray-700
                                                       transition hover:text-gray-900"
                                            >
                                                Edit
                                            </a>

                                            <a
                                                href="<?= site_url('/product/delete/' . $product['id']); ?>"
                                                onclick="return confirm('Delete this product?');"
                                                class="text-sm font-medium text-red-600
                                                       transition hover:text-red-700"
                                            >
                                                Delete
                                            </a>

                                        </div>

                                    </td>
                                <?php endif; ?>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- Footer -->
        <div class="mt-5 text-xs text-gray-400">
            Product Management System
        </div>

    </div>


    <!-- Auto-hide Notification -->
    <?php if (!empty($notification)): ?>
        <script>
            window.setTimeout(function () {
                var notification = document.getElementById('notification');

                if (notification) {
                    notification.remove();
                }
            }, 4000);
        </script>
    <?php endif; ?>

</body>

</html>