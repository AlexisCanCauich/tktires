//Buscador
getData()
getTable()
searchHankook()
searchTOYO()

document.getElementById("Scampo").addEventListener("keyup", getData)

document.getElementById("Scampo").addEventListener("keyup", searchHankook)

document.getElementById("Scampo").addEventListener("keyup", searchTOYO)



function getData(){

    let input = document.getElementById("Scampo").value
    let content = document.getElementById("table-query1")
    let url = "/tktires/global/load.php"
    let formData = new FormData()
    formData.append('Scampo', input)

    fetch(url, {
        method: "POST", 
        body: formData
    }).then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
}
//Fin buscador

function searchHankook(){
    let input = document.getElementById("Scampo").value
    let content = document.getElementById("table-Hankook")
    let url = "/tktires/global/selectTable.php"
    let formData = new FormData()
    formData.append('Scampo', input)

    fetch(url, {
        method: "POST", 
        body: formData
    }).then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
    
}


function searchTOYO(){
    let input = document.getElementById("Scampo").value
    let content = document.getElementById("table_MToyo")
    let url = "/tktires/global/selectTableToyo.php"
    let formData = new FormData()
    formData.append('Scampo', input)
    fetch(url, {
        method: "POST", 
        body: formData
    }).then(response => response.json())
    .then(data => {
        content.innerHTML = data
    }).catch(err => console.log(err))
    
}


function getTable(){

    $("#selectOption").change(function() {
        
        let selecd = document.getElementById("selectOption").value
    
        if(selecd === '2'){
            


            let selecd = document.getElementById("selectOption").value
            let content = document.getElementById("table-Hankook")
            let url = "/tktires/global/selectTable.php"
            let formData = new FormData()
            formData.append('selectOption', selecd)
    
            fetch(url, {
                method:"POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => console.log(err))
            
        }else if(selecd === '3'){
    
            let selecd = document.getElementById("selectOption").value
            let content = document.getElementById("table_MToyo")
            let url = "/tktires/global/selectTableToyo.php"
            let formData = new FormData()
            formData.append('selectOption', selecd)
    
            fetch(url, {
                method:"POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => console.log(err))
    
    
        }
    
        
    })
}

