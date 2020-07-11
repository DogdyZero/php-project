<?php require 'modelo/usuario.php';
        require 'modelo/perfil.php';
?>
<!DOCTYPE html>
<html lang="pt">
<?php require_once "configuracao/enviroment.php"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Consulta</title>
</head>
<body onload="mdc.autoInit();showModal()">
<!-- <main> -->
<div id="container">
<?php 
    session_start();
?>
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        <div class="mdc-top-app-bar--fixed-adjust col-md-12 "  >
        <?php 
        if($_SESSION['admin'] && $_SESSION['edicao']==false&&
        $_SESSION['usuario']->getReset()==false ):
            include 'listaUsuarios.php';
        else :
            include 'usuarioEdicao.php' ;
        endif; 
        ?>
        
        </div>
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

    if(document.getElementsByName('id')[0].value==""){
        let aviso = document.querySelector('.aviso');
        aviso.style.display="block";
        document.querySelector('#selectReset').style.display='none';
    } else{
        const selectOpt = mdc.select.MDCSelect.attachTo(document.querySelector('#mdc-reset'));
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
        
    }  
    if(document.querySelector('#mdc-perfil')){
        let inputPerfil = document.getElementsByName('perfil')[0];
        const selectPerfil = mdc.select.MDCSelect.attachTo(document.querySelector('#mdc-perfil'));
        
        selectPerfil.listen('MDCSelect:change', () => {
            // console.log(inputPerfil)
            inputPerfil.setAttribute('value',selectPerfil.value)
        });                    
    }
</script> 
<script src="js/modal.js"></script>
</body>
</html>

