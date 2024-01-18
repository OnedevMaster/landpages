<?php

// Configuração básica
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Rotas
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

// Verificar a rota e executar a função correspondente
switch ($uri[1]) {
    case 'produtos':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Obter lista de produtos
            $produtos = obterProdutos();
            echo json_encode($produtos);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Adicionar novo produto (requer autenticação ou validação de token)
            // $dados = json_decode(file_get_contents('php://input'), true);
            // adicionarProduto($dados);
        }
        break;

    // Adicione mais rotas conforme necessário

    default:
        header("HTTP/1.1 404 Not Found");
        echo json_encode(['erro' => 'Rota não encontrada']);
        break;
}

// Funções
function obterProdutos() {
    // Lógica para obter produtos do banco de dados ou de outro armazenamento
    $produtos = [
        ['id' => 1, 'nome' => 'Produto 1', 'preco' => 19.99],
        ['id' => 2, 'nome' => 'Produto 2', 'preco' => 29.99],
        // Adicione mais produtos conforme necessário
    ];

    return $produtos;
}

// Adicione mais funções conforme necessário

?>
