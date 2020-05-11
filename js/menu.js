var menu = document.querySelector('#menu');
let resource = window.location.href.toString().split(window.location.host)[1];
let page = resource.split('.')[0];

let busca =page.split('/')[1];
var celular = window.matchMedia("(max-width: 700px)")
var cookie = document.cookie;
var usuario = cookie.split('=')[1]
usuario ='';
menu.innerHTML =createTemplate(busca,celular.matches,usuario);
if(celular.matches)
  modalMenuCelular()

function createTemplate(tela,celular,usuario){
    let ativo = 'mdc-list-item--activated';
    let menuCelular = 'mdc-drawer--dismissible'
    return `
    <aside class="mdc-drawer ${celular?menuCelular:''}">
     <div class="mdc-drawer__header">
    <h3 class="mdc-drawer__title">Usuário: ${usuario}</h3>
    <h6 class="mdc-drawer__subtitle">application</h6>
  </div>
  <div class="mdc-drawer__content">
    <nav class="mdc-list">
      <a class="mdc-list-item ${tela=='consulta'?ativo:''}" href="consulta.php">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">find_in_page</i>
        <span class="mdc-list-item__text">Consulta</span>
      </a>
      <a class="mdc-list-item ${tela=='novo'?ativo:''}" href="novo.php">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">create_new_folder</i>
        <span class="mdc-list-item__text">Novo</span>
      </a>
      <a class="mdc-list-item ${tela=='grafico'?ativo:''}" href="grafico.php">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">trending_up</i>
        <span class="mdc-list-item__text">Gráfico</span>
      </a>
      <a class="mdc-list-item ${tela=='relatorio'?ativo:''}" href="relatorio.php">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">assignment</i>
        <span class="mdc-list-item__text">Relatório</span>
     </a>
     <hr class="mdc-list-divider">
     <a class="mdc-list-item" href="index.php" onclick="sair(usuario)">
        <i class="material-icons mdc-list-item__graphic" aria-hidden="true">keyboard_backspace</i>
        <span class="mdc-list-item__text">Sair</span>
    </a>
    </nav>
  </div>
</aside>

     `
}
function modalMenuCelular(){
  const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
  const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
  topAppBar.setScrollTarget(document.getElementById('main-content'));
  const div = document.querySelector('.main-content');
  div.addEventListener("click",function(event){
    console.log(event)
    if(drawer.open){
      drawer.open = !drawer.open;
    }
  })
  topAppBar.listen('MDCTopAppBar:nav', () => {
    drawer.open = !drawer.open;
  });
  
}
function sair(usuario){
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

     
