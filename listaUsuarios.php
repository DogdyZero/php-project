<div class="center-md col-md-10 center-xs">
    <p >
        Consulta
    </p>
    
</div>
<div class="row col-md-10 start-md center-xs">
    <div class="row col-md-10 start-md center-xs">
        <form action="controle/usuarioControle.php" method="get">
            <button class="mdc-button mdc-button--raised ">
                <i class="material-icons mdc-button__icon" aria-hidden="true">add</i> 
                <span class="mdc-button__ripple"></span>Novo
            </button>    
        </form>
    </div>
    <div class="mdc-data-table m-10px">
        <table class="mdc-data-table__table" aria-label="Livros">
            <thead>
                <tr class="mdc-data-table__header-row mdc-elevation--z3">
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">ID</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Login</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Nome</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Perfil</th>
                    <th class="mdc-data-table__header-cell" role="columnheader" scope="col">Editar</th>
                </tr>
            </thead>
            <tbody class="mdc-data-table__content">
                <?php foreach($_SESSION['listaUsuarios'] as $row): ?>
                <tr class="mdc-data-table__row">
                    <td class="mdc-data-table__cell"><?php echo $row->id; ?></td>
                    <td class="mdc-data-table__cell"><?php echo $row->login; ?></td>
                    <td class="mdc-data-table__cell"><?php echo $row->nome; ?></td>
                    <td class="mdc-data-table__cell"><?php echo $row->idperfil; ?></td>
                    <td class="mdc-data-table__cell">
                        <a href="<?php echo URL.'/controle/loginControle.php?id='.$row->id; ?>">
                            <span class="material-icons">edit</span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>