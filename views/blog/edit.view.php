<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rediģēt ierakstu</title>
</head>
<body>
  <h1>Rediģēt ierakstu #<?= htmlspecialchars((string)($post->id ?? '')) ?></h1>

  <form action="/posts/<?= urlencode((string)($post->id ?? '')) ?>/update" method="POST">
    <label for="body">Saturs</label><br>
    <textarea id="body" name="body" rows="8" cols="50" required><?= htmlspecialchars($post->body ?? $post->content ?? $post->text ?? '') ?></textarea><br><br>
    <button type="submit">Saglabāt izmaiņas</button>
  </form>

  <p><a href="/posts/<?= urlencode((string)($post->id ?? '')) ?>">Atpakaļ uz ierakstu</a></p>
</body>
</html>
