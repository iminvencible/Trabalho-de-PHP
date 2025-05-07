<?php
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cliente_nome = isset($_POST['cliente_nome']) ? htmlspecialchars($_POST['cliente_nome']) : 'Não informado';
 
    $produto1_nome = isset($_POST['produto1_nome']) ? htmlspecialchars($_POST['produto1_nome']) : 'Produto 1';
    $produto1_valor = isset($_POST['produto1_valor']) ? (float)$_POST['produto1_valor'] : 0.0;
 
    $produto2_nome = isset($_POST['produto2_nome']) ? htmlspecialchars($_POST['produto2_nome']) : 'Produto 2';
    $produto2_valor = isset($_POST['produto2_valor']) ? (float)$_POST['produto2_valor'] : 0.0;
 
    $valor_pago = isset($_POST['valor_pago']) ? (float)$_POST['valor_pago'] : 0.0;
 
    $total_compra = $produto1_valor + $produto2_valor;
    $troco = $valor_pago - $total_compra;
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <div class="container receipt">
        <h1>Nota Fiscal Simplificada</h1>
 
        <div id="nota-fiscal-details">
            <h2>Detalhes do Pedido</h2>
            <p><strong>Cliente:</strong> <?php echo $cliente_nome; ?></p>
 
            <h3>Itens Comprados:</h3>
            <ul>
                <li><?php echo $produto1_nome; ?>: R$ <?php echo number_format($produto1_valor, 2, ',', '.'); ?></li>
                <li><?php echo $produto2_nome; ?>: R$ <?php echo number_format($produto2_valor, 2, ',', '.'); ?></li>
            </ul>
            <hr>
            <p class="total"><strong>Total da Compra:</strong> R$ <?php echo number_format($total_compra, 2, ',', '.'); ?></p>
            <p><strong>Valor Pago:</strong> R$ <?php echo number_format($valor_pago, 2, ',', '.'); ?></p>
            <hr>
            <p class="troco"><strong>Troco:</strong> R$ <?php echo number_format($troco, 2, ',', '.'); ?></p>
 
             <?php
            
             if ($troco < 0) {
                 echo "<p style='color: red; font-weight: bold;'>Atenção: O valor pago foi insuficiente!</p>";
             }
             ?>
        </div>
 
        <a href="index.html" class="button-link">Registrar Novo Pedido</a>
    </div>
 
</body>
</html>
 
<?php
 
} else {
    echo "<!DOCTYPE html><html><head><title>Erro</title><link rel='stylesheet' href='style.css'></head><body>";
    echo "<div class='container error'>";
    echo "<h1>Erro</h1>";
    echo "<p>Ocorreu um erro ao processar o pedido. Por favor, envie o formulário corretamente.</p>";
    echo "<a href='index.html' class='button-link'>Voltar ao Formulário</a>";
    echo "</div>";
    echo "</body></html>";
    exit;
}
 
?>