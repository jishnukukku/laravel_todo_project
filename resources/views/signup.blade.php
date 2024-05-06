<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Styles for the signup form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff; /* White background for the form container */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
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
            width: calc(100% - 22px); /* Adjusted width */
            padding: 10px;
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 5px; /* Slightly rounded corners */
            transition: border-color 0.3s ease; /* Smooth transition for border color */
            box-sizing: border-box; /* Include padding and border in the width calculation */
        }
        .form-group input:focus {
            border-color: #007bff; /* Blue border color when input is focused */
            outline: none; /* Remove default focus outline */
        }
        .form-group button {
            background-color: #007bff; /* Blue button background */
            color: #fff; /* White button text */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition for background color */
        }
        .form-group button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        /* Styles for the login link */
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #007bff; /* Blue link text */
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        /* Styles for error messages */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-weight: bold;
        }
        .alert.error {
            background-color: #f8d7da; /* Light red background for error messages */
            color: #721c24; /* Dark red text color */
            border: 1px solid #f5c6cb; /* Light red border */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <!-- Display error messages if they exist -->
        @if($errors->any())
            <div class="alert error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <form id="signup-form" action="{{ route('first') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <!-- Login link for users who already have an account -->
        <div class="login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
        </div>
    </div>
</body>
</html>
