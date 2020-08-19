const formAdd = document.getElementById('formAdd');
const tblMenus = document.getElementById('tblMenus');

if(formAdd){
    const list = formAdd.dataset.list;
    fetch(list).then(res => res.json()).then(res => {
        if('ok' === res.status){
            res.list.forEach(e => {
                const option = document.createElement("option");
                option.text = e.name;
                option.value = e.id;

                document.getElementById("selTypeMenu").add(option);
            });
        }
    });

    formAdd.addEventListener('submit', e => {
        e.preventDefault();

        const data = {
            'inTxtName': document.getElementById('inTxtName').value,
            'boxTxtDescription': document.getElementById('boxTxtDescription').value,
            'selTypeMenu': document.getElementById('selTypeMenu').value
        }

        fetch(formAdd.action, {
            method: 'post',
            body: JSON.stringify(data),
            headers:{
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .then(res => {
            $('#modalOK').modal('show');
        })
    });
}

if(tblMenus){
    const list = tblMenus.dataset.list;
    fetch(list).then(res => res.json()).then(res => {
        if('ok' === res.status){
            const tbody = tblMenus.getElementsByTagName('tbody')[0];
            res.list.forEach(e => {
                const newRow = tbody.insertRow(tbody.rows.length);
                
                const newCellId = newRow.insertCell(0);
                newCellId.setAttribute('scope', 'row');
                newCellId.appendChild(document.createTextNode(e.id));

                const newCellName = newRow.insertCell(1);
                newCellName.appendChild(document.createTextNode(e.name));

                const newCellMain = newRow.insertCell(2);
                newCellMain.appendChild(document.createTextNode(null !== e.main ? e.main : 'Main'));

                const newCellDescripcion = newRow.insertCell(3);
                newCellDescripcion.appendChild(document.createTextNode(e.description));

                const newCellAccion = newRow.insertCell(4);
                const grupoBotton = document.createElement('div');
                grupoBotton.setAttribute('class', 'btn-group');
                grupoBotton.setAttribute('role', 'group');
                const buttonErase = document.createElement('a');
                buttonErase.setAttribute('class', 'btn btn-primary');
                buttonErase.setAttribute('role', 'button');
                buttonErase.setAttribute('href', `./registry/del/${e.id}`);
                buttonErase.appendChild(document.createTextNode('Eliminar'));
                buttonErase.addEventListener('click', event => {
                    event.preventDefault();

                    fetch(`./registry/del/${e.id}`).then(res => res.json()).then(res => {

                        if('ok' === res.status && 1 === res.row)
                            location.reload(); 
                    });
                });
                grupoBotton.appendChild(buttonErase);
                newCellAccion.appendChild(grupoBotton);
            });
        }
    });

}