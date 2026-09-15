<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create User</title>


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

            max-width: 600px;

            margin: auto;

        }


        .card {

            background: white;

            padding: 30px;

            border-radius: 8px;

            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.05);

        }


        h1 {

            margin-top: 0;

            margin-bottom: 25px;

        }


        .form-group {

            margin-bottom: 18px;

        }


        label {

            display: block;

            margin-bottom: 7px;

            font-weight: bold;

        }


        input {

            width: 100%;

            padding: 11px;

            border: 1px solid #d1d5db;

            border-radius: 6px;

            font-size: 14px;

        }


        input:focus {

            outline: none;

            border-color: #2563eb;

        }


        .error {

            background: #fee2e2;

            color: #991b1b;

            padding: 12px 15px;

            border-radius: 6px;

            margin-bottom: 20px;

        }


        .buttons {

            display: flex;

            gap: 10px;

            margin-top: 25px;

        }


        .btn {

            padding: 11px 18px;

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


        .btn-secondary {

            background: #6b7280;

            color: white;

        }


        .btn-secondary:hover {

            background: #4b5563;

        }

    </style>

</head>


<body>


<div class="container">

    <div class="card">

        <h1>Create User</h1>


        <?php if (!empty($errors)): ?>

            <div class="error">

                <?= $errors; ?>

            </div>

        <?php endif; ?>


        <form
            action="<?= site_url('/users/store'); ?>"
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
                    value="<?= htmlspecialchars($_POST['firstname'] ?? ''); ?>"
                    placeholder="Enter first name"
                    required
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
                    value="<?= htmlspecialchars($_POST['lastname'] ?? ''); ?>"
                    placeholder="Enter last name"
                    required
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
                    value="<?= htmlspecialchars($_POST['email'] ?? ''); ?>"
                    placeholder="Enter email"
                    required
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
                    value="<?= htmlspecialchars($_POST['username'] ?? ''); ?>"
                    placeholder="Minimum 5 characters"
                    required
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
                    required
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
                    required
                >

            </div>


            <!-- Buttons -->

            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Create User
                </button>


                <a
                    href="<?= site_url('/login'); ?>"
                    class="btn btn-secondary"
                >
                    Back to Login
                </a>

            </div>


        </form>

    </div>

</div>


</body>

</html>