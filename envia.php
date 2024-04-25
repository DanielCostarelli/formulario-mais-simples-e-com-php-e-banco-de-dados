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
    echo "Conectado ao banco de dados!!!";


    

    //RECEBE VALOR DAS VARIAVEIS  E  ENVIA AO BANCO DE DADOS
    $nomes = $_POST['nome'];
    $fases = $_POST['fase'];
    $medias = $_POST['media'];

    $sql = "INSERT INTO formulario_curso_eng_eletrica.tab_materias_simples(nome,fase,media) values('$nomes','$fases','$medias')";
    $stmt = $pdo->query($sql);
    echo ">>> USUÁRIO CADASTRADO COM SUCESSO! <BR>";




    header("Location: pagi.html");
    exit();

} catch (PDOException $e) {
    // Tratamento de erro
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>


