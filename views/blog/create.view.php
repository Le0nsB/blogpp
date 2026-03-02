<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jauns ieraksts</title>
  <link rel="stylesheet" href="/blog.css">
</head>
<body>
  <main class="container">
    <h1>Izveidot ierakstu</h1>

    <section class="card">
      <form action="/posts" method="POST">
        <label for="body">Saturs</label>
        <textarea id="body" name="body" required></textarea>
        <button type="submit">Saglabāt</button>
      </form>
    </section>

    <p><a href="/">Atpakaļ uz sarakstu</a></p>
  </main>
</body>
</html>
