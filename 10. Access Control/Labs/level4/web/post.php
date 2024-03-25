<?php
include('libs/auth.php');
include('libs/db.php');

header('Content-Type: application/json');

$user_id = $_SESSION['user_id'];
if (isset($_GET['user_id']))
    $user_id = $_GET['user_id'];

if (!isset($_GET['action']))
    die(json_encode("Error"));

switch ($_GET['action']) {
    case 'list_posts':
        $res = select_all(
            'SELECT post_id, public FROM posts WHERE author_id = ?',
            $user_id
        );
        echo json_encode($res);
        break;
    case 'read':
        $post = select_one(
            'SELECT content, public, author_id FROM posts
            WHERE post_id = ? AND (public = 1 OR author_id = ?)',
            $_GET['id'],
            $user_id
        );
        if ($post)
            echo json_encode($post);
        else
            echo json_encode("Not Found");
        break;
    case 'create':
        $res = exec_query(
            'INSERT INTO posts (post_id, content, public, author_id) VALUES (?, ?, ?, ?);',
            generate_id(),
            $_POST['content'],
            $_POST['public'],
            $user_id
        );
        header('Refresh:2; url=wall.php'); // Redirect về wall.php sau 2s
        echo json_encode('Post created');
        break;
}