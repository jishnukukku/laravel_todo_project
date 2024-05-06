<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .todo-items {
            margin-top: 20px;
        }
        .todo-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .todo-item h3 {
            font-size: 1.2rem;
            color: #333333;
            margin-bottom: 10px;
        }
        .todo-item p {
            color: #666666;
            margin-bottom: 5px;
        }
        .no-data {
            color: #666666;
            font-style: italic;
            margin-bottom: 10px;
        }
        .todo-item.completed {
            background-color: #f0f8ff; /* Light blue background for completed items */
        }
        .todo-item.completed h3 {
            color: #28a745; /* Green color for completed task headings */
        }
        .rounded-image-container {
            overflow: hidden;
            border-radius: 8px;
            width: 200px; /* Adjust this value to set the desired fixed width */
            height: 150px; /* Adjust this value to set the desired fixed height */
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .rounded-image {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Completed Tasks</h1>
        <div class="todo-items">
            @if($completed_todo->count() > 0)
                @foreach ($completed_todo as $item)
                <div class="todo-item completed">
                    <h3><b>{{$item->heading}}</b></h3>
                    <p>Description: {{$item->description}}</p>
                    <p>Start Date: {{$item->start_date}}</p>
                    <p>End Date: {{$item->end_date}}</p>

                    @if($item->image)
                    <div class="rounded-image-container">
                        <img class="rounded-image" src="{{ asset('images/' . $item->image) }}" alt="Task Image">
                    </div>
                    @endif
                </div>
                @endforeach
            @else
                <div class="todo-item">
                    <p class="no-data">No completed tasks found</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
