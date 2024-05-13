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

            $termo_pesquisa = ""; // Inicializa a variável de pesquisa

            // Verifica se o formulário foi enviado via método GET
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["termo_pesquisa"])) {
                $termo_pesquisa = $_GET["termo_pesquisa"];
            }

            // Aqui você mantém o valor do campo de pesquisa preenchido com o termo de pesquisa atual
            ?>
            <form method="GET" action="">
                <input type="text" name="termo_pesquisa" value="<?php echo htmlspecialchars($termo_pesquisa); ?>" placeholder="Digite o termo de pesquisa">
                <button type="submit">Pesquisar</button>
            </form>

            <?php
            if (!empty($termo_pesquisa)) {
                // Prepara a consulta SQL para buscar funcionários com base no termo de pesquisa
                $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$termo_pesquisa%'";

                // Executa a consulta
                $resultado = mysqli_query($conexao, $sql);

                // Verifica se a consulta retornou resultados
                if (mysqli_num_rows($resultado) > 0) {
                echo "<h1>Resultados da pesquisa:</h1>";
                echo "<div style='background-color: white; border: 2px solid #ed563b; padding: 10px;'>";
                echo "<ul>";
               while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<li><strong style='color: black;'>Nome: </span><span style='color: #ed563b;'>" . $row["nome"] . "</span><br>";
                  echo "<span style='color: black;'>Email: </span><span style='color: #ed563b;'>" . $row["email"] . "<br>";
                  echo "<span style='color: black;'>Setor: </span><span style='color: #ed563b;'>" . $row["setor"] . "<br>";
                  echo "<span style='color: black;'>Cargo: </span><span style='color: #ed563b;'>" . $row["cargo"] . "<br>";
                  echo "<span style='color: black;'>Salário: </span><span style='color: #ed563b;'>R$ " . $row["salario"] . "</span><br>";
                  echo "<span style='color: black;'>Filhos: </span><span style='color: #ed563b;'>" . $row["filhos"] . "</li>";
    }
    echo "</ul>";
    echo "</div>";
} else {
    echo "<span style='color: #ed563b;'>Nenhum resultado encontrado para '$termo_pesquisa'.</span>"; 
}


                // Libera a memória ocupada pelos resultados
                mysqli_free_result($resultado); 
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
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
