function sacarElementoDelArray (arr, item) {
    var i = arr.indexOf( item );
    arr.splice( i, 1 );
}

function convertirJSONenARRAY(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}

function convertirARRAYenJSON(array) {
    var rv = {};
    for (var i = 0; i < array.length; ++i)
      if(array[i] != "undefined") rv[i+1] = array[i];
    return rv;
}

function agregarEscuderias(escuderiasActuales, escuderiasNuevas){
    if(escuderiasActuales=="{}"){
        var resultado = JSON.stringify(escuderiasNuevas);
        resultado = '{' + resultado + '}';
    }
    else{
        let resultadoA = escuderiasActuales;
        resultadoA = resultadoA.replace('{', '').replace('}', ', ');
        let resultadoB = escuderiasNuevas;
        let resultadoC = resultadoA.concat(resultadoB);
        var resultado = JSON.stringify("{" + resultadoC + "}");
    }
    
    return resultado.replace('"', '').replace('"', '').replace('[', '{').replace(']', '}');
}

function agregarPilotos(pilotosActuales, pilotosNuevos){
    if(pilotosActuales=="{}"){
        var resultado = JSON.stringify(pilotosNuevos);
        resultado = '{' + resultado + '}';
    }
    else{
        let resultadoA = pilotosActuales;
        resultadoA = resultadoA.replace('{', '').replace('}', ', ');
        let resultadoB = pilotosNuevos;
        let resultadoC = resultadoA.concat(resultadoB);
        var resultado = JSON.stringify("{" + resultadoC + "}");
    }
    
    return resultado.replace('"', '').replace('"', '').replace('[', '{').replace(']', '}');
}

function temporadaCon18Pilotos(temporada, categoria){
    if(categoria == 'fe' && temporada == 2016) return true;
    return false;
}

function temporadaCon22Pilotos(temporada, categoria){
    if(temporada == 2019 && categoria == 'fe') return true;

    if(temporada == 2016 && categoria == 'f1') return true;
    if(temporada == 2014 && categoria == 'f1') return true;
    if(temporada == 2013 && categoria == 'f1') return true;
    if(temporada == 2008 && categoria == 'f1') return true;
    if(temporada == 2007 && categoria == 'f1') return true;
    if(temporada == 2006 && categoria == 'f1') return true;
    if(temporada == 2002 && categoria == 'f1') return true;
    if(temporada == 2001 && categoria == 'f1') return true;
    if(temporada == 2000 && categoria == 'f1') return true;
    if(temporada == 1999 && categoria == 'f1') return true;
    if(temporada == 1998 && categoria == 'f1') return true;
    if(temporada == 1997 && categoria == 'f1') return true;
    if(temporada == 1996 && categoria == 'f1') return true;
    if(temporada == 1957 && categoria == 'f1') return true;

    return false;
}

function temporadaCon24Pilotos(temporada){
    if(temporada == 2012) return true;
    if(temporada == 2011) return true;
    if(temporada == 2010) return true;
    if(temporada == 1968) return true;
    if(temporada == 1966) return true;
    if(temporada == 1960) return true;
    if(temporada == 1955) return true;
    return false;
}

function temporadaCon26Pilotos(temporada){
    if(temporada == 1995) return true;
    if(temporada == 1993) return true;
    if(temporada == 1986) return true;
    if(temporada == 1967) return true;
    if(temporada == 1964) return true;
    if(temporada == 1963) return true;
    if(temporada == 1951) return true;
    return false;
}

function temporadaCon28Pilotos(temporada){
    if(temporada == 1994) return true;
    if(temporada == 1987) return true;
    if(temporada == 1985) return true;
    if(temporada == 1984) return true;
    if(temporada == 1980) return true;
    if(temporada == 1971) return true;
    if(temporada == 1970) return true;
    if(temporada == 1965) return true;
    if(temporada == 1956) return true;
    if(temporada == 1950) return true;
    return false;
}

function temporadaCon30Pilotos(temporada){
    if(temporada == 1983) return true;
    if(temporada == 1979) return true;
    if(temporada == 1976) return true;
    if(temporada == 1975) return true;
    if(temporada == 1973) return true;
    if(temporada == 1962) return true;
    if(temporada == 1959) return true;
    return false;
}

function temporadaCon32Pilotos(temporada){
    if(temporada == 1992) return true;
    if(temporada == 1988) return true;
    if(temporada == 1982) return true;
    if(temporada == 1981) return true;
    if(temporada == 1972) return true;
    if(temporada == 1958) return true;
    if(temporada == 1954) return true;
    if(temporada == 1953) return true;
    return false;
}

