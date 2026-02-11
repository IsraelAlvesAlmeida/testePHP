<?php
header('Content-Type: application/json');

$cnpj = preg_replace('/\D/', '', $_GET['cnpj'] ?? '');

if (strlen($cnpj) !== 14) {
    echo json_encode(['success' => false, 'msg' => 'CNPJ inválido']);
    exit;
}

$url = "https://brasilapi.com.br/api/cnpj/v1/{$cnpj}";

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 5
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($ch) {
    curl_close($ch);
}

if ($httpCode !== 200) {
    echo json_encode(['success' => false, 'msg' => 'CNPJ não encontrado']);
    exit;
}

$data = json_decode($response, true);

echo json_encode([
    'success' => true,
    'nome'    => $data['razao_social'] ?? '',
    'email'   => $data['email'] ?? '',
    'telefone'=> $data['ddd_telefone_1'] ?? ''
]);
