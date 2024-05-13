<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

   <link rel="stylesheet" text="text/css" href="estilo.css"">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
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

// Inicializa a variável de pesquisa
$termo_pesquisa = "";

// Verifica se o formulário foi enviado via método GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["termo_pesquisa"])) {
    // Recupera o termo de pesquisa enviado pelo formulário
    $termo_pesquisa = $_GET["termo_pesquisa"];

    // Prepara a consulta SQL para buscar funcionários com base no termo de pesquisa
    $sql = "SELECT * FROM funcionarios WHERE nome LIKE '%$termo_pesquisa%'";

    // Executa a consulta
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        echo "<h1>Resultados para Alteração:</h1>";
        echo "<ul>";
        echo "<div style='border: 2px solid #ed563b; padding: 10px;'>";
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<li>";
            echo "<strong style='color: white;'>Nome: </span><span style='color: #ed563b;'>" . $row["nome"] . "</span><br>";
            echo "<span style='color: white;'>Email: </span><span style='color: #ed563b;'>" . $row["email"] . "<br>";
            echo "<span style='color: white;'>Setor: </span><span style='color: #ed563b;'>" . $row["setor"] . "<br>";
            echo "<span style='color: white;'>Cargo: </span><span style='color: #ed563b;'>" . $row["cargo"] . "<br>";
            echo "<span style='color: white;'>Salário: </span><span style='color: #ed563b;'>R$ " . $row["salario"] . "<br>";
            echo "<span style='color: white;'>Filhos: </span><span style='color: #ed563b;'>" . $row["filhos"] . "</li>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<input type='text' name='nome' value='" . $row["nome"] . "' placeholder='Novo nome'>";
            echo "<input type='text' name='email' value='" . $row["email"] . "' placeholder='Novo email'>";
            echo "<input type='text' name='setor' value='" . $row["setor"] . "' placeholder='Novo setor'>";
            echo "<input type='text' name='cargo' value='" . $row["cargo"] . "' placeholder='Novo cargo'>";
            echo "<input type='text' name='salario' value='" . $row["salario"] . "' placeholder='Novo salario'>";
            echo "<input type='text' name='filhos' value='" . $row["filhos"] . "' placeholder='Novo filhos'>";
            echo "<button type='submit' name='update'>Alterar</button>";
            echo "<button type='submit' name='delete'>Deletar</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<span style='color: white;'>Nenhum resultado encontrado para '$termo_pesquisa'.</span>"; 
    }

    // Libera a memória ocupada pelos resultados
    mysqli_free_result($resultado); 
}

// Verifica se o formulário foi enviado via método POST para realizar a atualização ou exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update"])) {
        // Recupera os dados do formulário para atualização
        $id = $_POST["id"];
        $novo_nome = $_POST["nome"];
        $novo_email = $_POST["email"];
        $novo_setor = $_POST["setor"];
        $novo_cargo = $_POST["cargo"];
        $novo_salario = $_POST["salario"];
        $novo_filhos = $_POST["filhos"];
        // Prepara e executa a consulta SQL para atualizar o registro
        $sql = "UPDATE funcionarios SET nome='$novo_nome', email='$novo_email', setor='$novo_setor', cargo='$novo_cargo', salario='$novo_salario', filhos='$novo_filhos' WHERE id=$id";

        if (mysqli_query($conexao, $sql)) {
            echo "<span style='color: white; font-weight: bold;'>Registro atualizado com sucesso!</span>";
        } else {
            echo "Erro ao atualizar registro: " . mysqli_error($conexao);
        }
    } elseif (isset($_POST["delete"])) {
        // Recupera o ID do registro a ser excluído
        $id = $_POST["id"];

        // Prepara e executa a consulta SQL para excluir o registro
        $sql = "DELETE FROM funcionarios WHERE id=$id";

        if (mysqli_query($conexao, $sql)) {
           echo '<span style="color: white;">Registro excluído com sucesso!</span>';
        } else {
            echo "Erro ao excluir registro: " . mysqli_error($conexao);
        }
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
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
