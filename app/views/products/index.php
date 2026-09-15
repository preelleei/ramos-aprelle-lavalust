<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Products</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            font-family: Arial, sans-serif;

            margin: 0;

            padding: 30px;

            background: #f5f6f8;

            color: #222;

        }


        .container {

            max-width: 1100px;

            margin: auto;

        }


        .header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }


        h1 {

            margin: 0;

        }


        .header-actions {

            display: flex;

            gap: 10px;

            align-items: center;

        }


        .btn {

            display: inline-block;

            padding: 10px 16px;

            border-radius: 6px;

            text-decoration: none;

            border: none;

            cursor: pointer;

            font-size: 14px;

        }


        .btn-primary {

            background: #2563eb;

            color: white;

        }


        .btn-primary:hover {

            background: #1d4ed8;

        }


        .btn-edit {

            background: #f59e0b;

            color: white;

        }


        .btn-edit:hover {

            background: #d97706;

        }


        .btn-delete {

            background: #dc2626;

            color: white;

        }


        .btn-delete:hover {

            background: #b91c1c;

        }


        .btn-logout {

            background: #6b7280;

            color: white;

        }


        .btn-logout:hover {

            background: #4b5563;

        }


        .alert {

            background: #dcfce7;

            color: #166534;

            padding: 12px 15px;

            border-radius: 6px;

            margin-bottom: 20px;

        }


        .card {

            background: white;

            border-radius: 8px;

            overflow: hidden;

        }


        table {

            width: 100%;

            border-collapse: collapse;

        }


        th,
        td {

            padding: 14px 16px;

            text-align: left;

            border-bottom: 1px solid #e5e7eb;

        }


        th {
            background: #f3b6c2;
            color: #542832;
            padding: 16px;
            text-align: left;
            font-size: 16px;
            font-weight: 700;
            border-bottom: 2px solid #e89caa;
        }


        tr:last-child td {

            border-bottom: none;

        }


        .actions {

            display: flex;

            gap: 8px;

        }


        .empty {

            text-align: center;

            padding: 30px;

            color: #6b7280;

        }

    </style>

</head>


<body>


<div class="container">


    <div class="header">


        <h1>Products</h1>


        <div class="header-actions">


            <a
                href="<?= site_url('/products/create'); ?>"
                class="btn btn-primary"
            >
                Add Product
            </a>


            <a
                href="<?= site_url('/logout'); ?>"
                class="btn btn-logout"
                onclick="return confirm('Are you sure you want to logout?');"
            >
                Logout
            </a>


        </div>


    </div>


    <?php if (!empty($success)): ?>

        <div class="alert">

            <?= htmlspecialchars($success); ?>

        </div>

    <?php endif; ?>


    <div class="card">


        <?php if (!empty($products)): ?>


            <table>


                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Product Name</th>

                        <th>Description</th>

                        <th>Price</th>

                        <th>Quantity</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>


                    <?php foreach ($products as $product): ?>


                        <tr>


                            <td>

                                <?= htmlspecialchars($product['id']); ?>

                            </td>


                            <td>

                                <?= htmlspecialchars($product['product_name']); ?>

                            </td>


                            <td>

                                <?= htmlspecialchars($product['description']); ?>

                            </td>


                            <td>

                                <?= htmlspecialchars($product['price']); ?>

                            </td>


                            <td>

                                <?= htmlspecialchars($product['quantity']); ?>

                            </td>


                            <td>


                                <div class="actions">


                                    <a
                                        href="<?= site_url('/products/edit/' . $product['id']); ?>"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <a
                                        href="<?= site_url('/products/delete/' . $product['id']); ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this product?');"
                                    >
                                        Delete
                                    </a>


                                </div>


                            </td>


                        </tr>


                    <?php endforeach; ?>


                </tbody>


            </table>


        <?php else: ?>


            <div class="empty">

                No products found.

            </div>


        <?php endif; ?>


    </div>


</div>


</body>

</html>