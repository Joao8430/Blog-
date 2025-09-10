<?php
$posts = json_decode(file_get_contents("posts.json"), true);
$id = $_GET['id'] ?? 0;
$postEncontrado = null;

foreach ($posts as $post) {
    if ($post['id'] == $id) {
        $postEncontrado = $post;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo $postEncontrado ? $postEncontrado['titulo'] : "Post não encontrado"; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1><?php echo $postEncontrado ? $postEncontrado['titulo'] : "Post não encontrado"; ?></h1>
</header>

<div class="post">
<?php if ($postEncontrado): ?>
    <p><?php echo $postEncontrado['conteudo']; ?></p>
    <small>Categoria: <?php echo $postEncontrado['categoria']; ?> | Tags: <?php echo implode(', ', $postEncontrado['tags']); ?></small><br><br>
    <button onclick="window.location.href='editar_post.php?id=<?php echo $postEncontrado['id']; ?>'">✏️ Editar</button>
    <button onclick="if(confirm('Deseja realmente excluir?')) window.location.href='deletar_post.php?id=<?php echo $postEncontrado['id']; ?>'">🗑️ Excluir</button>
<?php else: ?>
    <p>O post que você está procurando não existe.</p>
<?php endif; ?>
</div>

<div style="text-align:center; margin-top: 20px;">
    <button onclick="window.location.href='index.php'">⬅ Voltar</button>
</div>
</body>
</html>

