<?php
// log.php - log simples de acessos com parâmetro secreto
// Obs: funciona em hospedagem com PHP habilitado.

date_default_timezone_set('America/Sao_Paulo');

$p  = isset($_POST['p']) ? $_POST['p'] : '';
$ts = isset($_POST['ts']) ? $_POST['ts'] : time();
$u  = isset($_POST['u']) ? $_POST['u'] : '';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$line = date('Y-m-d H:i:s', (int)($ts/1000)) . " | IP: {$ip} | param: {$p} | url: {$u}\n";

$file = __DIR__ . '/access.log';
file_put_contents($file, $line, FILE_APPEND);

header('Content-Type: application/json');
echo json_encode(['ok' => true]);
