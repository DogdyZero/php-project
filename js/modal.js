function showModal(){
    let exibirModal = false;
    let mensagem='';

    for(let i of document.cookie.split(";")){
        if(i.includes('modal=sucesso')){
            exibirModal=true;
            mensagem = setMensagem('sucesso')
        } else if(i.includes('modal=erro')){
            exibirModal=true;
            mensagem = setMensagem('erro')
        } else{
            exibirModal=false;
        }
    }   
    if(exibirModal){
        var div = document.createElement('div');
        div.setAttribute('id','aviso')
        document.body.appendChild(div);
        var modal = document.querySelector('#aviso');
        if(modal.style.display!='none'){
            modal.innerHTML = createModal(mensagem);
            setCloseEvent();
        }
    } 
}
function setMensagem(param='sucesso'){
    if(param=='sucesso'){
        return `
            Transação efetuada com sucesso!
        `;
    }
    if(param=='erro'){
        return `
            Algumas das informações não foram preenchidas, favor tentar novamente!
        `;
    }
}

function createModal(mensagem){
    return `
    <div class="container">
        <div class="mdc-card padding">
            <div class="mdc-card__primary-action demo-card__primary-action " tabindex="0">
                <div class="demo-card__primary">
                    <h2 class="demo-card__title mdc-typography mdc-typography--headline6">Aviso</h2>
                </div>
                <div class="demo-card__secondary mdc-typography mdc-typography--body2">
                    ${mensagem}
                </div>
            </div>
            <div class="mdc-card__actions center-button">
                <div class="mdc-card__action-buttons">
                    <button class="mdc-button mdc-card__action mdc-card__action--button" id="close-btn"> 
                        <i class="material-icons mdc-button__icon" aria-hidden="true">done</i>  
                        <span class="mdc-button__ripple"></span>Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    `;
}


function setCloseEvent(){
    const closeBtn = document.querySelector('#close-btn');
    var modal = document.querySelector('#aviso .container');
    setTimeout(function(){ 
        modal.style.display='none'
    }, 3000);
    
    closeBtn.addEventListener('click',function(){ 
        modal.style.display='none'}
    )
}
