<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ieraksts</title>
</head>
<body>
  <h1>Ieraksts #<?= htmlspecialchars((string)($post->id ?? '')) ?></h1>

  <p><?= nl2br(htmlspecialchars($post->body ?? $post->content ?? $post->text ?? '')) ?></p>

  <p>
    <a href="/posts/<?= urlencode((string)($post->id ?? '')) ?>/edit">Rediģēt</a>
  </p>

  <form action="/posts/<?= urlencode((string)($post->id ?? '')) ?>/delete" method="POST">
    <button type="submit">Dzēst</button>
  </form>

  <p><a href="/">Atpakaļ uz sarakstu</a></p>
</body>
</html>
