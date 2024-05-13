<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" text="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">ANJURA<em> System</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="cadastro.html">Cadastro</a></li>
                            <li><a href="pesquisa.html">Pesquisa</a></li>
                            <li><a href="alteracao.html">Alteração</a></li>
                            <li><a href="calculo.html">Cálculo Salário</a></li>
                            <li><a href="sena.php">Entretenimento</a></li>
                            <li><a href="email.html">Contato</a></li>
                           </ul>
                        <a class='menu-trigger'><span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/video.mp4" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="caption">             

<?php
require("config.php");

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $setor = $_POST["setor"];
    $cargo = $_POST["cargo"];
    $filhos = $_POST["filhos"];
    $salario = $_POST["salario"];
    $dt_admissao = date("Y-m-d");

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO funcionarios (nome, email, setor, cargo, salario, dt_admissao) VALUES ('$nome', '$email', '$setor', '$cargo', '$salario', '$dt_admissao')";

    // Executa a consulta
    if (mysqli_query($conexao, $sql)) {
       
        // Cálculo dos descontos e do IRPF
        $INSS_MAX = 908.86; // Valor máximo de contribuição ao INSS (em reais)
        $INSS_RATE = 0.11; // Taxa de contribuição ao INSS
        $DEDUCAO_DEPENDENTE = 189.59; // Dedução por dependente no cálculo do IRPF (em reais)
        $FAIXA1_LIMITE = 1903.98; // Limite da primeira faixa de alíquota do IRPF (em reais)
        $FAIXA1_TAXA = 0.075; // Alíquota da primeira faixa do IRPF
        $FAIXA2_LIMITE = 2826.65; // Limite da segunda faixa de alíquota do IRPF (em reais)
        $FAIXA2_TAXA = 0.15; // Alíquota da segunda faixa do IRPF
        $FAIXA3_LIMITE = 3751.05; // Limite da terceira faixa de alíquota do IRPF (em reais)
        $FAIXA3_TAXA = 0.225; // Alíquota da terceira faixa do IRPF
        $FAIXA4_TAXA = 0.275; // Alíquota da quarta faixa do IRPF

        // Calculando o desconto do INSS
        $descontoINSS = min($salario * $INSS_RATE, $INSS_MAX);

        // Calculando o salário líquido após o desconto do INSS
        $salarioLiquido = $salario - $descontoINSS;

        // Calculando a base de cálculo do IRPF (considerando dedução por dependente)
        $baseIRPF = $salarioLiquido - ($DEDUCAO_DEPENDENTE * $filhos);

        // Calculando o imposto devido sobre o IRPF
        if ($baseIRPF <= $FAIXA1_LIMITE) {
            $impostoIRPF = $baseIRPF * $FAIXA1_TAXA;
        } elseif ($baseIRPF <= $FAIXA2_LIMITE) {
            $impostoIRPF = ($baseIRPF - $FAIXA1_LIMITE) * $FAIXA2_TAXA + ($FAIXA1_LIMITE * $FAIXA1_TAXA);
        } elseif ($baseIRPF <= $FAIXA3_LIMITE) {
            $impostoIRPF = ($baseIRPF - $FAIXA2_LIMITE) * $FAIXA3_TAXA + ($FAIXA2_LIMITE - $FAIXA1_LIMITE) * $FAIXA2_TAXA + ($FAIXA1_LIMITE * $FAIXA1_TAXA);
        } else {
            $impostoIRPF = ($baseIRPF - $FAIXA3_LIMITE) * $FAIXA4_TAXA + ($FAIXA3_LIMITE - $FAIXA2_LIMITE) * $FAIXA3_TAXA + ($FAIXA2_LIMITE - $FAIXA1_LIMITE) * $FAIXA2_TAXA + ($FAIXA1_LIMITE * $FAIXA1_TAXA);
        }

        // Calculando o salário líquido final após o desconto do IRPF
        $salarioLiquidoFinal = $salarioLiquido - $impostoIRPF;

       // Exibindo os resultados com fundo branco
        echo "<div style='background-color: white; padding: 10px;'>";
        echo "Desconto do INSS: R$ " . number_format($descontoINSS, 2, ',', '.') . "<br>";
        echo "Salário Líquido (após INSS): R$ " . number_format($salarioLiquido, 2, ',', '.') . "<br>";
        echo "Imposto de Renda: R$ " . number_format($impostoIRPF, 2, ',', '.') . "<br>";
        echo "Salário Líquido Final (após IRPF): R$ " . number_format($salarioLiquidoFinal, 2, ',', '.') . "<br>";
        echo '</div>';
        echo '<br><br><button onclick="window.location.href=\'calculo.html\'">Clique aqui para fazer um novo cálculo</button>';



        // echo '<a href="calculo.html">Clique aqui para fazer um novo calculo</a>';
    } else {
        echo "Erro ao cadastrar funcionário: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
</div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/mixitup.js"></script> 
<script src="assets/js/accordions.js"></script>
<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>

