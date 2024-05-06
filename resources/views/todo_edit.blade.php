<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto 0;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .alert {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            margin-top: 20px;
        }
        .error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Edit Todo Item</h1>

    

    <form method="POST" action="{{ route('update-task', ['id' => $todo_items->id]) }}">
        @csrf
        @method('PUT')

        <label for="heading">Heading:</label>
        <input type="text" id="heading" name="heading" value="{{ $todo_items->heading }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required>{{ $todo_items->description }}</textarea>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="{{ $todo_items->start_date }}" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="{{ $todo_items->end_date }}" required>

        <button type="submit">Update</button>

        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        <script>
        setTimeout(function() {
            window.location.href = "{{ route('welcome-user') }}"; 
        }, 400); 
    </script>
    @endif

    @if(session('error'))
        <div class="alert error">
            {{ session('error') }}
        </div>
    @endif
    </form>
</body>
</html>
