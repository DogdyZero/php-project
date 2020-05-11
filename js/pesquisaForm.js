const selectOpt = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
    let divPesquisa = document.querySelector('#pesquisa');
    let btnSelecaoMenu = document.querySelector('#btnSelecaoMenu')
    let selectMenu = document.querySelector('#selectMenu')
    let btnSelecao = document.querySelector('#btnSelecao');
    let btnEnviar = document.querySelector('#btnEnviar');
    let form = document.querySelector('#form');
    
    btnSelecao.addEventListener('click',function(){
        form.style.display ='flex';

        let div = document.createElement('div');
        form.append(div);
        div.setAttribute('class','escolha')
        div.setAttribute('value','')

        div.classList.add('row');
        div.classList.add('col-md-12');
        
        div.classList.add('start-md');
        div.classList.add('middle-md');
        div.classList.add('col-xs-12');

        div.classList.add('center-xs');


        div.innerHTML = template(selectOpt.value)
        mdc.autoInit()
        divPesquisa.classList.remove('row');
        divPesquisa.classList.remove('col-md-12');
        divPesquisa.classList.remove('col-xs-12');

        btnSelecaoMenu.style.display ='none'
        selectMenu.style.display ='none'
        btnEnviar.style.display= 'none';
    })
    function showOpcoes(event){
        event.preventDefault();
        var param =selectOpt.value
        var input = document.getElementsByName(param+'[]');
        form.style.display ='none';
        divPesquisa.classList.add('row');
        divPesquisa.classList.add('col-md-12');
        divPesquisa.classList.add('col-xs-12');

        btnSelecaoMenu.style.display ='flex'
        selectMenu.style.display ='flex'        
        let chip = document.querySelector('.mdc-chip-set');
        let div = document.createElement('div');
        chip.append(div);
        div.innerHTML =templateChip(param,input[(input.length)-1].value)
        btnEnviar.style.display='flex';
    }

    function template(param){
        return `

        <div class="col-xs-12 col-md-6 mdc-text-field mdc-text-field--outlined mdc-elevation--z3" data-mdc-auto-init="MDCTextField">
            <input class="mdc-text-field__input" name="${param}[]">
            <div class="mdc-notched-outline"> 
                <div class="mdc-notched-outline__leading "></div>
                <div class="mdc-notched-outline__notch">
                    <label for="text-field-hero-input " class="mdc-floating-label">${param} Livro</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 ml-6">
            <button onclick="showOpcoes(event)" class="mdc-button mdc-button--raised  mdc-elevation--z5">
                <i class="material-icons mdc-button__icon" aria-hidden="true">done</i> 
                <span class="mdc-button__ripple"></span>Enviar
            </button>
        </div>
        `
    }
    function templateChip(pesquisa,param){
        return `
             <div class="mdc-chip" role="row">
                <div class="mdc-chip__ripple"></div>
                <span role="gridcell">
                <span role="button" tabindex="0" class="mdc-chip__primary-action">
                    <span class="mdc-chip__text">${param}</span>
                </span>
                </span>
                <span role="gridcell" onclick="apagar(event)">
                    <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                </span>
            </div>
        `
    }
    function apagar(event){
        // console.log(event.target)
    }
    // const chipSet = mdc.chips.MDCChip.attachTo(document.querySelector('.mdc-chip-set'));
    // beginExit.beginExit()
    // chipSet.listen('MDCChip:removal', function(event) {
    //     console.log(event)
    //     chipSetEl.removeChild(event.detail.root);
    //   });