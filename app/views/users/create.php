<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create Student</title>

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

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }

        .create-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .create-button:hover {
            background-color: #218838;
        }

        .back-button {
            display: inline-block;
            margin-left: 10px;
            color: #333;
            text-decoration: none;
        }

    </style>

</head>


<body>

<div class="container">

    <h1>Student Profile</h1>


    <!-- Display validation errors -->

    <?php if (validation_errors()): ?>

        <div class="error">

            <?= validation_errors(); ?>

        </div>

    <?php endif; ?>


    <form action="/users/store" method="POST">


        <!-- First Name -->

        <div class="form-group">

            <label for="firstname">
                First Name
            </label>

            <input
                type="text"
                id="firstname"
                name="firstname"
                value="<?= set_value('firstname'); ?>"
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
                value="<?= set_value('lastname'); ?>"
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
                value="<?= set_value('email'); ?>"
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
                value="<?= set_value('username'); ?>"
                placeholder="Minimum 5 characters"
            >

        </div>


        <!-- Password -->

        <div class="form-group">

            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Minimum 5 characters"
            >

        </div>


        <!-- Confirm Password -->

        <div class="form-group">

            <label for="confirm_password">
                Confirm Password
            </label>

            <input
                type="password"
                id="confirm_password"
                name="confirm_password"
                placeholder="Re-enter password"
            >

        </div>


        <!-- Buttons -->

        <button
            type="submit"
            class="create-button"
        >
            CREATE
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