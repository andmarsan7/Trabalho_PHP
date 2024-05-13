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
<!DOCTYPE html>
<html>
<head>
    <title>Sorteio de Números</title>
</head>
<body>

<h1>Sorteio de Números para a Mega-Sena!</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio de Números para a Mega-Sena!</title>
    <style>
        .resultado {
            display: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: white;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
        function calcularCusto($quantidadeNumeros) {
            // Cálculo do custo baseado na quantidade de números escolhidos
            switch ($quantidadeNumeros) {
                case 6:
                    return 5;
                case 7:
                    return 35;
                case 8:
                    return 140;
                case 9:
                    return 420;
                case 10:
                    return 1050;
                case 11:
                    return 2310;
                case 12:
                    return 4620;
                case 13:
                    return 8580;
                case 14:
                    return 15015;
                case 15:
                    return 25025;
                case 16:
                    return 40040;
                case 17:
                    return 61880;
                case 18:
                    return 92820;
                case 19:
                    return 135660;
                case 20:
                    return 193800;
                default:
                    return 0;
            }
        }

        function gerarNumeros($quantidadeNumeros) {
            $numeros = array();
            while (count($numeros) < $quantidadeNumeros) {
                $numero = rand(1, 60);
                if (!in_array($numero, $numeros)) {
                    $numeros[] = $numero;
                }
            }
            sort($numeros);
            return $numeros;
        }

        $quantidadeNumeros = isset($_POST['quantidadeNumeros']) ? $_POST['quantidadeNumeros'] : 6;

        if (isset($_POST['submit'])) {
            $numerosEscolhidos = gerarNumeros($quantidadeNumeros);
            $custo = calcularCusto($quantidadeNumeros);
            echo '<div class="resultado">';
            echo "<p>Números escolhidos: " . implode(", ", $numerosEscolhidos) . "</p>";
            echo "<p>O valor gasto será de R$ " . $custo . ",00.</p>";
            echo '</div>';
            echo '<style>.resultado {display: block;}</style>';
        }
    ?>
</body>
</html>



<form method="post" action="">
   <br> <label for="quantidadeNumeros" style="color: white;">Escolha a quantidade de números (de 6 a 20):</label><br>
    <input type="number" id="quantidadeNumeros" name="quantidadeNumeros" min="6" max="20" value="<?php echo $quantidadeNumeros; ?>"><br><br>
    <input type="submit" name="submit" value="Gerar Números">
</form>

</body>
</html>


 </form>
    <br>
</body>
</html>

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

</body>
</html>
