// récupération l'url en cours
let str = location.pathname
let url = str.split('/')
console.log(url)
// récupération de l'élément ciblé
const model = document.getElementById('model')
const errorModel = document.getElementById('errorModel')
// ajout d'une écoute d'event
model.addEventListener('blur', () => {
    // récupération la valeur de l'élément
    let modelValue = model.value
    function getXMLHttpRequest() {
        let xhr = null
        if(window.XMLHttpRequest || window.ActiveXObject) {
            if(window.ActiveXObject) {
                try {
                    xhr = new ActiveXObject('Msxml2.XMLHTTP')
                } catch (e) {
                    xhr = new ActiveXObject('Microsoft.XMLHTTP')
                }
            } else {
                xhr = new XMLHttpRequest()
            }
        } else {
            alert('Votre navigateur ne supporte pas l\'objet XMLHTTPRequest')
        }
        return xhr
    }
    // définition du chemin vers lequel la donnée sera envoyé + ajout de la valeur à envoyé en paramètre
    let path = '/' + url[1] + '/getCarByModel/' + modelValue
    // appel de la fonction XMLHTTPRequest
    let xhr = getXMLHttpRequest()
    // définition de l'envoie
    xhr.open("GET", path, true)
    // définition des headers
    xhr.setRequestHeader('Content-Type', 'application/x-www-urlencoded')
    // envoie de la donnée
    xhr.send(null)
    // vérification de l'état de la reqête
    xhr.onreadystatechange = function () {
        // si tout est ok
        if(xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            // affochage de la réponse du contrôleur
            errorModel.innerHTML = xhr.responseText
        }
    }
})