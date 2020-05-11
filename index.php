<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body onload="mdc.autoInit()">
<div id="container">

<header id="cabecalho">
</header>
<main class="container correct">
    <div class="row center-md center-xs">
        <div class="col-md-10 col-xs-12">
            <div class="row center-md between-md center-xs middle-md">
                <div class="col-xs-12 col-md-9 ">
                    <div class="box center-xs">
                        <img  src="img/natureza.jpeg" class="mdc-elevation--z10" alt="imagem de natureza"></div>
                </div>
                <div class="col-xs-10 col-md-3 center-xs ">
                    <div class="box ">
                    <h2>Web App
                    <hr class="mdc-list-divider">
                    </h2>
                    <form action="controle/loginControle.php" method="post">
                        <div class="col-xs-12 mdc-text-field mdc-text-field--outlined mdc-elevation--z3" data-mdc-auto-init="MDCTextField">
                            <input class="focus mdc-text-field__input" name="login">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading "></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input " class="mdc-floating-label">Login</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                            <input class="mdc-text-field__input" type="password" name="senha">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input" class="mdc-floating-label">Senha</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <div class="msg-erro">
                            <?php echo '<p1 >'.$_COOKIE['resultado'].'</p1>';?>
                        </div>
                        <button class="mdc-button mdc-button--raised  mdc-elevation--z5 m-10px"  >
                            <i class="material-icons mdc-button__icon" aria-hidden="true">done</i> 
                            <span class="mdc-button__ripple"></span>Entrar
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<script src="js/header.js"></script>
<script src="js/modal.js"></script>
<script>
    document.querySelector('.focus').focus()
</script>
</body>
</html>
