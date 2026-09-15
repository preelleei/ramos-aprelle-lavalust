<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | LavaLust</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, sans-serif;

            background: #f5f6f8;
            color: #222;
        }

        .login-container {
            width: 100%;
            max-width: 420px;

            padding: 20px;
        }

        .card {
            background: white;

            padding: 35px;

            border-radius: 10px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;

            text-align: center;
        }

        .subtitle {
            text-align: center;

            color: #6b7280;

            margin-bottom: 28px;
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

            padding: 12px;

            border: 1px solid #d1d5db;

            border-radius: 6px;

            font-size: 14px;
        }

        input:focus {
            outline: none;

            border-color: #2563eb;
        }

        .login-button {
            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 6px;

            background: #2563eb;

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;
        }

        .login-button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;

            color: #991b1b;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;

            font-size: 14px;
        }

    </style>

</head>


<body>

<div class="login-container">

    <div class="card">

        <h1>Login</h1>

        <p class="subtitle">
            Product Management System
        </p>


        <?php if (!empty($error)): ?>

            <div class="error">

                <?= htmlspecialchars($error); ?>

            </div>

        <?php endif; ?>


        <form
            action="<?= site_url('/login'); ?>"
            method="POST"
        >

            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    required
                    autocomplete="username"
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>

    </div>

</div>

</body>

</html>