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
    <form method="POST" action="{{ route('todo.store') }}">
        @csrf
        <label class="label label-text" for="title">
            Title
        </label>
        <input type="text" placeholder="Title" name="title" class="input" id="title" required
               maxlength="255" value="{{ old('title') }}"/>
        <label class="label label-text" for="description">
            Description
        </label>
        <textarea class="textarea mb-4" placeholder="Description" name="description" id="description"
                  required>{{ old('description') }}</textarea>
        @if($errors)
            @foreach($errors->all() as $error)
                <div class="alert alert-error alert-outline my-4">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <button class="btn btn-gradient btn-primary mb-4" type="submit">
            Save
        </button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th>
                Date
            </th>
            <th>
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="target-table">
        @foreach($todos as $todo)
            <tr class="hover">
                <td class="text-nowrap">
                    {{ $todo->title }}
                </td>
                <td>
                    {{ $todo->description }}
                </td>
                <td class="text-nowrap">
                    {{ $todo->updated_at->diffForHumans() }}
                </td>
                <td>
                    <a class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                       href="{{ route('todo.edit', $todo) }}" hx-target="body">
                        <span class="icon-[tabler--pencil] size-5"></span>
                    </a>
                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"
                            hx-delete="{{ route('todo.destroy', $todo) }}" hx-target="closest tr">
                        <span class="icon-[tabler--trash] size-5"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
