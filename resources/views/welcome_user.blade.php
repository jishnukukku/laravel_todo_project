<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Jishnu</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #343a40;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-top: 20px; /* Added to give space at the top */
        }
        .btn {
            width: calc(100% - 48px); /* Adjusted width to consider padding */
            padding: 14px 24px; /* Adjusted padding */
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Added transition */
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #0056b3; /* Change background color on hover */
            transform: translateY(-2px); /* Move button slightly up */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Add shadow on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome {{$userName}}</h1>
            <div class="btn-container">
                <a href="{{route('todo-creation')}}" class="btn">Add Task</a>
                <a href="{{route('todo-view')}}" class="btn">View Tasks</a>
                <a href="{{route('completed-todo')}}" class="btn">Completed Tasks</a>
            </div>
        </div>
    </div>
</body>
</html>
