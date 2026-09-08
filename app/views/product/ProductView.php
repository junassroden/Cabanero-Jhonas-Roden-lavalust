<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">

    <!-- ============================= -->
    <!-- SUCCESS NOTIFICATION -->
    <!-- ============================= -->
    <?php if (!empty($notification)): ?>

        <div
            id="notification"
            role="status"
            class="fixed right-5 top-5 z-50 flex w-full max-w-sm
                   items-start gap-4 rounded-xl border border-emerald-200
                   bg-white px-5 py-4 shadow-lg"
        >

            <!-- Success Icon -->
            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center
                       rounded-full bg-emerald-100 text-emerald-600"
            >
                ✓
            </div>

            <div class="flex-1">

                <p class="text-sm font-semibold text-slate-900">
                    Success
                </p>

                <p class="mt-1 text-sm text-slate-500">
                    <?= htmlspecialchars($notification, ENT_QUOTES, 'UTF-8'); ?>
                </p>

            </div>

            <button
                type="button"
                onclick="document.getElementById('notification').remove();"
                aria-label="Close notification"
                class="text-xl leading-none text-slate-400
                       transition hover:text-slate-700"
            >
                &times;
            </button>

        </div>

    <?php endif; ?>


    <!-- ============================= -->
    <!-- MAIN CONTAINER -->
    <!-- ============================= -->
    <div class="mx-auto max-w-7xl px-6 py-10">


        <!-- ============================= -->
        <!-- HEADER -->
        <!-- ============================= -->
        <div
            class="mb-8 flex flex-col gap-5
                   sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <!-- Small Label -->
                <div class="mb-2 flex items-center gap-2">

                    <span
                        class="h-2 w-2 rounded-full bg-blue-600"
                    ></span>

                    <p class="text-sm font-semibold text-blue-600">
                        Product Management
                    </p>

                </div>


                <!-- Page Title -->
                <h1
                    class="text-3xl font-bold tracking-tight text-slate-900"
                >
                    <?php echo $name; ?>
                </h1>


                <p class="mt-2 text-sm text-slate-500">
                    View and manage available products.
                </p>

            </div>


            <!-- ============================= -->
            <!-- ACTION BUTTONS -->
            <!-- ============================= -->
            <div class="flex items-center gap-3">

                <?php if ($user_role === 'admin'): ?>

                    <a
                        href="<?= site_url('/product/create'); ?>"
                        class="inline-flex items-center gap-2 rounded-lg
                               bg-blue-600 px-4 py-2.5
                               text-sm font-semibold text-white
                               shadow-sm transition
                               hover:bg-blue-700
                               hover:shadow-md"
                    >

                        <span class="text-lg leading-none">
                            +
                        </span>

                        Add Product

                    </a>

                <?php endif; ?>


                <a
                    href="<?= site_url('/logout'); ?>"
                    class="inline-flex items-center rounded-lg
                           border border-slate-300 bg-white
                           px-4 py-2.5 text-sm font-medium
                           text-slate-700 shadow-sm transition
                           hover:border-red-200 hover:bg-red-50
                           hover:text-red-600"
                >
                    Logout
                </a>

            </div>

        </div>


        <!-- ============================= -->
        <!-- PRODUCT TABLE CARD -->
        <!-- ============================= -->
        <div
            class="overflow-hidden rounded-xl border
                   border-slate-200 bg-white shadow-sm"
        >


            <!-- ============================= -->
            <!-- TABLE HEADER -->
            <!-- ============================= -->
            <div
                class="flex flex-col gap-2 border-b
                       border-slate-200 bg-slate-50 px-6 py-5
                       sm:flex-row sm:items-center
                       sm:justify-between"
            >

                <div>

                    <div class="flex items-center gap-2">

                        <!-- Purple Accent -->
                        <div
                            class="flex h-8 w-8 items-center justify-center
                                   rounded-lg bg-purple-100 text-purple-600"
                        >
                            #
                        </div>

                        <h2 class="text-base font-semibold text-slate-900">
                            Products
                        </h2>

                    </div>

                    <p class="mt-1 ml-10 text-xs text-slate-500">
                        List of all registered products.
                    </p>

                </div>


                <!-- Admin Badge -->
                <?php if ($user_role === 'admin'): ?>

                    <span
                        class="w-fit rounded-full bg-purple-100
                               px-3 py-1 text-xs font-semibold
                               text-purple-700"
                    >
                        Administrator
                    </span>

                <?php endif; ?>

            </div>


            <!-- ============================= -->
            <!-- TABLE -->
            <!-- ============================= -->
            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <!-- TABLE HEAD -->
                    <thead class="border-b border-slate-200 bg-white">

                        <tr>

                            <th
                                class="px-6 py-4 text-xs font-semibold
                                       uppercase tracking-wide
                                       text-slate-500"
                            >
                                ID
                            </th>

                            <th
                                class="px-6 py-4 text-xs font-semibold
                                       uppercase tracking-wide
                                       text-slate-500"
                            >
                                Product
                            </th>

                            <th
                                class="px-6 py-4 text-xs font-semibold
                                       uppercase tracking-wide
                                       text-slate-500"
                            >
                                Description
                            </th>

                            <th
                                class="px-6 py-4 text-xs font-semibold
                                       uppercase tracking-wide
                                       text-slate-500"
                            >
                                Price
                            </th>

                            <th
                                class="px-6 py-4 text-xs font-semibold
                                       uppercase tracking-wide
                                       text-slate-500"
                            >
                                Created
                            </th>

                            <?php if ($user_role === 'admin'): ?>

                                <th
                                    class="px-6 py-4 text-xs font-semibold
                                           uppercase tracking-wide
                                           text-slate-500"
                                >
                                    Actions
                                </th>

                            <?php endif; ?>

                        </tr>

                    </thead>


                    <!-- TABLE BODY -->
                    <tbody class="divide-y divide-slate-100">

                        <?php foreach ($products as $product): ?>

                            <tr
                                class="group transition
                                       hover:bg-blue-50/40"
                            >

                                <!-- ============================= -->
                                <!-- ID -->
                                <!-- ============================= -->
                                <td class="whitespace-nowrap px-6 py-5">

                                    <span
                                        class="inline-flex rounded-md
                                               bg-slate-100 px-2.5 py-1
                                               text-xs font-semibold
                                               text-slate-600
                                               group-hover:bg-blue-100
                                               group-hover:text-blue-700"
                                    >
                                        #<?php echo $product['id']; ?>
                                    </span>

                                </td>


                                <!-- ============================= -->
                                <!-- PRODUCT NAME -->
                                <!-- ============================= -->
                                <td class="whitespace-nowrap px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <!-- Product Icon -->
                                        <div
                                            class="flex h-9 w-9 items-center
                                                   justify-center rounded-lg
                                                   bg-blue-100 text-blue-600"
                                        >
                                            P
                                        </div>

                                        <span
                                            class="font-semibold text-slate-900"
                                        >
                                            <?php echo $product['product_name']; ?>
                                        </span>

                                    </div>

                                </td>


                                <!-- ============================= -->
                                <!-- DESCRIPTION -->
                                <!-- ============================= -->
                                <td class="max-w-xs px-6 py-5">

                                    <p
                                        class="truncate text-slate-500"
                                    >
                                        <?php echo $product['description']; ?>
                                    </p>

                                </td>


                                <!-- ============================= -->
                                <!-- PRICE -->
                                <!-- ============================= -->
                                <td class="whitespace-nowrap px-6 py-5">

                                    <span
                                        class="rounded-md bg-orange-50
                                               px-3 py-1.5 text-sm
                                               font-bold text-orange-600"
                                    >
                                        ₱<?php echo $product['price']; ?>
                                    </span>

                                </td>


                                <!-- ============================= -->
                                <!-- CREATED AT -->
                                <!-- ============================= -->
                                <td class="whitespace-nowrap px-6 py-5">

                                    <span
                                        class="inline-flex rounded-md
                                               bg-slate-100 px-2.5 py-1
                                               text-xs font-medium
                                               text-slate-600"
                                    >
                                        <?php echo $product['created_at']; ?>
                                    </span>

                                </td>


                                <!-- ============================= -->
                                <!-- ACTIONS -->
                                <!-- ============================= -->
                                <?php if ($user_role === 'admin'): ?>

                                    <td class="whitespace-nowrap px-6 py-5">

                                        <div class="flex items-center gap-2">

                                            <!-- Edit -->
                                            <a
                                                href="<?= site_url('/product/edit/' . $product['id']); ?>"
                                                class="rounded-md bg-blue-50
                                                       px-3 py-1.5 text-sm
                                                       font-semibold text-blue-600
                                                       transition
                                                       hover:bg-blue-100
                                                       hover:text-blue-700"
                                            >
                                                Edit
                                            </a>


                                            <!-- Delete -->
                                            <a
                                                href="<?= site_url('/product/delete/' . $product['id']); ?>"
                                                onclick="return confirm('Delete this product?');"
                                                class="rounded-md bg-red-50
                                                       px-3 py-1.5 text-sm
                                                       font-semibold text-red-600
                                                       transition
                                                       hover:bg-red-100
                                                       hover:text-red-700"
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


        <!-- ============================= -->
        <!-- FOOTER -->
        <!-- ============================= -->
        <div class="mt-5 flex items-center justify-between">

            <p class="text-xs text-slate-400">
                Product Management System
            </p>

            <span
                class="text-xs font-medium text-slate-400"
            >
                <?php echo count($products); ?> Products
            </span>

        </div>

    </div>


    <!-- ============================= -->
    <!-- AUTO-HIDE NOTIFICATION -->
    <!-- ============================= -->

    <?php if (!empty($notification)): ?>

        <script>
            window.setTimeout(function () {

                var notification =
                    document.getElementById('notification');

                if (notification) {
                    notification.remove();
                }

            }, 4000);
        </script>

    <?php endif; ?>

</body>

</html>