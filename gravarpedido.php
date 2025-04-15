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
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $invoice_date = $_POST['invoice_date'];
    $due_date = $_POST['due_date'];
    $total_amount = $_POST['total_amount'];

    // Inicia uma transação
    $pdo->beginTransaction();

    // Insere a fatura na tabela invoices
    $sql = "INSERT INTO invoices (customer_name, customer_email, invoice_date, due_date, total_amount)
            VALUES (:customer_name, :customer_email, :invoice_date, :due_date, :total_amount)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':customer_name' => $customer_name,
        ':customer_email' => $customer_email,
        ':invoice_date' => $invoice_date,
        ':due_date' => $due_date,
        ':total_amount' => $total_amount
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