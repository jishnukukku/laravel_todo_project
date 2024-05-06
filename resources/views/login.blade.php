<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff; /* Blue heading */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            color: #555; /* Dark gray label text */
        }
        .form-group input,
        .form-group button {
            width: calc(100% - 20px); /* Adjusted width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
            box-sizing: border-box; /* Include padding and border in the width calculation */
        }
        .form-group input:focus {
            outline: none;
            border-color: #007bff; /* Blue border color when input is focused */
        }
        .form-group button {
            background-color: #007bff; /* Blue button background */
            color: #fff; /* White button text */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .form-group p {
            margin-top: 10px;
            text-align: center;
            color: #777; /* Gray text color for the paragraph */
        }
        .form-group a {
            color: #007bff; /* Blue link text */
            text-decoration: none;
            transition: color 0.3s;
        }
        .form-group a:hover {
            color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="login-form" action="{{ route('login_user') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="form-group">
            <p>Don't have an account? <a href="{{ route('signup') }}">Sign up here</a>.</p>
        </div>
    </div>
</body>
</html>
