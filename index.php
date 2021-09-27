<?php
require_once 'vendor/autoload.php';

use App\DataLoader;
use App\Message;

$messages = DataLoader::loadMessages('messages.csv');

if (!empty($_POST)) {
    $messages [] = new Message($_POST['nickname'], $_POST['message'],date("h:i:sa"));
    DataLoader::saveMessages($messages, 'messages.csv');
}

require 'view.index.html';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}