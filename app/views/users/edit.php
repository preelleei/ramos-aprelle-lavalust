```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Student</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .container {
            width: 500px;
            margin: auto;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }

        .update-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #0069d9;
        }

        .back-button {
            display: inline-block;
            margin-left: 10px;
            color: #333;
            text-decoration: none;
        }

        .note {
            color: #666;
            font-size: 13px;
            margin-bottom: 15px;
        }

    </style>

</head>


<body>

<div class="container">

    <h1>Edit Student</h1>


    <!-- Display validation errors -->

    <?php if (validation_errors()): ?>

        <div class="error">

            <?= validation_errors(); ?>

        </div>

    <?php endif; ?>


    <p class="note">
        Leave the password fields blank if you do not want to change the password.
    </p>


    <form
        action="/users/update/<?= $user['id']; ?>"
        method="POST"
    >


        <!-- First Name -->

        <div class="form-group">

            <label for="firstname">
                First Name
            </label>

            <input
                type="text"
                id="firstname"
                name="firstname"
                value="<?= set_value('firstname', $user['firstname']); ?>"
                placeholder="Enter first name"
            >

        </div>


        <!-- Last Name -->

        <div class="form-group">

            <label for="lastname">
                Last Name
            </label>

            <input
                type="text"
                id="lastname"
                name="lastname"
                value="<?= set_value('lastname', $user['lastname']); ?>"
                placeholder="Enter last name"
            >

        </div>


        <!-- Email -->

        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= set_value('email', $user['email']); ?>"
                placeholder="Enter email"
            >

        </div>


        <!-- Username -->

        <div class="form-group">

            <label for="username">
                Username
            </label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= set_value('username', $user['username']); ?>"
                placeholder="Minimum 5 characters"
            >

        </div>


        <!-- Password -->

        <div class="form-group">

            <label for="password">
                New Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Leave blank to keep current password"
            >

        </div>


        <!-- Confirm Password -->

        <div class="form-group">

            <label for="confirm_password">
                Confirm New Password
            </label>

            <input
                type="password"
                id="confirm_password"
                name="confirm_password"
                placeholder="Re-enter new password"
            >

        </div>


        <!-- Buttons -->

        <button
            type="submit"
            class="update-button"
        >
            UPDATE
        </button>


        <a
            href="/users"
            class="back-button"
        >
            Back to Users
        </a>


    </form>

</div>

</body>

</html>
```
