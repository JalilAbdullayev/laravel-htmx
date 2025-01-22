<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
<main class="container" hx-boost="true">
    <form method="POST" action="{{ route('todo.update', $todo->id) }}">
        @csrf
        @method('PATCH')
        <div>
            <label class="label label-text" for="title">
                Title
            </label>
            <input type="text" placeholder="Title" name="title" class="input" id="title" required
                   maxlength="255" value="{{ $todo->title }}"/>
            <span class="label">
                    <span class="label-text-alt">Please write your full name</span>
                </span>
        </div>
        <div>
            <label class="label label-text" for="description">
                Description
            </label>
            <textarea class="textarea" placeholder="Description" name="description" id="description"
                      required>{{ $todo->description }}</textarea>
        </div>
        <button class="btn btn-gradient btn-primary" type="submit">
            Save
        </button>
    </form>
</main>
</body>
</html>
