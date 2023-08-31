function getTable(){
    $.ajax({
        url: '/tkfest/global/load.php',
        type: 'GET',
        success: function(response) {
            let tasks = JSON.parse(response);
            let template = '';
    
            tasks.forEach(task => {
                template += `

                    <tr taskId="${task.codigo}" class="table-light">
                        <th>${task.marca}</th>
                        <th>${task.descripcion}</th>
                        <th>${task.precio}</th>
                        <th>${task.imagen}</th>
                    </tr>

                `
            });
            console.log(template);
            $('#table_query1').html(template);

        }
    })    
}
