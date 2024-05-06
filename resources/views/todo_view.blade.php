<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
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
        .todo-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .todo-item.completed h3::after {
            content: " ✔";
            color: #28a745;
        }
        .todo-item p {
            margin: 5px 0;
            color: #6c757d;
        }
        .btn-group {
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            border: none;
            margin-right: 10px;
        }
        .btn.complete {
            background-color: #28a745;
        }
        .btn.edit {
            background-color: #ffc107;
        }
        .btn.delete {
            background-color: #dc3545;
        }
        .todo-item p.no-data {
            color: #6c757d;
            font-style: italic; 
            margin-bottom: 10px; 
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
        <h1 style="text-align: center;">Todo List</h1>
        <div class="todo-items">

        @if($user_data->count() > 0)
    @foreach ($user_data as $item)
    <div class="todo-item">
        <h3><b>{{$item->heading}}</b></h3>
        <p>Description: {{$item->description}}</p>
        <p>Start Date: {{$item->start_date}}</p>
        <p>End Date: {{$item->end_date}}</p>

        @if($item->image)
        <div class="rounded-image-container">
            <img class="rounded-image" src="{{ asset('images/' . $item->image) }}" alt="Todo Image">
        </div>
        @else
        <p>No image</p>
        @endif
        <div class="btn-group">
            <button class="btn complete" data-item-id="{{$item->id}}">Complete</button>
            <button class="btn edit" data-item-id="{{$item->id}}" onclick="window.location.href='{{ route('edit-todo', ['id' => $item->id]) }}'">Edit</button>
            <button class="btn delete" data-item-id="{{$item->id}}">Delete</button>
        </div>
    </div>
    @endforeach
@else
    <div class="todo-item">
       <p class="no-data">No data found</p>
    </div>
@endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const todoItems = document.querySelectorAll('.todo-item');

            todoItems.forEach(function (item) {
                const completeBtn = item.querySelector('.complete');
                const heading = item.querySelector('h3');

                completeBtn.addEventListener('click', function () {
                    item.classList.toggle('completed');
                    if (item.classList.contains('completed')) {
                        completeBtn.textContent = 'Completed';
                    } else {
                        completeBtn.textContent = 'Complete';
                    }
                });
            });
        });

        $(document).ready(function () {
            $('.delete').on('click', function () {
                var itemId = $(this).data('item-id');
                $.ajax({
                    url: '/delete-status/' + itemId,
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}', status: 'deleted'},
                    success: function (response) {
                        console.log('Deleted successfully');
                        console.log(response);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.complete').on('click', function () {
                var itemId = $(this).data('item-id');
                $.ajax({
                    url: '/update-status/' + itemId,
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}', status: 'completed'},
                    success: function (response) {
                        console.log('Success');
                        console.log(response);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
