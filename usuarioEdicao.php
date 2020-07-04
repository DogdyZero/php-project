<div class="center-md col-md-10 center-xs">
    <p >
        Alterar Dados Usuário
    </p>
</div>

<form action="controle/usuarioControle.php" method="post">
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
    <div id="selectReset"class="row col-md-10 center-xs ">
        <div id="mdc-reset"class="mdc-select mdc-select--outlined mdc-select--no-label  m-10px "  data-mdc-auto-init="MDCSelect">
            <div class="mdc-select__anchor  mdc-elevation--z3 combo-estilo col-xs-12">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text"></div>
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                    <span id="outlined-select-label" class="mdc-floating-label">Resetar Senha</span>
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
        <p>Para trocar a senha, no próximo login digite a senha 123456.</p>
    </div>

    <?php if($_SESSION['admin']==true): ?>
    <div class="row col-md-10 center-xs ">
        <div id="mdc-perfil" class=" mdc-select mdc-select--outlined mdc-select--no-label  m-10px "  data-mdc-auto-init="MDCSelect">
            <div class="mdc-select__anchor  mdc-elevation--z3 combo-estilo col-xs-12">
                <i class="mdc-select__dropdown-icon"></i>
                <div class="mdc-select__selected-text"></div>
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                    <span id="outlined-select-label" class="mdc-floating-label">Perfil</span>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>
            <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                <ul class="mdc-list combo-estilo">
                    <?php foreach($_SESSION['perfis'] as $row): ?>
                        <?php if($row->id==$_SESSION['usuario']->idperfil):?>
                            <li class="mdc-list-item mdc-list-item--selected" data-value="<?php  echo $_SESSION['usuario']->idperfil;?>" aria-selected="true"><?php echo $row->titulo; ?></li>
                        <?php else :?>
                        <li class="mdc-list-item" data-value="<?php echo $row->id;?>">
                            <?php echo $row->titulo; ?>
                        </li>
                        <?php endif;?>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <input type="hidden" id="perfil" name="perfil" value="">
    </div>
    <?php endif; ?>

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
        <?php if($_SESSION['usuario']!=null): ?>
            <button type="submit" name="form" value="alterar" class="mdc-button mdc-button--raised  mdc-elevation--z5 m-10px">
                <i class="material-icons mdc-button__icon" aria-hidden="true">done</i> 
                <span class="mdc-button__ripple"></span>Enviar
            </button>
        <?php endif; ?>
        
        <?php if($_SESSION['usuario']==null): ?>
            <button type="submit" name="form" value="novo" class="mdc-button mdc-button--raised  mdc-elevation--z5 m-10px">
                <i class="material-icons mdc-button__icon" aria-hidden="true">done</i> 
                <span class="mdc-button__ripple"></span>Enviar
            </button>
        <?php endif; ?>

    </div>
</form>