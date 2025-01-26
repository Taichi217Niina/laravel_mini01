<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskLists</title>
</head>

<body>
    <h1>Task Lists</h1>
    <!-- 成功メッセージ -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- フォーム -->
    <form action="{{ url('tasks') }}" method="POST">
        @csrf

        <div>
            <label for="title">タスク名:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">説明:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit">登録</button>
    </form>
    @foreach ($tasks as $task)
        <div>{{ $task->title }}</div>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red;">削除</button>
        </form>
    @endforeach
</body>

</html>
