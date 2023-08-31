$("#selectOption").change(function() {
    var valor = $(this).val(); // Capturamos el valor del select
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

    

    if(texto === 'HANKOOK'){
      document.getElementById('tableHankook').style.display = 'block';
    }else if(texto != 'HANKOOK'){
      document.getElementById('tableHankook').style.display = 'none';
    }
    if(texto === 'MICHELIN') {
      document.getElementById('tableMichelin').style.display = 'block';
    }else if(texto != 'MICHELIN'){
      document.getElementById('tableMichelin').style.display = 'none';
    }
    if(texto === 'TOYO'){
        alert('Proximamente tabla TOYO')
    }
    if(texto === 'CONTI'){
        alert('Proximamente tabla CONTI')
    }

  });

  function tableHankook() {
    document.getElementById('tableHankook').style.display = 'block';
  }

  function tableHankook() {
    document.getElementById('tableMichelin').style.display = 'block';
  }

  function wd(){
    /*var ver = document.getElementById('selectOption').value;
    var valor = $(this).val(); // Capturamos el valor del select
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado

    $("#area").val(valor);
    $("#maquina").val(texto);*/

    var ver = document.getElementById('selectOption').value;
    
    var text = document.getElementById('selectOption').find('option:selected').text();

    console.log(text);



   /*var ver = document.getElementById('selectOption').value;
    
   var combo = document.getElementById('selectOption');
    var selected = combo.options[combo.selectedIndex].text;
    console.log(selected);  
    
    if(combo = String("Hankook")){
      console.log("puto");
    }*/


    /*for (var i = 0; i < combo.length; i++) {
    //  Aca haces referencia al "option" actual
    var opt = combo[i];

    // Haces lo que te de la gana aca
    console.log(opt.value);
    }*/
    
   }

  