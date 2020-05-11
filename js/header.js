var nomeAplicacao = 'Application'
var header = document.querySelector('#cabecalho');
header.innerHTML =createTemplate(nomeAplicacao);


function createTemplate(nome){
    return `
    <header class="col-xs-12 mdc-top-app-bar app-bar head-color" id="app-bar">
        <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start ">
        <span class="mdc-top-app-bar__title">${nome}</span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
        <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button">menu</button>
        </section>

        </div>
    </header>
  `
}

// const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));

// const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.getElementById('app-bar'));
// topAppBar.setScrollTarget(document.getElementById('main-content'));
// topAppBar.listen('MDCTopAppBar:nav', () => {
//   drawer.open = !drawer.open;
// });