<<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Post - Mini CMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>📝 Criar Novo Post</h1>
</header>

<div class="post">
    <form action="salvar_post.php" method="POST">
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br>

        <label>Conteúdo:</label><br>
        <textarea name="conteudo" rows="6" required></textarea><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria" required><br>

        <label>Tags (separadas por vírgula):</label><br>
        <input type="text" name="tags"><br>

        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</div>
</body>
</html>

