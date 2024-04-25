<?php
// DADOS PARA A CONEXAO
$servidor = "localhost";
$porta = 5432;
$bancoDeDados = "bolsa_universitaria";
$usuario = "postgres";
$senha = "00999";

// Conexão com o banco de dados
try {
    $pdo = new PDO("pgsql:host=$servidor;port=$porta;dbname=$bancoDeDados", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para buscar os dados
    $sql = "SELECT nome, fase, media FROM formulario_curso_eng_eletrica.tab_materias_simples";
    $stmt = $pdo->query($sql);

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
