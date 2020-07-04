<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Relatório</title>
</head>
<body  onload="mdc.autoInit()">
<!-- <main> -->
<div id="container">
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        <div class="mdc-top-app-bar--fixed-adjust "  >
            <p style="text-align:center">
                Relatório
            </p>

            <div id="pesquisa" class="row col-md-12 col-xs-12 center-xs start-md middle-md" >
                <div id="selectMenu" class="w-100 center-xs mdc-select  mdc-select--outlined mdc-select--no-label "  data-mdc-auto-init="MDCSelect">
                    <div class="mdc-select__anchor  mdc-elevation--z3 combo-estilo ">
                        <i class="mdc-select__dropdown-icon"></i>
                        <div class="mdc-select__selected-text"></div>
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                            <span id="outlined-select-label" class="mdc-floating-label">Tipo Consulta</span>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                        <ul class="mdc-list combo-estilo">
                            <li class="mdc-list-item" data-value="usuario">Usuário</li>
                            <li class="mdc-list-item" data-value="livro">Livro</li>
                        </ul>
                    </div>
                </div>
                <form  method="post" action="controle/relatorioControle.php"  >
                <input type="hidden" name="tipo">
                    <div id="form" class="row col-xs-12 center-xs col-md-12 start-md middle-md row middle-md"></div>
                    <button id="btnEnviar" class="ml-10 col-xs-12 mdc-icon-button material-icons mdc-button mdc-button--raised  mdc-elevation--z5">search
                    </button>
                </form> 
            </div>
        </div>
    </main>
</div>
<script src="js/header.js"></script>
<script src="js/menu.js"></script>
<script>
        window.onload = function() {
            mdc.autoInit();
            if(document.querySelector('.mdc-select')){
                inicializarSelect();
            } 
        }
function inicializarSelect(){

        const selectOpt = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
        let input = document.getElementsByName('tipo')[0];
        
        selectOpt.listen('MDCSelect:change', () => {
            input.setAttribute('value',selectOpt.value)
        });
    }  
</script> 
</body>
</html>
