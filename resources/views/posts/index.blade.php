<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Все посты</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4">Все посты</h1>

    <!-- Кнопка "Добавить пост" -->
    <div class="text-end mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
            Добавить пост
        </a>
    </div>

    @if(session('success'))
        <div class="text-center alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @if($posts->isEmpty())
            <div class="col-12 text-center">
                <p class="text-muted">Пока нет ни одного поста.</p>
            </div>
        @else
            @foreach($posts as $post)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title text-center mb-0">
                                    {{ htmlspecialchars($post->title) }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
</body>
</html>

