console.log("Jquery funcionandp");


var elem = document.querySelectorAll(".delete");


  elem.addEventListener('click', confirmacion);

function confirmacion(e){
    if(confirm("¿Está seguro que desea eliminar este registro?")) {
        return true;
    }else {
        e.preventDefault();
    }
}