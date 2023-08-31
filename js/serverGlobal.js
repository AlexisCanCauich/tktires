$('#btnShow').on('click', function(e) {

    $.ajax({
        url: '/tkfest/global/load.php',
        type: 'GET',
        success: function(response) {
            let tasks = JSON.parse(response);
            let template = '';
    
            tasks.forEach(task => {
                template += `

                    <tr taskId="${task.id_tire}" class="table-light">
                        <th>${task.brand}</th>
                        <th>${task.model}</th>
                        <th>${task.price}</th>
                    </tr>

                `
            });
            console.log(template);
            $('#table-query1').html(template);

        }
    })

    e.preventDefault();
})

