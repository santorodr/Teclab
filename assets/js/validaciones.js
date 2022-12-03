$(document).ready(function () { 
    $("#Guardar").click(function() {
        var cat= $('#categoria').val().trim();
            if(cat.length===0){
                alert ("Por favor ingrese una categoria");
            }
        });
});

$(document).ready(function () { 
    $("#GuardarProd").click(function() {
        
        var nom = $('#nombre').val().trim();
        var img = $('#imagen').val().trim();
        var desc = $('#descripcion').val().trim();
        var prc = $('#precio').val().trim();
        var cat= $('#categoria2').val().trim();
        
        var campos=[nom, img, desc, prc, cat];
        var nomCampos =["nombre", "imagen", "descripicion", "precio", "categoria"];
        var errores = [];
        
        for (var i=0; i<5;i++){
            var n = campos[i];
            var nC = nomCampos[i];
            if(n.length===0){
                errores.push("Agregar" + " " + nC + " del Producto");   
            }
        };
        
        if (errores.length > 0){
            errores.push("Santiago Rodriguez");
            alert (errores.join("\n"));
        }
    });    
});                