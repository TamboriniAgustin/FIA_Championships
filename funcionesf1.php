<?php
    //***** Funciones para el calculo de puntos en el campeonato *****\\
    //Funciones para calculo de puntos de pilotos en el campeonato
    function calcularPuntosPiloto($piloto, $temporada){
        try {
            require('db/conexion.php');
  
            $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
            $resultadoCarreras = $con->query($cargarCarreras);
          } catch (\Exception $e) {
            $error = $e->getMessage();
          }
        
          $puntos = 0;
          while($carreras = $resultadoCarreras->fetch_assoc()){
            $posicionesCarrera = $carreras['posiciones_pilotos'];
            $posicionesCarrera = json_decode($posicionesCarrera, true);
            if($temporada >= 2010){
              if(strpos($piloto, $posicionesCarrera[1]) != false || $piloto == $posicionesCarrera[1]) $puntos = $puntos + 25;
              if(strpos($piloto, $posicionesCarrera[2]) != false || $piloto == $posicionesCarrera[2]) $puntos = $puntos + 18;
              if(strpos($piloto, $posicionesCarrera[3]) != false || $piloto == $posicionesCarrera[3]) $puntos = $puntos + 15;
              if(strpos($piloto, $posicionesCarrera[4]) != false || $piloto == $posicionesCarrera[4]) $puntos = $puntos + 12;
              if(strpos($piloto, $posicionesCarrera[5]) != false || $piloto == $posicionesCarrera[5]) $puntos = $puntos + 10;
              if(strpos($piloto, $posicionesCarrera[6]) != false || $piloto == $posicionesCarrera[6]) $puntos = $puntos + 8;
              if(strpos($piloto, $posicionesCarrera[7]) != false || $piloto == $posicionesCarrera[7]) $puntos = $puntos + 6;
              if(strpos($piloto, $posicionesCarrera[8]) != false || $piloto == $posicionesCarrera[8]) $puntos = $puntos + 4;
              if(strpos($piloto, $posicionesCarrera[9]) != false || $piloto == $posicionesCarrera[9]) $puntos = $puntos + 2;
              if(strpos($piloto, $posicionesCarrera[10]) != false || $piloto == $posicionesCarrera[10]) $puntos = $puntos + 1;
          
            }
            else if($temporada >= 2003){
              if(strpos($piloto, $posicionesCarrera[1]) != false || $piloto == $posicionesCarrera[1]) $puntos = $puntos + 10;
              if(strpos($piloto, $posicionesCarrera[2]) != false || $piloto == $posicionesCarrera[2]) $puntos = $puntos + 8;
              if(strpos($piloto, $posicionesCarrera[3]) != false || $piloto == $posicionesCarrera[3]) $puntos = $puntos + 6;
              if(strpos($piloto, $posicionesCarrera[4]) != false || $piloto == $posicionesCarrera[4]) $puntos = $puntos + 5;
              if(strpos($piloto, $posicionesCarrera[5]) != false || $piloto == $posicionesCarrera[5]) $puntos = $puntos + 4;
              if(strpos($piloto, $posicionesCarrera[6]) != false || $piloto == $posicionesCarrera[6]) $puntos = $puntos + 3;
              if(strpos($piloto, $posicionesCarrera[7]) != false || $piloto == $posicionesCarrera[7]) $puntos = $puntos + 2;
              if(strpos($piloto, $posicionesCarrera[8]) != false || $piloto == $posicionesCarrera[8]) $puntos = $puntos + 1;
            }
            else{
              if(strpos($piloto, $posicionesCarrera[1]) != false || $piloto == $posicionesCarrera[1]) $puntos = $puntos + 10;
              if(strpos($piloto, $posicionesCarrera[2]) != false || $piloto == $posicionesCarrera[2]) $puntos = $puntos + 6;
              if(strpos($piloto, $posicionesCarrera[3]) != false || $piloto == $posicionesCarrera[3]) $puntos = $puntos + 4;
              if(strpos($piloto, $posicionesCarrera[4]) != false || $piloto == $posicionesCarrera[4]) $puntos = $puntos + 3;
              if(strpos($piloto, $posicionesCarrera[5]) != false || $piloto == $posicionesCarrera[5]) $puntos = $puntos + 2;
              if(strpos($piloto, $posicionesCarrera[6]) != false || $piloto == $posicionesCarrera[6]) $puntos = $puntos + 1;
            }
          }
          return $puntos;
    }
    function cantidadVueltasRapidasPiloto($piloto, $temporada){
        try {
            require('db/conexion.php');
            $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
            $resultadoCarreras = $con->query($cargarCarreras);
          } catch (\Exception $e) {
            $error = $e->getMessage();
          }
        
          $vueltasRapidas = 0;
          while($carreras = $resultadoCarreras->fetch_assoc()){
            $vueltaRapidaCarrera = $carreras['vuelta_rapida'];
            if(strpos($piloto, $vueltaRapidaCarrera) != false || $piloto == $vueltaRapidaCarrera) $vueltasRapidas++;
          }
          return $vueltasRapidas;
    }
    function cantidadVictoriasPiloto($piloto, $temporada){
        try {
            require('db/conexion.php');
            $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
            $resultadoCarreras = $con->query($cargarCarreras);
          } catch (\Exception $e) {
            $error = $e->getMessage();
          }
        
          $victorias = 0;
          while($carreras = $resultadoCarreras->fetch_assoc()){
            $posicionesCarrera = $carreras['posiciones_pilotos'];
            $posicionesCarrera = json_decode($posicionesCarrera, true);
            if(strpos($piloto, $posicionesCarrera[1]) != false || $piloto == $posicionesCarrera[1]) $victorias++;
          }
          return $victorias;
    }
    function cantidadPolesPiloto($piloto, $temporada){
        try {
            require('db/conexion.php');
            $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
            $resultadoCarreras = $con->query($cargarCarreras);
          } catch (\Exception $e) {
            $error = $e->getMessage();
          }
        
          $poles = 0;
          while($carreras = $resultadoCarreras->fetch_assoc()){
            $poleCarrera = $carreras['pole'];
            if(strpos($piloto, $poleCarrera) != false || $piloto == $poleCarrera) $poles++;
          }
          return $poles;
    }
    function cantidadAbandonosPiloto($piloto, $temporada){
        try {
            require('db/conexion.php');
            $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
            $resultadoCarreras = $con->query($cargarCarreras);
          } catch (\Exception $e) {
            $error = $e->getMessage();
          }
        
          $abandonos = 0;
          while($carreras = $resultadoCarreras->fetch_assoc()){
            $abandonosCarrera = '{ ' . str_replace(',', ' ', $carreras['abandonos']) . ' }';
            if(strpos($abandonosCarrera, $piloto) != false) $abandonos++;
          }
          return $abandonos;
    }
    //Funciones para calculo de puntos de escuderias en el campeonato
    function calcularPuntosEscuderia($escuderia, $temporada){
      try {
          require('db/conexion.php');

          $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
          $resultadoCarreras = $con->query($cargarCarreras);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
      
        $puntos = 0;
        while($carreras = $resultadoCarreras->fetch_assoc()){
          $posicionesCarrera = $carreras['posiciones_escuderias'];
          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if($temporada >= 2010){
            if(strpos($escuderia, $posicionesCarrera[1]) != false || $escuderia == $posicionesCarrera[1]) $puntos = $puntos + 25;
            if(strpos($escuderia, $posicionesCarrera[2]) != false || $escuderia == $posicionesCarrera[2]) $puntos = $puntos + 18;
            if(strpos($escuderia, $posicionesCarrera[3]) != false || $escuderia == $posicionesCarrera[3]) $puntos = $puntos + 15;
            if(strpos($escuderia, $posicionesCarrera[4]) != false || $escuderia == $posicionesCarrera[4]) $puntos = $puntos + 12;
            if(strpos($escuderia, $posicionesCarrera[5]) != false || $escuderia == $posicionesCarrera[5]) $puntos = $puntos + 10;
            if(strpos($escuderia, $posicionesCarrera[6]) != false || $escuderia == $posicionesCarrera[6]) $puntos = $puntos + 8;
            if(strpos($escuderia, $posicionesCarrera[7]) != false || $escuderia == $posicionesCarrera[7]) $puntos = $puntos + 6;
            if(strpos($escuderia, $posicionesCarrera[8]) != false || $escuderia == $posicionesCarrera[8]) $puntos = $puntos + 4;
            if(strpos($escuderia, $posicionesCarrera[9]) != false || $escuderia == $posicionesCarrera[9]) $puntos = $puntos + 2;
            if(strpos($escuderia, $posicionesCarrera[10]) != false || $escuderia == $posicionesCarrera[10]) $puntos = $puntos + 1;
          }
          else if($temporada >= 2003){
            if(strpos($escuderia, $posicionesCarrera[1]) != false || $escuderia == $posicionesCarrera[1]) $puntos = $puntos + 10;
            if(strpos($escuderia, $posicionesCarrera[2]) != false || $escuderia == $posicionesCarrera[2]) $puntos = $puntos + 8;
            if(strpos($escuderia, $posicionesCarrera[3]) != false || $escuderia == $posicionesCarrera[3]) $puntos = $puntos + 6;
            if(strpos($escuderia, $posicionesCarrera[4]) != false || $escuderia == $posicionesCarrera[4]) $puntos = $puntos + 5;
            if(strpos($escuderia, $posicionesCarrera[5]) != false || $escuderia == $posicionesCarrera[5]) $puntos = $puntos + 4;
            if(strpos($escuderia, $posicionesCarrera[6]) != false || $escuderia == $posicionesCarrera[6]) $puntos = $puntos + 3;
            if(strpos($escuderia, $posicionesCarrera[7]) != false || $escuderia == $posicionesCarrera[7]) $puntos = $puntos + 2;
            if(strpos($escuderia, $posicionesCarrera[8]) != false || $escuderia == $posicionesCarrera[8]) $puntos = $puntos + 1;
          }
          else{
            if(strpos($escuderia, $posicionesCarrera[1]) != false || $escuderia == $posicionesCarrera[1]) $puntos = $puntos + 10;
            if(strpos($escuderia, $posicionesCarrera[2]) != false || $escuderia == $posicionesCarrera[2]) $puntos = $puntos + 6;
            if(strpos($escuderia, $posicionesCarrera[3]) != false || $escuderia == $posicionesCarrera[3]) $puntos = $puntos + 4;
            if(strpos($escuderia, $posicionesCarrera[4]) != false || $escuderia == $posicionesCarrera[4]) $puntos = $puntos + 3;
            if(strpos($escuderia, $posicionesCarrera[5]) != false || $escuderia == $posicionesCarrera[5]) $puntos = $puntos + 2;
            if(strpos($escuderia, $posicionesCarrera[6]) != false || $escuderia == $posicionesCarrera[6]) $puntos = $puntos + 1;
          }
        }
        return $puntos;
    }
    function cantidadVueltasRapidasEscuderia($escuderia, $temporada){
      try {
          require('db/conexion.php');
          $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
          $resultadoCarreras = $con->query($cargarCarreras);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
      
        $vueltasRapidas = 0;
        while($carreras = $resultadoCarreras->fetch_assoc()){
          $vueltaRapidaCarrera = $carreras['vuelta_rapida_escuderia'];
          if(strpos($escuderia, $vueltaRapidaCarrera) != false || $escuderia == $vueltaRapidaCarrera) $vueltasRapidas++;
        }
        return $vueltasRapidas;
    }
    function cantidadVictoriasEscuderia($escuderia, $temporada){
      try {
          require('db/conexion.php');
          $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
          $resultadoCarreras = $con->query($cargarCarreras);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
      
        $victorias = 0;
        while($carreras = $resultadoCarreras->fetch_assoc()){
          $posicionesCarrera = $carreras['posiciones_escuderias'];
          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if(strpos($escuderia, $posicionesCarrera[1]) != false || $escuderia == $posicionesCarrera[1]) $victorias++;
        }
        return $victorias;
    }
    function cantidadPolesEscuderia($escuderia, $temporada){
      try {
          require('db/conexion.php');
          $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
          $resultadoCarreras = $con->query($cargarCarreras);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
      
        $poles = 0;
        while($carreras = $resultadoCarreras->fetch_assoc()){
          $poleCarrera = $carreras['pole_escuderia'];
          if(strpos($escuderia, $poleCarrera) != false || $escuderia == $poleCarrera) $poles++;
        }
        return $poles;
    }
    function cantidadAbandonosEscuderia($escuderia, $temporada){
      try {
          require('db/conexion.php');
          $cargarCarreras = " SELECT * FROM carreras WHERE categoria = 'f1' AND temporada = $temporada";
          $resultadoCarreras = $con->query($cargarCarreras);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
      
        $abandonos = 0;
        while($carreras = $resultadoCarreras->fetch_assoc()){
          $abandonosCarrera = '{ ' . str_replace(',', ' ', $carreras['abandonos_escuderias']) . ' }';
          if(strpos($abandonosCarrera, $escuderia) != false){
            if(substr_count($abandonosCarrera, $escuderia) == 2) $abandonos = $abandonos+2;
            else $abandonos++;
          }
        }
        return $abandonos;
    }
    //Funciones para mostrar las posiciones de carrera
    function valorCarrera($carrera){
      $contador = 0;
      for ($i=0; $i<strlen($carrera); $i++) { 
        if($carrera[$i] == '-'){
          $valorCarrera = substr($carrera, $i+2);
          $i = 1000;
        }
      }
      $valorCarrera = str_replace(' ', '', $valorCarrera);
      return $valorCarrera;
    }
    function calcularPuntos($posicion, $temporada){
      if($temporada >= 2010){
        switch ($posicion) {
          case 1: return 25;
          case 2: return 18;
          case 3: return 15;
          case 4: return 12;
          case 5: return 10;
          case 6: return 8;
          case 7: return 6;
          case 8: return 4;
          case 9: return 2;
          case 10: return 1;
          default: return 0;
        }
      }
      else if($temporada >= 2003){
        switch ($posicion) {
          case 1: return 10;
          case 2: return 8;
          case 3: return 6;
          case 4: return 5;
          case 5: return 4;
          case 6: return 3;
          case 7: return 2;
          case 8: return 1;
          default: return 0;
        }
      }
      else{
        switch ($posicion) {
          case 1: return 10;
          case 2: return 6;
          case 3: return 4;
          case 4: return 3;
          case 5: return 2;
          case 6: return 1;
          default: return 0;
        }
      }
    }
    
    //***** Funciones para calcular las estadisticas generales *****\\
    function corrioEnF1($nombre, $tipo, $listaCarreras){
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $posicionesCarrera = $carrera['posiciones_pilotos'];
          else $posicionesCarrera = $carrera['posiciones_escuderias'];

          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if(in_array($nombre, $posicionesCarrera)) return true;
        }
        return false;
    }
    function carrerasEnF1($nombre, $tipo, $listaCarreras){      
        $cantidadCarreras = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $posicionesCarrera = $carrera['posiciones_pilotos'];
          else $posicionesCarrera = $carrera['posiciones_escuderias'];

          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if(in_array($nombre, $posicionesCarrera)) $cantidadCarreras++;
        }
        return $cantidadCarreras;
    }
    function polesEnF1($nombre, $tipo, $listaCarreras){
        $poles = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $poleCarrera = $carrera['pole'];
          else $poleCarrera = $carrera['pole_escuderia'];

          if(strpos($nombre, $poleCarrera) != false || $nombre == $poleCarrera) $poles++;
        }
        return $poles;
    }
    function podiosEnF1($nombre, $tipo, $listaCarreras){ 
        $podios = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $posicionesCarrera = $carrera['posiciones_pilotos'];
          else $posicionesCarrera = $carrera['posiciones_escuderias'];

          $posicionesCarrera = json_decode($posicionesCarrera, true);

          if(strpos($nombre, $posicionesCarrera[1]) != false || $nombre == $posicionesCarrera[1]) $podios++;
          else if(strpos($nombre, $posicionesCarrera[2]) != false || $nombre == $posicionesCarrera[2]) $podios++;
          else if(strpos($nombre, $posicionesCarrera[3]) != false || $nombre == $posicionesCarrera[3]) $podios++;
        }
        return $podios;
    }
    function vueltasRapidasEnF1($nombre, $tipo, $listaCarreras){
        $vueltasRapidas = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $vueltaRapidaCarrera = $carrera['vuelta_rapida'];
          else $vueltaRapidaCarrera = $carrera['vuelta_rapida_escuderia'];

          if(strpos($nombre, $vueltaRapidaCarrera) != false || $nombre == $vueltaRapidaCarrera) $vueltasRapidas++;
        }
        return $vueltasRapidas;
    }
    function abandonosEnF1($nombre, $tipo, $listaCarreras){    
        $abandonos = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $abandonosCarrera = '{ ' . str_replace(',', ' ', $carrera['abandonos']) . ' }';
          else $abandonosCarrera = '{ ' . str_replace(',', ' ', $carrera['abandonos_escuderias']) . ' }';
          
          if(strpos($abandonosCarrera, $nombre) != false) $abandonos++;
        }
        return $abandonos;
    }
    function victoriasEnF1($nombre, $tipo, $listaCarreras){ 
        $victorias = 0;
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $posicionesCarrera = $carrera['posiciones_pilotos'];
          else $posicionesCarrera = $carrera['posiciones_escuderias'];

          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if(strpos($nombre, $posicionesCarrera[1]) != false || $nombre == $posicionesCarrera[1]) $victorias++;
        }
        return $victorias;
    }
    function mundialesDeF1($nombre, $tipo, $listaTemporadas){
        $mundiales = 0;
        foreach($listaTemporadas as $temporada){
          if($tipo == 'piloto') $campeon = $temporada['campeon_pilotos_f1'];
          else $campeon = $temporada['campeon_escuderias_f1'];

          if($nombre == $campeon) $mundiales++;
        }
        return $mundiales;
    }
    function maximaCantidadDePuntosDeF1($nombre, $tipo, $listaTemporadas){    
      $maximo = 0;
      foreach($listaTemporadas as $temporada){
        if($tipo == 'piloto') $participantesTemporada = $temporada['pilotosF1'];
        else $participantesTemporada = $temporada['escuderiasF1'];

        if(strpos($participantesTemporada, $nombre) != false){
          $puntosTemporada = 0;
          if($tipo == 'piloto'){
            if($temporada['año'] >= 2018) $puntosTemporada = calcularPuntosPiloto($nombre, $temporada['año']) + cantidadVueltasRapidasPiloto($nombre, $temporada['año']);
            else $puntosTemporada = calcularPuntosPiloto($nombre, $temporada['año']);
            
            if($puntosTemporada > $maximo) $maximo = $puntosTemporada;
          }
          else{
            if($temporada['año'] >= 2018) $puntosTemporada = calcularPuntosEscuderia($nombre, $temporada['año']) + cantidadVueltasRapidasEscuderia($nombre, $temporada['año']);
            else $puntosTemporada = calcularPuntosEscuderia($nombre, $temporada['año']);

            if($puntosTemporada > $maximo) $maximo = $puntosTemporada;
          }
        }
      }
      return $maximo;
    }
    function puntosTotalesDeF1($nombre, $tipo, $listaTemporadas){    
      $puntos = 0;
      foreach($listaTemporadas as $temporada){
        if($tipo == 'piloto') $participantesTemporada = $temporada['pilotosF1'];
        else $participantesTemporada = $temporada['escuderiasF1'];

        if(strpos($participantesTemporada, $nombre) != false){
          if($tipo == 'piloto'){
            if($temporada['año'] >= 2018) $puntosTemporada = calcularPuntosPiloto($nombre, $temporada['año']) + cantidadVueltasRapidasPiloto($nombre, $temporada['año']);
            else $puntosTemporada = calcularPuntosPiloto($nombre, $temporada['año']);

            $puntos = $puntos + $puntosTemporada;
          }
          else{
            if($temporada['año'] >= 2018) $puntosTemporada = calcularPuntosEscuderia($nombre, $temporada['año']) + cantidadVueltasRapidasEscuderia($nombre, $temporada['año']);
            else $puntosTemporada = calcularPuntosEscuderia($nombre, $temporada['año']);

            $puntos = $puntos + $puntosTemporada;
          }
        }
      }
      return $puntos;
    }
    function ultimaParticipacionEnF1($nombre, $tipo, $listaCarreras){ 
        foreach($listaCarreras as $carrera){
          if($tipo == 'piloto') $posicionesCarrera = $carrera['posiciones_pilotos'];
          else $posicionesCarrera = $carrera['posiciones_escuderias'];

          $posicionesCarrera = json_decode($posicionesCarrera, true);
          if(in_array($nombre, $posicionesCarrera)) return $carrera['temporada'];
        }
        return "Error";
    }
?>