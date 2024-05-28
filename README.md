como el CORS no dejaba que yo importase los datos desde la pagina 000webhost hasta mi pagina github decidí colo un pedazo de codigo que hiciera y pudiera unir los dos <code>header("Access-Control-Allow-Origin: https://josemoises2007.github.io");
header("Access-Control-Allow-Headers: content-type, x-type");</code> en el php del 000Webhost, <code><script>
    fetch('https://jakearround.000webhostapp.com/comentarios/configuracion.php', {headers: {"x-test": "algum valor"}})
        .then(res => res.json())
        .then(res => document.getElementById('comments').textContent = res.text)
        .catch(error => document.getElementById('comments').textContent = error.message);
</script></code>en el codigo html y asi amigos es como se importa sin violar las leyes, si quieren, son libres en copiarlo.
