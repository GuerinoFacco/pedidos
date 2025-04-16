<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = 'root';

try {
    // Conexão com o banco
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura os dados da fatura
    $NumeroPedido = $_POST['NumeroPedido'];
    $NomCli = $_POST['NomCli'];    
    $DatEmi = $_POST['DatEmi'];
   
    // Inicia uma transação
    $pdo->beginTransaction();

    // Insere a fatura na tabela pedsite
    $sql = "INSERT INTO pedsite (id,NumeroPedido,NomCli, DatEmi)
            VALUES (null, :NumeroPedido, :NomCli, :DatEmi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':NumeroPedido' => $NumeroPedido,
        ':NomCli' => $NomCli,
        ':DatEmi' => $DatEmi
    ]);

    // Obtém o ID da fatura recém-criada
    $pedsite_id	 = $pdo->lastInsertId();

    // Captura os dados dos itens
    $produto = $_POST['produto'];
    $qtdped = $_POST['qtdped'];
    $preuni = $_POST['preuni'];
    /*$totite = $_POST['totite'];*/

    // Insere os itens na tabela pedsiteitems
    $sql = "INSERT INTO pedsiteitems (pedsite_id, produto, qtdped, preuni, totite)
            VALUES (:pedsite_id, :produto, :qtdped, :preuni, 0)";
    $stmt = $pdo->prepare($sql);

    for ($i = 0; $i < count($produto); $i++) {
        $stmt->execute([
            ':pedsite_id' => $pedsite_id,
            ':produto' => $produto[$i],
            ':qtdped' => $qtdped[$i],
            ':preuni' => $preuni[$i]
        ]);
    }

    // Confirma a transação
    $pdo->commit();

    echo "Fatura e itens salvos com sucesso!";
} catch (PDOException $e) {
    // Reverte a transação em caso de erro
    $pdo->rollBack();
    echo "Erro ao salvar a fatura: " . $e->getMessage();
}
?>