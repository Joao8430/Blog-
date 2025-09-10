<?php
$posts = json_decode(file_get_contents("posts.json"), true);

// Busca
$busca = $_GET['busca'] ?? '';
if ($busca) {
    $posts = array_filter($posts, function($p) use ($busca) {
        return stripos($p['titulo'], $busca) !== false || 
               stripos(implode(' ', $p['tags']), $busca) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="pt-BR"> // Linguagem do Blog 
<head>
    <meta charset="UTF-8">
    <title>Blog Interativo - Mini CMS</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>🌎Blog Interativo </h1> //Titulo do blog 
        <button onclick="window.location.href='novo_post.php'">➕ Novo Post</button>
        <form method="GET" style="margin-top:10px;">
            <input type="text" name="busca" placeholder="Buscar posts..." value="<?php echo htmlspecialchars($busca); ?>">
            <button type="submit">🔍</button>
        </form>
    </header>

    <?php foreach ($posts as $post): ?>
        <div class="post" onclick="abrirPost(<?php echo $post['id']; ?>)">
            <h2><?php echo $post['titulo']; ?></h2>
            <p><?php echo substr($post['conteudo'], 0, 120); ?>...</p>
            <small>Categoria: <?php echo $post['categoria']; ?> | Tags: <?php echo implode(', ', $post['tags']); ?></small>
        </div>
    <?php endforeach; ?>
</body>
</html>


