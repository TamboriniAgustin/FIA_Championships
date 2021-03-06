<!DOCTYPE html>
<html lang="en">
  <?php include('templates/head.php') ?>
  <body>
    <?php 
      $categoria = $_GET['categoria'];
      $temporada = $_GET['temporada'];
      if($categoria == "f1") { $paginaAnterior = "temporadasf1.php?categoria=f1&temporada=" . $temporada; $colorPagina = 'danger'; }
      if($categoria == "f2") { $paginaAnterior = "temporadasf2.php?categoria=f2&temporada=" . $temporada; $colorPagina = 'primary'; }
      if($categoria == "f3") { $paginaAnterior = "temporadasf3.php?categoria=f3&temporada=" . $temporada; $colorPagina = 'secondary'; }
      if($categoria == "fe") { $paginaAnterior = "temporadasfe.php?categoria=fe&temporada=" . $temporada; $colorPagina = 'primary'; }
    ?>

    <a href="<?php echo $paginaAnterior; ?>"><h3 class="mb-2 bread" style="padding: 20px;">Volver</h3></a>

    <?php include('templates/header.php') ?>

    <!-- Establezco la cantidad de pilotos de la temporada -->
    <?php
      if($categoria == 'f1'){ 
        $temporadaCon22Pilotos =  array(
                                    2016, 2014, 2013, 2008, 2007, 2006, 2002, 2001, 2000,
                                    1999, 1998, 1997, 1996, 1957
                                  ); 
        $temporadaCon24Pilotos = array(
                                    2012, 2011, 2010, 1968, 1966, 1960, 1955
                                  );
        $temporadaCon26Pilotos = array(
                                    1995, 1993, 1986, 1967, 1964, 1963, 1951
                                  );
        $temporadaCon28Pilotos = array(
                                    1994, 1987, 1985, 1984, 1980, 1971, 1970, 1965,
                                    1956, 1950
                                  );
        $temporadaCon30Pilotos = array(
                                    1983, 1979, 1976, 1975, 1973, 1962, 1959
                                  );
        $temporadaCon32Pilotos = array(
                                    1992, 1988, 1982, 1981, 1972, 1958, 1954, 1953
                                  );
        $temporadaCon34Pilotos = array(
                                    1991, 1978, 1974, 1961
                                  );
        $temporadaCon36Pilotos = array(
                                    1990, 1977, 1952
                                  );
        $temporadaCon38Pilotos = array(
                                    
                                  );
        $temporadaCon40Pilotos = array(
                                    1989
                                  );
      }
      else if($categoria == 'f2'){
        $temporadaCon22Pilotos =  array(
                                    
                                  ); 
        $temporadaCon24Pilotos = array(
                                    
                                  );
        $temporadaCon26Pilotos = array(
                                    
                                  );
        $temporadaCon28Pilotos = array(
                                    
                                  );
        $temporadaCon30Pilotos = array(
                                    
                                  );
        $temporadaCon32Pilotos = array(
                                    
                                  );
        $temporadaCon34Pilotos = array(
                                    
                                  );
        $temporadaCon36Pilotos = array(
                                    
                                  );
        $temporadaCon38Pilotos = array(
                                    
                                  );
        $temporadaCon40Pilotos = array(
                                    
                                  );
      }
      else if($categoria == 'f3'){
        $temporadaCon22Pilotos =  array(
                                    
                                  ); 
        $temporadaCon24Pilotos = array(
                                    
                                  );
        $temporadaCon26Pilotos = array(
                                    
                                  );
        $temporadaCon28Pilotos = array(
                                    
                                  );
        $temporadaCon30Pilotos = array(
                                    2019, 2020, 2021, 2022, 2023
                                  );
        $temporadaCon32Pilotos = array(
                                    
                                  );
        $temporadaCon34Pilotos = array(
                                    
                                  );
        $temporadaCon36Pilotos = array(
                                    
                                  );
        $temporadaCon38Pilotos = array(
                                    
                                  );
        $temporadaCon40Pilotos = array(
                                    
                                  );
      }
      else if($categoria == 'fe'){
        $temporadaCon18Pilotos =  array(
                                    2016
        )                         ;
        $temporadaCon22Pilotos =  array(
                                    2019
                                  ); 
        $temporadaCon24Pilotos = array(
                                    
                                  );
        $temporadaCon26Pilotos = array(
                                    
                                  );
        $temporadaCon28Pilotos = array(
                                    
                                  );
        $temporadaCon30Pilotos = array(

                                  );
        $temporadaCon32Pilotos = array(
                                    
                                  );
        $temporadaCon34Pilotos = array(
                                    
                                  );
        $temporadaCon36Pilotos = array(
                                    
                                  );
        $temporadaCon38Pilotos = array(
                                    
                                  );
        $temporadaCon40Pilotos = array(
                                    
                                  );
      }
    ?>

    <!-- Conecto a la base de datos y cargo los pilotos y escuderias, y ademas la temporada actual -->
    <?php 
      try {
        require('db/conexion.php');

        if($categoria == "f1"){
          $cargarTemporada = " SELECT pilotosF1, escuderiasF1 FROM temporadas WHERE año = $temporada";
          $resultadoTemporada = $con->query($cargarTemporada);

          $temporadaActual = $resultadoTemporada->fetch_assoc();
          $pilotosActuales = $temporadaActual['pilotosF1'];
          $escuderiasActuales = $temporadaActual['escuderiasF1'];  
        }
        else if($categoria == "f2"){
          $cargarTemporada = " SELECT pilotosF2, escuderiasF2 FROM temporadas WHERE año = $temporada";
          $resultadoTemporada = $con->query($cargarTemporada);
            
          $temporadaActual = $resultadoTemporada->fetch_assoc();
          $pilotosActuales = $temporadaActual['pilotosF2'];
          $escuderiasActuales = $temporadaActual['escuderiasF2'];  
        }
        else if($categoria == "f3"){
          $cargarTemporada = " SELECT pilotosF3, escuderiasF3 FROM temporadas WHERE año = $temporada";
          $resultadoTemporada = $con->query($cargarTemporada);
            
          $temporadaActual = $resultadoTemporada->fetch_assoc();
          $pilotosActuales = $temporadaActual['pilotosF3'];
          $escuderiasActuales = $temporadaActual['escuderiasF3'];  
        }
        else if($categoria == "fe"){
          $cargarTemporada = " SELECT pilotosFE, escuderiasFE FROM temporadas WHERE año = $temporada";
          $resultadoTemporada = $con->query($cargarTemporada);
            
          $temporadaActual = $resultadoTemporada->fetch_assoc();
          $pilotosActuales = $temporadaActual['pilotosFE'];
          $escuderiasActuales = $temporadaActual['escuderiasFE'];  
        }

        $cargarPilotos = ' SELECT * FROM pilotos ORDER BY apellido ASC';
        $resultadoPilotos = $con->query($cargarPilotos);

        $cargarEscuderias = ' SELECT * FROM escuderias ORDER BY nombre ASC';
        $resultadoEscuderias = $con->query($cargarEscuderias);

        $cargarPistas = ' SELECT * FROM pistas ORDER BY pais, ciudad';
        $resultadoPistas = $con->query($cargarPistas);
      } catch (\Exception $e) {
        $error = $e->getMessage();
      }
    ?>

    <div class="container" style="margin-top: 50px;">
        <!-- Agregar una escuderia -->
        <form id="agregar_escuderia" action="#">
            <div class="form-group row">
              <label class="col-4 col-form-label" for="nuevo_piloto">Añadir Escuderia</label> 
              <div class="col-8">
                <select id="nueva_escuderia" name="nueva_escuderia" class="selectpicker" required="required" data-live-search="true" title="Seleccione una escuderia...">
                  <?php
                    while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                      $idEscuderia = $escuderias['id'];
                      $nombreEscuderia = $escuderias['nombre'];
                      if(strpos($escuderiasActuales, $nombreEscuderia) == false){
                  ?>
                        <option value="<?php echo $nombreEscuderia ?>" class="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                  <?php 
                      }
                    }
                  ?>
                </select>
              </div>
            </div> 
            <div class="form-group row">
              <div class="offset-4 col-8 text-center">
                <input type="hidden" id="escuderias_categoria" value="<?php echo $categoria ?>">
                <input type="hidden" id="escuderias_temporada" value="<?php echo $temporada ?>">
                <input type="hidden" id="escuderias_actuales" value="<?php echo $escuderiasActuales ?>">
                <button name="submit" type="submit" class="btn btn-<?php echo $colorPagina; ?>">Añadir</button>
              </div>
            </div>
        </form>

        <!-- Agregar un piloto -->
        <form id="agregar_piloto" action="#">
            <div class="form-group row">
              <label class="col-4 col-form-label" for="nuevo_piloto">Añadir Piloto</label> 
              <div class="col-8">
                <select id="nuevo_piloto" name="nuevo_piloto" class="selectpicker" required="required" data-live-search="true" title="Seleccione un piloto...">
                  <?php
                    while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                      $idPiloto = $pilotos['id'];
                      $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                      if(strpos($pilotosActuales, $nombrePiloto) == false){
                  ?>
                        <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                  <?php 
                      }
                    }
                  ?>
                </select>
              </div>
            </div> 
            <div class="form-group row">
              <div class="offset-4 col-8 text-center">
                <input type="hidden" id="pilotos_categoria" value="<?php echo $categoria ?>">
                <input type="hidden" id="pilotos_temporada" value="<?php echo $temporada ?>">
                <input type="hidden" id="pilotos_actuales" value="<?php echo $pilotosActuales ?>">
                <button name="submit" type="submit" class="btn btn-<?php echo $colorPagina; ?>">Añadir</button>
              </div>
            </div>
        </form>

        <!-- Agregar una carrera -->
        <form id="agregar_carrera" action="#">
            <h3 style="margin-top:50px;" class="text-center mb-2 bread">Añadir una carrera</h3>
            <div class="form-group row">
              <label for="carrera" class="col-4 col-form-label">Seleccione la carrera</label> 
              <div class="col-8" style="margin-bottom: 50px;">
                <select id="carrera" name="carrera" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona una Carrera --</option>
                  <?php
                    while ($pistas = $resultadoPistas->fetch_assoc()) {
                      $nombrePista = $pistas['pais'] . ' - ' . $pistas['ciudad'];
                  ?>
                        <option value="<?php echo $nombrePista; ?>"><?php echo $nombrePista; ?></option>
                  <?php 
                    }
                  ?>
                </select>
                <div class="text-center">
                    <div class="form-check form-check-inline">
                  <input class="form-check-input" name="tipo-carrera" type="radio" value="Feature" <?php if($categoria == 'f1' || $categoria == 'fe'){ ?>checked<?php } ?>>
                      <label class="form-check-label">Feature Race</label>
                    </div>
                    <div class="form-check form-check-inline">
                  <input class="form-check-input" name="tipo-carrera" type="radio" value="Sprint" <?php if($categoria == 'f1' || $categoria == 'fe'){ ?>disabled<?php } ?>>
                      <label class="form-check-label">Sprint Race</label>
                    </div>
                </div>
              </div>

              <?php
                if(in_array($temporada, $temporadaCon18Pilotos)) $cantidadPilotos = 18;
                else if(in_array($temporada, $temporadaCon22Pilotos)) $cantidadPilotos = 22;
                else if(in_array($temporada, $temporadaCon24Pilotos)) $cantidadPilotos = 24;
                else if(in_array($temporada, $temporadaCon26Pilotos)) $cantidadPilotos = 26;
                else if(in_array($temporada, $temporadaCon28Pilotos)) $cantidadPilotos = 28;
                else if(in_array($temporada, $temporadaCon30Pilotos)) $cantidadPilotos = 30;
                else if(in_array($temporada, $temporadaCon32Pilotos)) $cantidadPilotos = 32;
                else if(in_array($temporada, $temporadaCon34Pilotos)) $cantidadPilotos = 34;
                else if(in_array($temporada, $temporadaCon36Pilotos)) $cantidadPilotos = 36;
                else if(in_array($temporada, $temporadaCon38Pilotos)) $cantidadPilotos = 38;
                else if(in_array($temporada, $temporadaCon40Pilotos)) $cantidadPilotos = 40;
                else $cantidadPilotos = 20;

                for ($i=1; $i <= $cantidadPilotos; $i++){ 
              ?>
                <label for="posicion<?php echo $i?>-Piloto" class="col-4 col-form-label">Posicion <?php echo $i?></label> 
                <div class="col-8 d-flex justify-content-between">
                  <select id="posicion<?php echo $i?>-Piloto" class="custom-select">
                    <option selected disabled>-- Selecciona un Piloto --</option>
                    <?php
                      $resultadoPilotos = $con->query($cargarPilotos);
                      while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                        $idPiloto = $pilotos['id'];
                        $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                        if(strpos($pilotosActuales, $nombrePiloto . ',') != false || strpos($pilotosActuales, $nombrePiloto . '}') != false){
                    ?>
                          <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                        }
                      }
                      $resultadoPilotos = $con->query($cargarPilotos);
                    ?>
                  </select>

                  <select id="posicion<?php echo $i?>-Escuderia" class="custom-select">
                    <option selected disabled>-- Selecciona una Escuderia --</option>
                    <?php
                      $resultadoEscuderias = $con->query($cargarEscuderias);
                      while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                        $idEscuderia = $escuderias['id'];
                        $nombreEscuderia = $escuderias['nombre'];
                        if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                          <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                        }
                      }
                      $resultadoEscuderias = $con->query($cargarEscuderias);
                    ?>
                  </select>
                </div>
              <?php 
                }
              ?>

              <label class="col-4 col-form-label" for="abandonos" style="margin-top: 50px;">Abandonos</label> 
              <div class="col-8" style="margin-top: 50px;">
                <div class="d-flex justify-content-between">
                  <select id="abandonos" name="abandonos" class="selectpicker" multiple data-live-search="true" title="Seleccione los pilotos que abandonaron...">
                    <option value="Nadie">Sin abandonos</option>
                    <option disabled>-------------------------------------------------------------------------------------</option>
                    <?php
                        $resultadoPilotos = $con->query($cargarPilotos);
                        while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                          $idPiloto = $pilotos['id'];
                          $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                          if(strpos($pilotosActuales, $nombrePiloto . ',') != false || strpos($pilotosActuales, $nombrePiloto . '}') != false){
                    ?>
                            <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                          }
                        }
                    ?>
                  </select>
                  <select id="abandonosEscuderia" name="abandonosEscuderia" class="selectpicker" multiple data-live-search="true" title="Seleccione las escuderias que abandonaron...">
                    <option value="Nadie">Sin abandonos</option>
                    <option disabled>-------------------------------------------------------------------------------------</option>
                    <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                    <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                    <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                  </select>
                </div>
              </div>

              <label for="pole" class="col-4 col-form-label" style="margin-top: 50px;">Pole</label> 
              <div class="col-8" style="margin-top: 50px;">
                <select id="pole" name="pole" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona un Piloto --</option>
                  <?php
                        $resultadoPilotos = $con->query($cargarPilotos);
                        while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                          $idPiloto = $pilotos['id'];
                          $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                          if(strpos($pilotosActuales, $nombrePiloto . ',') != false || strpos($pilotosActuales, $nombrePiloto . '}') != false){
                    ?>
                            <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
                <select id="poleEscuderia" name="poleEscuderia" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona una Escuderia --</option>
                  <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
              </div>

              <label for="vuelta_rapida" class="col-4 col-form-label">Vuelta Rápida</label> 
              <div class="col-8">
                <select id="vuelta_rapida" name="vuelta_rapida" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona un Piloto --</option>
                  <option value="Nadie">Nadie</option>
                  <?php
                        $resultadoPilotos = $con->query($cargarPilotos);
                        while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                          $idPiloto = $pilotos['id'];
                          $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                          if(strpos($pilotosActuales, $nombrePiloto . ',') != false || strpos($pilotosActuales, $nombrePiloto . '}') != false){
                    ?>
                            <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
                <select id="vuelta_rapida_escuderia" name="vuelta_rapida_escuderia" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona una Escuderia --</option>
                  <option value="Nadie">Nadie</option>
                  <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
              </div>

              <label for="piloto_del_dia" class="col-4 col-form-label">Piloto del Día</label> 
              <div class="col-8">
                <select id="piloto_del_dia" name="piloto_del_dia" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona un Piloto --</option>
                  <?php
                        $resultadoPilotos = $con->query($cargarPilotos);
                        while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                          $idPiloto = $pilotos['id'];
                          $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                          if(strpos($pilotosActuales, $nombrePiloto . ',') != false || strpos($pilotosActuales, $nombrePiloto . '}') != false){
                    ?>
                            <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="text-center offset-4 col-8">
                <input type="hidden" id="temporada-carrera" value="<?php echo $_GET['temporada'] ?>">
                <input type="hidden" id="categoria-carrera" value="<?php echo $_GET['categoria'] ?>">
                <button name="submit" type="submit" class="btn btn-<?php echo $colorPagina; ?>">Añadir</button>
              </div>
            </div>
        </form>

        <!-- Agregar un campeon -->
        <form id="agregar_campeones" action="#">
            <h3 style="margin-top:50px;" class="text-center mb-2 bread">Añadir Campeones</h3>
            <div class="form-group row">
              <label for="campeonPilotos" class="col-4 col-form-label" style="margin-top: 50px;">Campeon de Pilotos</label> 
              <div class="col-8" style="margin-top: 50px;">
                <select id="campeonPilotos" name="campeonPilotos" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona un Piloto --</option>
                  <?php
                        $resultadoPilotos = $con->query($cargarPilotos);
                        while ($pilotos = $resultadoPilotos->fetch_assoc()) {
                          $idPiloto = $pilotos['id'];
                          $nombrePiloto = $pilotos['nombre'] . ' ' . $pilotos['apellido'];
                          if(strpos($pilotosActuales, $nombrePiloto) != false){
                    ?>
                            <option value="<?php echo $nombrePiloto ?>"><?php echo $nombrePiloto ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
              </div>

              <label for="campeonEscuderias" class="col-4 col-form-label">Campeon de Escuderias</label> 
              <div class="col-8">
                <select id="campeonEscuderias" name="campeonEscuderias" class="custom-select" required="required">
                  <option selected disabled>-- Selecciona una Escuderia --</option>
                  <option value="Nadie">Nadie</option>
                  <?php
                        $resultadoEscuderias = $con->query($cargarEscuderias);
                        while ($escuderias = $resultadoEscuderias->fetch_assoc()) {
                          $idEscuderia = $escuderias['id'];
                          $nombreEscuderia = $escuderias['nombre'];
                          if(strpos($escuderiasActuales, $nombreEscuderia) != false){
                    ?>
                            <option value="<?php echo $nombreEscuderia ?>"><?php echo $nombreEscuderia ?></option>
                    <?php 
                          }
                        }
                    ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="text-center offset-4 col-8">
                <input type="hidden" id="temporada-campeon" value="<?php echo $_GET['temporada'] ?>">
                <input type="hidden" id="categoria-campeon" value="<?php echo $_GET['categoria'] ?>">
                <button name="submit" type="submit" class="btn btn-<?php echo $colorPagina; ?>">Añadir</button>
              </div>
            </div>
        </form>
    </div>

    <?php include('templates/scripts.php') ?>
  </body>
</html>