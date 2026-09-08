<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
            min-height: 100vh;
        }

        /* =========================
           TOP NAVIGATION
        ========================== */
        .navbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            position: sticky;
            top: 0;
            z-index: 500;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: #111827;
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            font-size: 14px;
            color: #6b7280;
            margin-right: 6px;
        }

        .logout-btn {
            text-decoration: none;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            transition: 0.2s ease;
        }

        .logout-btn:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        /* =========================
           MAIN CONTENT
        ========================== */
        .container {
            width: min(1200px, 90%);
            margin: 0 auto;
            padding: 45px 0 60px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-header-left h1 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-header-left p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 9px;
            padding: 11px 17px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: #111827;
            color: #ffffff;
            border: 1px solid #111827;
        }

        .btn-primary:hover {
            background: #000000;
            transform: translateY(-1px);
        }

        /* =========================
           TABLE WRAPPER
        ========================== */
        .table-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 8px 28px rgba(17, 24, 39, 0.07);
            overflow: hidden;
        }

        .table-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
        }

        .table-title {
            font-size: 17px;
            font-weight: 700;
            color: #111827;
        }

        .table-subtitle {
            margin-top: 4px;
            color: #6b7280;
            font-size: 13px;
        }

        .product-count {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #e5e7eb;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        /* =========================
           TABLE HEADER
        ========================== */
        thead {
            background: #111827;
        }

        thead th {
            color: #ffffff;
            text-align: left;
            padding: 16px 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid #edf0f3;
            transition: background 0.2s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody td {
            padding: 18px 20px;
            font-size: 14px;
            color: #374151;
            vertical-align: middle;
        }

        .id-cell {
            font-weight: 700;
            color: #6b7280;
        }

        .product-name {
            font-weight: 700;
            color: #111827;
        }

        .description {
            color: #6b7280;
            max-width: 300px;
            line-height: 1.5;
        }

        .price {
            font-weight: 700;
            color: #111827;
        }

        .date {
            color: #6b7280;
            white-space: nowrap;
            font-size: 13px;
        }

        /* =========================
           ACTION BUTTONS
        ========================== */
        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .action-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .edit-btn {
            color: #374151;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
        }

        .edit-btn:hover {
            background: #e5e7eb;
        }

        .delete-btn {
            color: #b91c1c;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .delete-btn:hover {
            background: #fee2e2;
        }

        /* =========================
           EMPTY STATE
        ========================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-icon {
            width: 54px;
            height: 54px;
            margin: 0 auto 15px;
            border-radius: 12px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            color: #6b7280;
        }

        .empty-state h3 {
            color: #374151;
            font-size: 16px;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 13px;
        }

        /* =========================
           NOTIFICATION
        ========================== */
        .notification {
            position: fixed;
            top: 88px;
            right: 25px;
            z-index: 1000;
            min-width: 280px;
            max-width: 380px;
            padding: 15px 18px;
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-left: 4px solid #198754;
            border-radius: 9px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            font-size: 14px;
            animation: slideIn 0.25s ease;
        }

        .notification button {
            float: right;
            margin-left: 16px;
            color: #166534;
            background: transparent;
            border: 0;
            cursor: pointer;
            font-size: 19px;
            line-height: 1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================
           FOOTER
        ========================== */
        .footer {
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
            padding-top: 25px;
        }

        /* =========================
           RESPONSIVE
        ========================== */
        @media (max-width: 768px) {
            .navbar {
                padding: 0 5%;
            }

            .user-name {
                display: none;
            }

            .container {
                width: 92%;
                padding-top: 30px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header-left h1 {
                font-size: 27px;
            }

            .header-actions {
                width: 100%;
            }

            .btn {
                flex: 1;
            }

            .table-card-header {
                padding: 17px;
            }

            thead th,
            tbody td {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->
    <nav class="navbar">

        <div class="brand">
            <div class="brand-icon">P</div>
            <span>Product Manager</span>
        </div>

        <div class="nav-right">
            <span class="user-name">
                Welcome, <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
            </span>

            <a href="<?= site_url('/logout'); ?>" class="logout-btn">
                Logout
            </a>
        </div>

    </nav>


    <!-- =========================
         NOTIFICATION
    ========================== -->
    <?php if (!empty($notification)): ?>

        <div class="notification" role="status" id="notification">

            <button
                type="button"
                onclick="document.getElementById('notification').remove();"
                aria-label="Close notification">
                &times;
            </button>

            <?= htmlspecialchars($notification, ENT_QUOTES, 'UTF-8'); ?>

        </div>

    <?php endif; ?>


    <!-- =========================
         MAIN CONTENT
    ========================== -->
    <main class="container">

        <div class="page-header">

            <div class="page-header-left">
                <h1>Products</h1>
                <p>
                    Manage and keep track of your product information.
                </p>
            </div>

            <div class="header-actions">

                <?php if ($user_role === 'admin'): ?>

                    <a
                        href="<?= site_url('/product/create'); ?>"
                        class="btn btn-primary">
                        + Add Product
                    </a>

                <?php endif; ?>

            </div>

        </div>


        <!-- =========================
             TABLE CARD
        ========================== -->
        <section class="table-card">

            <div class="table-card-header">

                <div>
                    <div class="table-title">
                        Product List
                    </div>

                    <div class="table-subtitle">
                        Overview of all available products
                    </div>
                </div>

                <div class="product-count">
                    <?= count($products); ?> Products
                </div>

            </div>


            <div class="table-container">

                <?php if (!empty($products)): ?>

                    <table>

                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Created At</th>

                                <?php if ($user_role === 'admin'): ?>
                                    <th>Actions</th>
                                <?php endif; ?>

                            </tr>
                        </thead>


                        <tbody>

                            <?php foreach ($products as $product): ?>

                                <tr>

                                    <td class="id-cell">
                                        #<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>
                                    </td>

                                    <td class="product-name">
                                        <?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>
                                    </td>

                                    <td class="description">
                                        <?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?>
                                    </td>

                                    <td class="price">
                                        ₱<?= number_format((float) $product['price'], 2); ?>
                                    </td>

                                    <td class="date">
                                        <?= htmlspecialchars($product['created_at'], ENT_QUOTES, 'UTF-8'); ?>
                                    </td>

                                    <?php if ($user_role === 'admin'): ?>

                                        <td>

                                            <div class="actions">

                                                <a
                                                    href="<?= site_url('/product/edit/' . $product['id']); ?>"
                                                    class="action-btn edit-btn">
                                                    Edit
                                                </a>

                                                <a
                                                    href="<?= site_url('/product/delete/' . $product['id']); ?>"
                                                    class="action-btn delete-btn"
                                                    onclick="return confirm('Delete this product?');">
                                                    Delete
                                                </a>

                                            </div>

                                        </td>

                                    <?php endif; ?>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                <?php else: ?>

                    <div class="empty-state">

                        <div class="empty-icon">
                            📦
                        </div>

                        <h3>No Products Found</h3>

                        <p>
                            There are currently no products available.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </section>


        <div class="footer">
            Product Manager &copy; <?= date('Y'); ?>
        </div>

    </main>


    <!-- =========================
         AUTO-HIDE NOTIFICATION
    ========================== -->
    <?php if (!empty($notification)): ?>

        <script>
            window.setTimeout(function() {

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