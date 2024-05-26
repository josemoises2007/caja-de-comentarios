// cors-request.js

fetch('https://tu-dominio-de-000webhost/configuracion.php', {
    method: 'GET', // o 'POST' u otros métodos permitidos por tu servidor
    headers: {
        'Content-Type': 'application/json', // Tipo de contenido que estás enviando
        // Otros encabezados si son necesarios, como tokens de autenticación
    },
    mode: 'cors', // Indica que estás realizando una solicitud CORS
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json(); // Puedes cambiar json por text, blob, etc., según el tipo de respuesta esperada
})
.then(data => {
    console.log(data); // Hacer algo con los datos recibidos
})
.catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
});
