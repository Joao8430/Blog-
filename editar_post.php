<?php
$posts = json_decode(file_get_contents("posts.json"), true);
$id = $_GET['id'] ?? 0;
$post = null;

foreach($posts as $p) {
    if($p['id'] == $id) {
        $post = $p;
        break;
    }
}
if(!$post) die("Post não encontrado.");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Post - Mini CMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>✏️ Editar Post</h1>
</header>

<div class="post">
    <form action="atualizar_post.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <label>Título:</label><br>
        <input type="text" name="titulo" value="<?php echo $post['titulo']; ?>" required><br>

        <label>Conteúdo:</label><br>
        <textarea name="conteudo" rows="6" required><?php echo $post['conteudo']; ?></textarea><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria" value="<?php echo $post['categoria']; ?>" required><br>

        <label>Tags (vírgula):</label><br>
        <input type="text" name="tags" value="<?php echo implode(',', $post['tags']); ?>"><br>

        <button type="submit">Atualizar</button>
        <button type="button" onclick="window.location.href='index.php'">Cancelar</button>
    </form>
</div>
</body>
</html>
