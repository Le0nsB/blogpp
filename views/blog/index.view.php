<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visi ieraksti</title>
</head>
<body>
  <h1>Visi bloga ieraksti</h1>
  <p><a href="/posts/create">Izveidot jaunu ierakstu</a></p>
  <?php if (empty($posts)): ?>
    <p>Nav neviena ieraksta.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($posts as $post): ?>
        <li>
          <p>
            <?= nl2br(htmlspecialchars($post['body'] ?? $post['content'] ?? $post['text'] ?? '')) ?>
          </p>
          <?php if (!empty($post['id'])): ?>
            <p>
              <a href="/posts/<?= urlencode((string)$post['id']) ?>">Skatīt</a>
              <a href="/posts/<?= urlencode((string)$post['id']) ?>/edit">Rediģēt</a>
            </p>
            <form action="/posts/<?= urlencode((string)$post['id']) ?>/delete" method="POST">
              <button type="submit">Dzēst</button>
            </form>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>