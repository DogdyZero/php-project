<!DOCTYPE html>
<html lang="pt">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Novo Registro</title>
</head>
<body onload="">
<div id="container">
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        
        <div class="mdc-top-app-bar--fixed-adjust col-md-12 "  >
            <div class="center-md col-md-10 center-xs">
                <p >
                    Alterar Dados Usuário
                </p>
            </div>
            <form action="controle/alterarUsuarioControle.php" method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['usuario']->id; ?>">
                </div>
                <?php if($_SESSION['usuario']->reset==false): ?>
                <div class="row col-md-10 center-md center-xs">
                    <div class="col-xs-10  mdc-text-field mdc-text-field--outlined mdc-elevation--z3" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" value="<?php echo $_SESSION['usuario']->nome; ?>" name="nome">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading "></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input " class="mdc-floating-label">Nome</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-10 center-xs">
                    <div class="col-xs-10 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" name="login" value="<?php echo $_SESSION['usuario']->login; ?>">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Login</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-10 center-xs ">
                    <div class=" mdc-select mdc-select--outlined mdc-select--no-label  m-10px "  data-mdc-auto-init="MDCSelect">
                        <div class="mdc-select__anchor  mdc-elevation--z3 combo-estilo col-xs-12">
                            <i class="mdc-select__dropdown-icon"></i>
                            <div class="mdc-select__selected-text"></div>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                <span id="outlined-select-label" class="mdc-floating-label">Resertar Senha</span>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                            <ul class="mdc-list combo-estilo">
                                <li class="mdc-list-item" data-value="">
                                    
                                </li>
                                <li class="mdc-list-item" data-value="reset">
                                    sim
                                </li>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" id="opcao" name="opcao" value="">
                </div>
                <div class="msg-erro row col-md-10 center-xs aviso">
                    <p>Para trocar a senha, no próximo login acesse com o número 123456.</p>
                </div>
                <?php endif; ?>
                <?php if($_SESSION['usuario']->reset==true): ?>
                <div class="row col-md-10 center-xs ">
                    <div class="col-xs-10 col-md-5 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input type="password" class="mdc-text-field__input" name="primeiraSenha">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Digite a Senha</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div> 
                </div>
                <div class="row col-md-10 center-xs ">
                    <div class="col-xs-10 col-md-5 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input type="password" class="mdc-text-field__input" name="repetirSenha">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Repita a Senha</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div> 
                </div>
                <div class="msg-erro row col-md-10 center-xs">
                    <?php echo '<p>'.$_COOKIE['resultado'].'</p>';?>
                </div>
                <?php endif; ?>
                <div class="row col-md-10 center-xs ">
                    <button class="mdc-button mdc-button--raised  mdc-elevation--z5 m-10px">
                        <i class="material-icons mdc-button__icon" aria-hidden="true">done</i> 
                        <span class="mdc-button__ripple"></span>Enviar
                    </button>
                </div>
            </form>
    </main>
</div>
<script src="js/header.js"></script>
<script src="js/menu.js"></script>
<script>
        window.onload = function() {
            showModal();
            mdc.autoInit();
            if(document.querySelector('.mdc-select')){
                inicializarSelect();
            }
        }
function inicializarSelect(){
    const selectOpt = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
    let input = document.querySelector('#opcao');
    let aviso = document.querySelector('.aviso');
    aviso.style.display ='none';

    selectOpt.listen('MDCSelect:change', () => {
        input.setAttribute('value',selectOpt.value)
        if(selectOpt.value=='reset'){
            aviso.style.display="block";
        } else {
            aviso.style.display="none";
        }

    });
}
</script> 
<script src="js/modal.js"></script>
</body>
</html>