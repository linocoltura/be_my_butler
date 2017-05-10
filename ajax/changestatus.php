<?php
header('Content-Type: application/json');
session_start();

include_once("classes/Service.class.php");

$service = new Service();
$service->setUserID($_SESSION['userData']['id']);
$service->setOpen(true);
$service->setCompleted(false);


if (!empty($_POST['postID']) && !empty($_POST['newDescription'])) {

    $user = new User();
    $user->setEmail($_SESSION['user']);
    $currentUser = $user->getProfile();
    $userID = $currentUser['userID'];
    $postID = $_POST['postID'];
    $newDescription = $_POST['newDescription'];

    $post = new Post();
    $post->setUserID($userID);
    $post->setPostID($postID);
    $post->setPostDescription($newDescription);

    try {
        if ($post->changeDescription()) {
            $feedback = [
                "code" => 200,
                "1" => $post->getUserID(),
                "2" => $_POST['newDescription'],
                "3" => $post->getPostDescription()
            ];
        }
    } catch (Exception $e) {
        $feedback = [
            "code" => 500,
            "message" => $e->getMessage()
        ];
    }


    echo json_encode($feedback);
}
