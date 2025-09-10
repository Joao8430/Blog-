<?php
$titulo = $_POST['titulo'] ?? '';
$conteudo = $_POST['conteudo'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$tags = isset($_POST['tags']) ? array_map('trim', explode(',', $_POST['tags'])) : [];

$posts = json_decode(file_get_contents('posts.json'), true);
$novoId = count($posts) ? end($posts)['id'] + 1 : 1;

$posts[] = [
    "id" => $novoId,
    "titulo" => htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'),
    "conteudo" => nl2br(htmlspecialchars($conteudo, ENT_QUOTES, 'UTF-8')),
    "categoria" => htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8'),
    "tags" => $tags
];

file_put_contents('posts.json', json_encode($posts, JSON_PRETTY_PRINT));
header('Location: index.php');
exit;
?>
