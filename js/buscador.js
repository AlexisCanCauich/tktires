
getData()

document.getElementById("Scampo").addEventListener("keyup", getData)

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


