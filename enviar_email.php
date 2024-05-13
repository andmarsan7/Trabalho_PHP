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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // E-mail de destino
    $para = "suporte@andmarsan.com.br";

    // Assunto do e-mail
    $assunto = "Novo contato de $nome";

    // Mensagem do e-mail
    $mensagem_email = "Nome: $nome\n";
    $mensagem_email .= "E-mail: $email\n";
    $mensagem_email .= "Mensagem:\n$mensagem";

    // Enviar e-mail
    if (mail($para, $assunto, $mensagem_email)) {
        echo '<span style="color: white; font-weight: bold;">E-mail enviado com sucesso!</span><br>';
    } else {
        echo '<span style="color: white; font-weight: bold;">Erro ao enviar o e-mail.</span><br>';
    }
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
