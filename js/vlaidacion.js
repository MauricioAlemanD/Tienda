function buscarProducto() {
    var busqueda = document.getElementById("txtBusqueda").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "buscar_producto.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText.trim();
            
            if (respuesta.includes("<table")) {
                document.getElementById("consulta-bd").innerHTML = respuesta;
                document.getElementById("alerta").innerText = "Producto encontrado.";
                document.getElementById("alerta").style.color = "green";
            } else {
                document.getElementById("consulta-bd").innerHTML = "";
                document.getElementById("alerta").innerText = "Producto no encontrado.";
                document.getElementById("alerta").style.color = "white";
            }
        }
    };
    xhr.send("txtBusqueda=" + encodeURIComponent(busqueda));
}
