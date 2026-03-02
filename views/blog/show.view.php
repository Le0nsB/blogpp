<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ieraksts</title>
  <link rel="stylesheet" href="/blog.css">
</head>
<body>
  <main class="container">
    <h1>Ieraksts #<?= htmlspecialchars((string)($post->id ?? '')) ?></h1>

    <article class="card">
      <p><?= nl2br(htmlspecialchars($post->body ?? $post->content ?? $post->text ?? '')) ?></p>
    </article>

    <div class="actions">
      <a href="/posts/<?= urlencode((string)($post->id ?? '')) ?>/edit">Rediģēt</a>

      <form action="/posts/<?= urlencode((string)($post->id ?? '')) ?>/delete" method="POST">
        <button type="submit">Dzēst</button>
      </form>
    </div>

    <p><a href="/">Atpakaļ uz sarakstu</a></p>
  </main>
</body>
</html>
