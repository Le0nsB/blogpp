<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jauns ieraksts</title>
</head>
<body>
  <h1>Izveidot ierakstu</h1>

  <form action="/posts" method="POST">
    <label for="body">Saturs</label><br>
    <textarea id="body" name="body" rows="8" cols="50" required></textarea><br><br>
    <button type="submit">Saglabāt</button>
  </form>

  <p><a href="/">Atpakaļ uz sarakstu</a></p>
</body>
</html>
