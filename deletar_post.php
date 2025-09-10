<?php
$id = $_GET['id'] ?? 0;
$posts = json_decode(file_get_contents('posts.json'), true);

$posts = array_filter($posts, fn($p) => $p['id'] != $id);
file_put_contents('posts.json', json_encode(array_values($posts), JSON_PRETTY_PRINT));
header('Location: index.php');
exit;
?>