function temporadaCon34Pilotos(temporada){
    if(temporada == 1991) return true;
    if(temporada == 1978) return true;
    if(temporada == 1974) return true;
    if(temporada == 1961) return true;
    return false;
}

function temporadaCon36Pilotos(temporada){
    if(temporada == 1990) return true;
    if(temporada == 1977) return true;
    if(temporada == 1952) return true;
    return false;
}

function temporadaCon38Pilotos(temporada){
    return false;
}

function temporadaCon40Pilotos(temporada){
    if(temporada == 1989) return true;
    return false;
}

/*********************************************************/

function leerFormulario(formulario, nombreFormulario){
    if(nombreFormulario == "piloto"){
        //Tomamos los valores insertados en el formulario
        const pilotosNuevos = $("#nuevo_piloto").val();
        const pilotosActuales = $("#pilotos_actuales").val();
        
        const categoria = $("#pilotos_categoria").val();
        const temporadaActual = $("#pilotos_temporada").val();
        let pilotos = agregarPilotos(pilotosActuales, pilotosNuevos);

        //Generamos en objeto con los datos del formulario
        const datos = new FormData();
        datos.append('pilotos', pilotos);
        datos.append('categoria', categoria)
        datos.append('temporada', temporadaActual);
        datos.append('accion', 'nuevo-piloto');
        modificarBD(datos, nombreFormulario);
    }
    if(nombreFormulario == "escuderia"){
        //Tomamos los valores insertados en el formulario
        const escuderiasNuevas = $("#nueva_escuderia").val();
        const escuderiasActuales = $("#escuderias_actuales").val();
        
        const categoria = $("#escuderias_categoria").val();
        const temporadaActual = $("#escuderias_temporada").val();
        let escuderias = agregarEscuderias(escuderiasActuales, escuderiasNuevas);

        //Generamos en objeto con los datos del formulario
        const datos = new FormData();
        datos.append('escuderias', escuderias);
        datos.append('categoria', categoria)
        datos.append('temporada', temporadaActual);
        datos.append('accion', 'nueva-escuderia');
        modificarBD(datos, nombreFormulario);
    }
    if(nombreFormulario == "carrera"){
        //Tomamos los valores insertados en el formulario
        const carrera = $("#carrera").val();

        let tipo = document.getElementsByName('tipo-carrera');
        if(tipo[0].checked) tipo = tipo[0].value;
        else tipo = tipo[1].value;

        const temporada = $('#temporada-carrera').val();
        const categoria = $('#categoria-carrera').val();

        const posPilotos = new Array();
        const posEscuderias = new Array();

        if(categoria == 'f1'){
            var cantidadPilotos = 20;
            if(temporadaCon22Pilotos(temporada, 'f1')) cantidadPilotos = 22;
            if(temporadaCon24Pilotos(temporada)) cantidadPilotos = 24;
            if(temporadaCon26Pilotos(temporada)) cantidadPilotos = 26;
            if(temporadaCon28Pilotos(temporada)) cantidadPilotos = 28;
            if(temporadaCon30Pilotos(temporada)) cantidadPilotos = 30;
            if(temporadaCon32Pilotos(temporada)) cantidadPilotos = 32;
            if(temporadaCon34Pilotos(temporada)) cantidadPilotos = 34;
            if(temporadaCon36Pilotos(temporada)) cantidadPilotos = 36;
            if(temporadaCon38Pilotos(temporada)) cantidadPilotos = 38;
            if(temporadaCon40Pilotos(temporada)) cantidadPilotos = 40;
        }
        else if(categoria == 'f2'){
            var cantidadPilotos = 20;
        }
        else if(categoria == 'f3'){
            var cantidadPilotos = 30;
        }
        else if(categoria == 'fe'){
            var cantidadPilotos = 20;
            if(temporadaCon18Pilotos(temporada, 'fe')) cantidadPilotos = 18;
            if(temporadaCon22Pilotos(temporada, 'fe')) cantidadPilotos = 22;
        }

        for (let i = 1; i <= cantidadPilotos; i++) {
            let idPilotos = "#posicion" + i + "-Piloto";
            let valorPosicionActual = $(idPilotos).val();
            posPilotos.push(valorPosicionActual);

            let idEscuderias = "#posicion" + i + "-Escuderia";
            valorPosicionActual = $(idEscuderias).val();
            posEscuderias.push(valorPosicionActual);
        }
        let posicionPilotos = convertirARRAYenJSON(posPilotos);
        let posicionEscuderias = convertirARRAYenJSON(posEscuderias);

        const abandonos = $('#abandonos').val().toString();
        const abandonosEscuderia = $('#abandonosEscuderia').val().toString();

        const pole = $('#pole').val();
        const poleEscuderia = $('#poleEscuderia').val();

        const vueltaRapida = $('#vuelta_rapida').val();
        const vueltaRapidaEscuderia = $('#vuelta_rapida_escuderia').val();

        const pilotoDelDia = $('#piloto_del_dia').val();

        //Generamos en objeto con los datos del formulario
        const datos = new FormData();
        datos.append('carrera', carrera);
        datos.append('tipo', tipo)
        datos.append('posicionPilotos', JSON.stringify(posicionPilotos));
        datos.append('posicionEscuderias', JSON.stringify(posicionEscuderias));
        datos.append('abandonos', abandonos);
        datos.append('abandonos-escuderia', abandonosEscuderia);
        datos.append('pole', pole);
        datos.append('pole-escuderia', poleEscuderia);
        datos.append('vueltaRapida', vueltaRapida);
        datos.append('vueltaRapida-escuderia', vueltaRapidaEscuderia);
        datos.append('pilotoDelDia', pilotoDelDia);
        datos.append('categoria', categoria);
        datos.append('temporada', temporada);
        datos.append('accion', 'nueva-carrera');
        modificarBD(datos, nombreFormulario);
    }
    if(nombreFormulario == "campeones"){
        //Tomamos los valores insertados en el formulario
        const campeonPilotos = $('#campeonPilotos').val();
        const campeonEscuderias = $('#campeonEscuderias').val();

        const categoria = $('#categoria-campeon').val();
        const temporada = $('#temporada-campeon').val();

        //Generamos en objeto con los datos del formulario
        const datos = new FormData();
        datos.append('campeon-pilotos', campeonPilotos);
        datos.append('campeon-escuderias', campeonEscuderias);
        datos.append('categoria', categoria);
        datos.append('temporada', temporada);
        datos.append('accion', 'nuevos-campeones');
        modificarBD(datos, nombreFormulario);
    }
}

