<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать пост</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm mb-3">Назад</a>
    <div style="max-width: 600px; margin: 0 auto">
        <h1 class="mb-4">Новый пост</h1>

        <!-- Ошибки валидации -->
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea
                    class="form-control"
                    id="content"
                    name="content"
                    rows="5"
                    required
                >{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Создать пост</button>
        </form>
    </div>
</div>
</body>
</html>
