<?php
// DADOS PARA A CONEXAO
$servidor = "localhost";
$porta = 5432;
$bancoDeDados = "bolsa_universitaria";
$usuario = "postgres";
$senha = "00999";

try {
    $pdo = new PDO("pgsql:host=$servidor;port=$porta;dbname=$bancoDeDados", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Monta a consulta SQL com base nos parâmetros recebidos
    $sql = "SELECT nome, fase, media FROM formulario_curso_eng_eletrica.tab_materias_simples WHERE 1=1";
    $params = array();

    if (isset($_GET['nome'])) {
        $sql .= " AND nome LIKE :nome";
        $params[':nome'] = '%' . $_GET['nome'] . '%';
    }

    if (isset($_GET['fase'])) {
        $sql .= " AND fase = :fase";
        $params[':fase'] = $_GET['fase'];
    }

    if (isset($_GET['media'])) {
        $sql .= " AND media = :media";
        $params[':media'] = $_GET['media'];
    }

    // Prepara e executa a consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    
    // Array para armazenar os resultados
    $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retorna os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($materias);
} catch (PDOException $e) {
    // Tratamento de erro
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

?>







