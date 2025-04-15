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

    // Insere a fatura na tabela invoices
    $sql = "INSERT INTO invoices (id,NumeroPedido,NomCli, DatEmi)
            VALUES (null, :NumeroPedido, :NomCli, :DatEmi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':NumeroPedido' => $NumeroPedido,
        ':NomCli' => $NomCli,
        ':DatEmi' => $DatEmi
    ]);

    // Obtém o ID da fatura recém-criada
    $invoice_id = $pdo->lastInsertId();

    // Captura os dados dos itens
    $item_descriptions = $_POST['item_description'];
    $item_quantities = $_POST['item_quantity'];
    $item_unit_prices = $_POST['item_unit_price'];

    // Insere os itens na tabela invoice_items
    $sql = "INSERT INTO invoice_items (invoice_id, description, quantity, unit_price)
            VALUES (:invoice_id, :description, :quantity, :unit_price)";
    $stmt = $pdo->prepare($sql);

    for ($i = 0; $i < count($item_descriptions); $i++) {
        $stmt->execute([
            ':invoice_id' => $invoice_id,
            ':description' => $item_descriptions[$i],
            ':quantity' => $item_quantities[$i],
            ':unit_price' => $item_unit_prices[$i]
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