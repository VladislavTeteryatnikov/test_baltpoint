<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ htmlspecialchars($post->title) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm mb-3">Назад к постам</a>

    <div class="card shadow-sm" style="max-width: 700px; margin: 0 auto">
        <div class="card-body">
            <h3 class="card-title">
                {{ htmlspecialchars($post->title) }}
            </h3>
            <div class="card-text">{{ htmlspecialchars($post->content) }}</div>

            <hr>

            <h5>Комментарии ({{ $post->comments->count() }})</h5>
            @if($post->comments->isEmpty())
                <p class="text-muted">Нет комментариев.</p>
            @else
                <ul class="list-group">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item">
                            {{ htmlspecialchars($comment->content) }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
</body>
</html>
