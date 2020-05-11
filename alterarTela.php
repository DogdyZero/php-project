<!DOCTYPE html>
<html lang="pt">
<?php session_start();
$estilos = $_SESSION['estilos'];?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/material-components-web@5.0.0/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Alterar Registro</title>
</head>
<body onload="showModal();mdc.autoInit()">
<!-- <main> -->
<div id="container">
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        
        <div class="mdc-top-app-bar--fixed-adjust col-md-12 "  >
            <div class="center-md col-md-10 center-xs">
                <p >
                    Alterar Registro
                </p>
            </div>
            <form action="controle/alterarLivroControle.php" method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['livro']->id; ?>">
                </div>
                <div class="row col-md-10 center-md center-xs">
                    <div class="col-xs-10  mdc-text-field mdc-text-field--outlined mdc-elevation--z3" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" value="<?php echo $_SESSION['livro']->titulo; ?>" name="titulo">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading "></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input " class="mdc-floating-label">Nome Livro</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-10 center-xs">
                    <div class="col-xs-10 mdc-text-field text-field mdc-text-field--textarea mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                         <textarea name="descricao" class="mdc-text-field__input"><?php echo $_SESSION['livro']->descricao; ?></textarea>
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Descrição</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-10 center-xs">
                    <div class="col-xs-10 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" name="autor" value="<?php echo $_SESSION['livro']->autor; ?>">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Autor</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-10 center-xs">
                    <div class="col-xs-10 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" name="editora" value="<?php echo $_SESSION['livro']->editora; ?>">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Editora</label>
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
                                <span id="outlined-select-label" class="mdc-floating-label">Estilo Livro</span>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        
                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                            <ul class="mdc-list combo-estilo">
                                <?php foreach($estilos as $row): ?>
                                    <?php if($row->id==$_SESSION['livro']->idestilo):?>
                                        <li class="mdc-list-item mdc-list-item--selected" data-value="<?php  echo $_SESSION['livro']->idestilo;?>" aria-selected="true"><?php echo $row->titulo; ?></li>
                                    <?php else :?>
                                    <li class="mdc-list-item" data-value="<?php echo $row->id;?>">
                                        <?php echo $row->titulo; ?>
                                    </li>
                                    <?php endif;?>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" id="opcao" name="opcao" value="">
                    <div class="col-xs-10 col-md-5 mdc-text-field mdc-text-field--outlined mdc-elevation--z3 m-10px" data-mdc-auto-init="MDCTextField">
                        <input class="mdc-text-field__input" name="paginas" value="<?php echo $_SESSION['livro']->paginas; ?>">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Páginas</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div> 
                </div>
                <div class="row col-md-10 center-xs ">
                    
                </div>
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
    const selectOpt = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
    let input = document.querySelector('#opcao');
    selectOpt.listen('MDCSelect:change', () => {
        input.setAttribute('value',selectOpt.value)
    });
</script> 
<script src="js/modal.js"></script>

</body>
</html>
