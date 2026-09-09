
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        .create-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .create-button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

    </style>
</head>

<body>

    <h1>Users List</h1>

    <?php if ($this->session->flashdata('success')): ?>

        <div class="success">
            <?= $this->session->flashdata('success'); ?>
        </div>

    <?php endif; ?>


    <a href="/users/create" class="create-button">
        + Create Student
    </a>


    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

        </thead>


        <tbody>

            <?php if (!empty($users)): ?>

                <?php foreach ($users as $user): ?>

                    <tr>

                        <td>
                            <?= $user['id']; ?>
                        </td>

                        <td>
                            <?= $user['firstname']; ?>
                        </td>

                        <td>
                            <?= $user['lastname']; ?>
                        </td>

                        <td>
                            <?= $user['email']; ?>
                        </td>

                        <td>
                            <?= $user['username']; ?>
                        </td>

                        <td>

                            <a
                                href="/users/edit/<?= $user['id']; ?>"
                                class="edit-button"
                            >
                                Edit
                            </a>

                            <a
                                href="/users/delete/<?= $user['id']; ?>"
                                class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this user?');"
                            >
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="6">
                        No users found.
                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</body>

</html>