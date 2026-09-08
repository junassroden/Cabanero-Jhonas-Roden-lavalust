<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>


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

    .error-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-left: 4px solid #dc2626;
        border-radius: 9px;
        padding: 15px 18px;
        margin-bottom: 20px;
    }

    .error-box-title {
        font-size: 14px;
        font-weight: 700;
        color: #991b1b;
        margin-bottom: 8px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 18px;
    }

    .error-box li {
        color: #b91c1c;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .error-box li:last-child {
        margin-bottom: 0;
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

    .product-id {
        display: inline-block;
        margin-top: 10px;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 5px 9px;
        font-size: 11px;
        font-weight: 700;
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

        <h1>Edit Product</h1>

        <p>
            Update the information of the selected product.
        </p>

    </div>

    <?php if (!empty($errors)): ?>

        <div class="error-box">

            <div class="error-box-title">
                Please correct the following:
            </div>

            <ul>

                <?php foreach ($errors as $error): ?>

                    <li>
                        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>

    <section class="form-card">

        <div class="form-card-header">

            <h2>Product Information</h2>

            <p>
                Modify the product details below and save your changes.
            </p>

            <span class="product-id">
                Product #<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>
            </span>

        </div>

        <div class="form-content">

            <form action="<?= site_url('/product/edit/' . $product['id']); ?>" method="post">

                <div class="form-group">

                    <label for="product_name">
                        Product Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        class="form-control"
                        value="<?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>"
                        required>

                </div>

                <div class="form-group">

                    <label for="description">
                        Description
                        <span class="required">*</span>
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        required><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                </div>

                <div class="form-row">

                    <div class="form-group">

                        <label for="price">
                            Price
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            class="form-control"
                            step="0.01"
                            min="0"
                            value="<?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label for="quantity">
                            Quantity
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            class="form-control"
                            min="0"
                            value="<?= htmlspecialchars($product['quantity'], ENT_QUOTES, 'UTF-8'); ?>"
                            required>

                    </div>

                </div>

                <div class="form-actions">

                    <a href="<?= site_url('/product/display'); ?>" class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="submit-btn">
                        Update Product
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
