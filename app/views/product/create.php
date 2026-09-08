<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

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
        .navbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
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

        .back-link {
            text-decoration: none;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-link:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        /* =========================
       PAGE
    ========================== */
        .page-wrapper {
            width: min(760px, 92%);
            margin: 0 auto;
            padding: 48px 0 60px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 32px;
            color: #111827;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .page-heading p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 8px 28px rgba(17, 24, 39, 0.07);
            overflow: hidden;
        }

        .form-card-header {
            padding: 22px 26px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-card-header h2 {
            font-size: 17px;
            color: #111827;
            margin-bottom: 5px;
        }

        .form-card-header p {
            font-size: 13px;
            color: #6b7280;
        }

        .form-content {
            padding: 28px 26px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 13px;
            font-weight: 700;
        }

        .required {
            color: #b91c1c;
        }

        .form-control {
            width: 100%;
            border: 1px solid #d1d5db;
            background: #ffffff;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            color: #111827;
            outline: none;
            transition: 0.2s ease;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:hover {
            border-color: #9ca3af;
        }

        .form-control:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.08);
        }

        textarea.form-control {
            min-height: 125px;
            resize: vertical;
            line-height: 1.5;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-hint {
            display: block;
            margin-top: 6px;
            font-size: 12px;
            color: #9ca3af;
        }

        .form-actions {
            margin-top: 8px;
            padding-top: 22px;
            border-top: 1px solid #edf0f3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .cancel-btn {
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
            font-weight: 600;
            padding: 11px 17px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .cancel-btn:hover {
            background: #f3f4f6;
        }

        .submit-btn {
            border: 1px solid #111827;
            background: #111827;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .submit-btn:hover {
            background: #000000;
            transform: translateY(-1px);
        }

        .footer {
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
            padding-top: 28px;
        }

        @media (max-width: 650px) {

            .navbar {
                padding: 0 5%;
            }

            .brand span {
                display: none;
            }

            .page-wrapper {
                width: 92%;
                padding-top: 32px;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .form-card-header,
            .form-content {
                padding-left: 20px;
                padding-right: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .cancel-btn,
            .submit-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    ```

</head>

<body>

    <nav class="navbar">

        <div class="brand">
            <div class="brand-icon">P</div>
            <span>Product Manager</span>
        </div>

        <a href="<?= site_url('/product/display'); ?>" class="back-link">
            ← Back to Products
        </a>

    </nav>

    <main class="page-wrapper">

        <div class="page-heading">
            <h1>Add Product</h1>
            <p>
                Create a new product and add it to your product inventory.
            </p>
        </div>


        <section class="form-card">

            <div class="form-card-header">
                <h2>Product Information</h2>
                <p>
                    Enter the details below to create a new product.
                </p>
            </div>


            <div class="form-content">
                <form action="<?= site_url('/product/create'); ?>" method="post">
                    <div class="form-group">

                        <label for="product_name">
                            Product Name
                            <span class="required">*</span>
                        </label>

                        <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter product name" required>

                    </div>


                    <div class="form-group">
                        <label for="description">
                            Description
                        </label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Enter a short description of the product"></textarea>
                        <span class="form-hint">
                            Provide a short and clear description.
                        </span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">
                                Price
                                <span class="required">*</span>
                            </label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="0.00" min="0"
                                step="0.01" required>

                        </div>

                        <div class="form-group">
                            <label for="quantity">
                                Quantity
                                <span class="required">*</span>
                            </label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0"
                                min="0" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="<?= site_url('/product/display'); ?>" class="cancel-btn">
                            Cancel
                        </a>

                        <button type="submit" class="submit-btn">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </section>


        <div class="footer">
            Product Manager &copy; <?= date('Y'); ?>
        </div>
    </main>
</body>
</html>