function modificarBD(datos, nombreFormulario){
    if(nombreFormulario == "piloto"){
        //Llamo a AJAX
        $.ajax({
            url: "db/temporadas.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            success: function (respuesta) {
                alert('El piloto fue añadido con éxito');
                location.reload();
            },
            error: function (respuesta) {
                alert('El piloto no pudo ser añadido');
            }
        });
    }
    if(nombreFormulario == "escuderia"){
        //Llamo a AJAX
        $.ajax({
            url: "db/temporadas.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            success: function (respuesta) {
                alert('La escuderia fue añadida con éxito');
                location.reload();
            },
            error: function (respuesta) {
                alert('La escuderia no pudo añadirse');
            }
        });
    }
    if(nombreFormulario == "carrera"){
        //Llamo a AJAX
        $.ajax({
            url: "db/temporadas.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            success: function (respuesta) {
                alert('La carrera fue creada con éxito');
            },
            error: function (respuesta) {
                alert('La carrera no pudo crearse');
            }
        });
    }
    if(nombreFormulario == "campeones"){
        //Llamo a AJAX
        $.ajax({
            url: "db/temporadas.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            success: function (respuesta) {
                alert('Los campeones fueron actualizados con exito');
            },
            error: function (respuesta) {
                alert('Los campeones no pudieron actualizarse');
            }
        });
    }
}

$(document).ready(function () {
    /* Agregar una escuderia */
    const formularioEscuderia = $('#agregar_escuderia');
    $(formularioEscuderia).on('submit', function () {
        leerFormulario(formularioEscuderia, "escuderia");
        return false;
    });
    /* Agregar un piloto */
    const formularioPiloto = $('#agregar_piloto');
    $(formularioPiloto).on('submit', function () {
        leerFormulario(formularioPiloto, "piloto");
        return false;
    });
    /* Agregar una carrera */
    const formularioCarrera = $('#agregar_carrera');
    $(formularioCarrera).on('submit', function () {
        leerFormulario(formularioCarrera, "carrera");
        return false;
    });
    /* Agregar campeones */
    const formularioCampeones = $('#agregar_campeones');
    $(formularioCampeones).on('submit', function () {
        leerFormulario(formularioCampeones, "campeones");
        return false;
    });
});