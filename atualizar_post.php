<?php
$id = $_POST['id']; 
$titulo = $_POST['titulo'] ?? ''; 
$conteudo = $_POST['conteudo'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$tags = isset($_POST['tags']) ? array_map('trim', explode(',', $_POST['tags'])) : [];

$posts = json_decode(file_get_contents('posts.json'), true);

foreach($posts as &$post) {
    if($post['id'] == $id) {
        $post['titulo'] = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');
        $post['conteudo'] = nl2br(htmlspecialchars($conteudo, ENT_QUOTES, 'UTF-8'));
        $post['categoria'] = htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8');
        $post['tags'] = $tags;
        break;
    }
}

file_put_contents('posts.json', json_encode($posts, JSON_PRETTY_PRINT));
header('Location: index.php');
exit;
?>
