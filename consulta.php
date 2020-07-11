<?php require "modelo/estilo.php";
    require "modelo/livro.php";
    require_once "configuracao/enviroment.php";
    session_start();
    ?>
<!DOCTYPE html>
<html lang="pt">
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
    <div id="menu"></div>
    <div id="cabecalho"></div>
    <main class="main-content col-xs-12 col-md-9 cel" id="main-content" >
        <div class="mdc-top-app-bar--fixed-adjust col-md-12 "  >
            <div class="center-md col-md-10 center-xs">
                <p >
                    Consulta
                </p>
            </div>
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
                            <li class="mdc-list-item" data-value="titulo">Titulo</li>
                            <li class="mdc-list-item" data-value="estilo">Estilo</li>
                            <li class="mdc-list-item" data-value="autor">Autor</li>
                            <li class="mdc-list-item" data-value="editora">Editora</li>
                        </ul>
                    </div>
                </div>
                <div id="btnSelecaoMenu" class="ml-10">
                    <button id="btnSelecao" class="mdc-icon-button material-icons mdc-button mdc-button--raised  mdc-elevation--z5">add
                    </button>
                </div>
                <form  method="post" action="controle/pesquisaControle.php"  >
                    <div id="form" class="row col-xs-12 center-xs col-md-12 start-md middle-md row middle-md"></div>
                    <button id="btnEnviar" class="ml-10 col-xs-12 mdc-icon-button material-icons mdc-button mdc-button--raised  mdc-elevation--z5">search
                    </button>
                </form> 
            </div>
            <div class="mdc-chip-set" role="grid">
            </div>
                <div class="row col-md-10 start-md center-xs">
                    <div class="mdc-data-table">
                        <table class="mdc-data-table__table" aria-label="Livros">
                            <thead>
                                <tr class="mdc-data-table__header-row mdc-elevation--z3">
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">ID</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Nome Livro</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Autor</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Editora</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Páginas</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Estilo</th>
                                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody class="mdc-data-table__content">
                                <?php foreach($_SESSION['livros'] as $row): ?>
                                <tr class="mdc-data-table__row">
                                    <td class="mdc-data-table__cell"><?php echo $row->getId(); ?></td>
                                    <td class="mdc-data-table__cell"><?php echo $row->getTitulo(); ?></td>
                                    <td class="mdc-data-table__cell"><?php echo $row->getAutor(); ?></td>
                                    <td class="mdc-data-table__cell"><?php echo $row->getEditora(); ?></td>
                                    <td class="mdc-data-table__cell"><?php echo $row->getPaginas(); ?></td>
                                    <td class="mdc-data-table__cell">
                                        <?php 
                                        foreach($_SESSION['estilos'] as $estilo){
                                            if($row->getEstilo()==$estilo->getId()){
                                                echo $estilo->getTitulo();
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="mdc-data-table__cell">
                                        <a href="<?php echo URL.'/controle/prepararAlteracaoControle.php?id='.$row->getId(); ?>">
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </main>
</div>
<script src="js/header.js"></script>
<script src="js/menu.js"></script>
<script src="js/modal.js"></script>
<script src="js/pesquisaForm.js"></script>

</body>
</html>
