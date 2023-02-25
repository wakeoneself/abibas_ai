<?php
header('Content-Type: application/json');

require_once 'Openai.php';

$prompt = $_POST["prompt"];
$push = "Напиши абсурдную смешную пацанскую цитату про ".$prompt.". Добавь в конце цитаты слово 'епта'. Пришли цитату на русском языке.";
$openai = New Openai();

$openai->request("text-davinci-003", $push, 300);
?>