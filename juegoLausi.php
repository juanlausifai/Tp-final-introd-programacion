<?php
/******************************************
*Completar:
* NOMBRE Y APELLIDOS - LEGAJOS
* JUAN PABLO LAUSI - FAEA-563
* DIEGO MONTENEGRO - FAI 2645
* GOMEZ HECTOR RAMON - 81039 
******************************************/


/**
* genera un arreglo de palabras para jugar
* @return array $coleccionPalabras
*/
function cargarPalabras(){
  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 7);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra"=> "leopardo" , "pista" => "felino que vive en la selva", "puntosPalabra"=> 8);
  $coleccionPalabras[4]= array("palabra"=> "ajedrez" , "pista" => "juego de mesa", "puntosPalabra"=> 5);
  $coleccionPalabras[5]= array("palabra"=> "voleibol" , "pista" => "deporte en equipo", "puntosPalabra"=> 7);
  $coleccionPalabras[6]= array("palabra"=> "cucharon" , "pista" => "elemento de cocina", "puntosPalabra"=> 10);
  
  return $coleccionPalabras;
}

/**
* genera un arreglo de juegos realizados
* @return array  $coleccionJuegos
*/
function cargarJuegos(){
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 8, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos"=> 10, "indicePalabra" => 6);
    $coleccionJuegos[5] = array("puntos"=> 5, "indicePalabra" => 4);
    $coleccionJuegos[6] = array("puntos"=> 0, "indicePalabra" => 5);
        
    return $coleccionJuegos;
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array $coleccionLetras
*/
function dividirPalabraEnLetras($palabra){
       
    $coleccionLetras = array();
    
    for ($i=0; $i <strlen($palabra) ; $i++) { 
        
        $coleccionLetras[$i] = array("letra"=> $palabra[$i], "descubierta" => false);

    }

    return $coleccionLetras;
        
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int $opcion
*/
function seleccionarOpcion(){
    
   $opcion = 0; 
   $opcionValida = false;

   echo "--------------------------------------------------------------\n";
   echo "\n ( 1 ) Jugar con una palabra aleatoria";
   echo "\n ( 2 ) Jugar con una palabra elegida"; 
   echo "\n ( 3 ) Agregar una palabra al listado";
   echo "\n ( 4 ) Mostrar la informacion completa de un numero de juego";
   echo "\n ( 5 ) Mostrar la informacion completa del primer juego con mas puntaje";
   echo "\n ( 6 ) Mostrar la informacion completa del primer juego que supere un puntaje indicado por el usuario";
   echo "\n ( 7 ) Mostrar la lista de palabras ordenadas por orden alfabetico";
   echo "\n ( 8 ) Salir";
   
   /*>>> Completar el menu <<<*/
   
   /*>>> Además controlar que la opción elegida es válida. Puede que el usuario se equivoque al elegir una opción <<<*/
   
   echo "\n--------------------------------------------------------------\n";  

   while ($opcionValida == false) {
      
    echo "Indique una opcion valida: ";
    $opcion = trim(fgets(STDIN));

    $opcionValida = $opcion == '1' || $opcion == '2' || $opcion == '3' || $opcion == '4' || $opcion == '5' || $opcion == '6' || $opcion == '7' || $opcion == '8';

   }
     
    return $opcion;
}

/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean $existe
*/
function existePalabra($coleccionPalabras,$palabra){
    $i=0;
    $cantPal = count($coleccionPalabras);
    $existe = false;
    
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }
    
    return $existe;
}


/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean $existe
*/
function existeLetra($coleccionLetras, $letra){
        
    $i=0;
    $cantPal = count($coleccionLetras);
    $existe = false;
    while($i<$cantPal && !$existe){
        $existe = $coleccionLetras[$i]["letra"] == $letra;
        $i++;
    }
    
    return $existe;

}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/

function insertarPalabra($coleccionPalabras){
    /**
     * boolean $existe
     * string $palabra, $pista
     * integer $puntosPalabra, $posicionGuardar
     */

    $existe = true;
    
    while ($existe == true) {
        
        echo "Ingrese una palabra: "."\n";
        $palabra = strtolower(trim(fgets(STDIN)));
    
        $existe = existePalabra($coleccionPalabras,$palabra);
        
        if ($existe) {
            
            echo "La palabra ya existe"."\n";
        }

    }
                 
    echo "Ingrese una pista: ";
    $pista = trim(fgets(STDIN));
    echo "Ingrese los puntos: ";
    $puntosPalabra= trim(fgets(STDIN));

    $posicionGuardar = count($coleccionPalabras);
    
    $coleccionPalabras[$posicionGuardar]= array("palabra"=> $palabra, "pista" => $pista , "puntosPalabra"=> $puntosPalabra);

    return $coleccionPalabras;       

}


/**
* Obtener indice aleatorio
* @param integer $min, $max
* @return integer $i 
*/
function indiceAleatorioEntre($min,$max){
    $i = rand($min,$max); // /*Genera un número entero aleatorio entre $min y $max*/
    return $i;
}

/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int $i
*/
function solicitarIndiceEntre($min,$max){ 
    do{
        echo "Seleccione un valor entre $min y $max: ";
        $i = trim(fgets(STDIN));
    }while(!($i>=$min && $i<=$max && is_numeric($i)));
    
    return $i;
}



/**
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean $seDescubrio
*/
function palabraDescubierta($coleccionLetras){
   
    $seDescubrio = true;
    
    foreach ($coleccionLetras as $key => $value) {
        
        if( $value["descubierta"] == false){
            $seDescubrio = false;
            return $seDescubrio;
        }

    }

    return $seDescubrio;
}

/**Solicita una letra al usuario y valida que tenga un solo caracter
* @return string $letra
*/
function solicitarLetra(){
    /**
     * boolean $letraCorrecta
     */
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));
        if(strlen($letra)!=1){
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array $coleccionLetras (colección de letras modificada.)
*/
function destaparLetra($coleccionLetras, $letra){

    $letra = strtolower($letra);
   
    foreach ($coleccionLetras as $key => $value) {
        
        if (strtolower($value["letra"]) == $letra) {
            
            $coleccionLetras[$key] = ["letra"=> $letra , "descubierta" => true];
        }

    }
    
    return $coleccionLetras;

}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string $pal Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    $pal = "";
    
    foreach ($coleccionLetras as $key => $value) {
        
        if ($value["descubierta"] == true) {
            
            $pal=$pal.$value["letra"];
            
        }
        else{
            $pal=$pal."*"; 
        }

    }
    
    return $pal;
}


/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int $puntaje 
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal);//genera el arreglo $coleccionLetras
    //print_r($coleccionLetras);
    $puntaje = 0;
    $pista = $coleccionPalabras[$indicePalabra]["pista"];
    
    //Mostrar pista:

    echo $pista."\n";
    
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:

    $palabraFueDescubierta = false;

    while ($cantIntentos > 0 && $palabraFueDescubierta == false) {
        
        $letra = solicitarLetra();

        $existeLetra = existeLetra($coleccionLetras, $letra);

        if ($existeLetra) {
            
            $coleccionLetras = destaparLetra($coleccionLetras, $letra);

            echo "La letra ".$letra." PERTENECE a la palabra."."\n"; 
        
        }

        else{
            $cantIntentos = $cantIntentos - 1;
            echo "La letra ".$letra." NO pertenece a la palabra. Quedan ".$cantIntentos." intentos."."\n"; 
        }

        $textoDescubierto = stringLetrasDescubiertas($coleccionLetras);
            
        echo "Palabra a descubrir: ".$textoDescubierto."\n";

        echo "--------------------------------------------------"."\n";
        
        $palabraFueDescubierta = palabraDescubierta($coleccionLetras);
    }

    
    If($palabraFueDescubierta){
        //obtener puntaje: 

        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] + $cantIntentos;
        
        echo "\n¡¡¡¡¡¡GANASTE ".$puntaje." puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }
    
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $puntos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    
    echo "  palabra: ".$coleccionPalabras[$indicePalabra]["palabra"]."\n";
    echo "  pista: ".$coleccionPalabras[$indicePalabra]["pista"]."\n";
    echo "  puntosPalabra: ".$coleccionPalabras[$indicePalabra]["puntosPalabra"]."\n";
}


/**
* Muestra los datos completos de un juego
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Informacion de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}


/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/

/**
 * Retorna el indice de la partida con mayor puntaje
 * @param array $coleccionJuegos
 * @return integer $indiceMayor
 */

function indiceMayorPuntaje($coleccionJuegos)
{
    /**
     * integer $puntajeMayor
     */
    
    $puntajeMayor = 0;
        
    foreach ($coleccionJuegos as $key => $value) {
        
        if ($value["puntos"] > $puntajeMayor) {
            $puntajeMayor = $value["puntos"];
            $indiceMayor = $key;
        }

    }

    return $indiceMayor; 
}

/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/

/**
 * Retorna el primer indice de $coleccionJuegos que sus puntos superan al puntaje que ingresa por parametro
 * @param array  $coleccionJuegos
 * @param integer $puntaje
 * @return integer $indice 
 */

function indiceSuperaPuntaje($coleccionJuegos,$puntaje){
    // integer $puntajeParcial

    $indice = -1;
    $puntajeParcial = 9999999;
    
    foreach ($coleccionJuegos as $key => $value) {
        
        if ($value["puntos"] > $puntaje && $puntajeParcial > $value["puntos"] ) {
           
           $puntajeParcial = $value["puntos"];
           $indice = $key; 
          
        }

    }
    
    return $indice; 

}

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/

/**
 * Ordena la $coleccionPalabras por orden alfabetico lo muestra
 * @param array $coleccionPalabras
 */

function ordenarPalabrasAlfabeticamente($coleccionPalabras){

    //Ordena un array en orden inverso y mantiene la asociación de índices
    arsort($coleccionPalabras);

    // muestra información sobre una variable en una forma que es legible por humanos.
    print_r($coleccionPalabras);

}



/*******************************************/
/************** PROGRAMA PRINCIPAL *********/
/*******************************************/
define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.

/**
 * array $coleccionPalabras, $coleccionJuegos
 * integer $min, $max, $opcion, $indice, $puntaje, $cantJuegos, $indiceMayor
 * boolean $datoCorrecto, $esNumero 
 */

$coleccionPalabras = cargarPalabras();
$coleccionJuegos = cargarJuegos();

do{ 
    
    $min = 0;
    $max = count($coleccionPalabras)-1;
    
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //Jugar con una palabra aleatoria
        
        $indice = indiceAleatorioEntre($min,$max);
        $puntaje = jugar($coleccionPalabras, $indice, CANT_INTENTOS);
        $coleccionJuegos = agregarJuego($coleccionJuegos,$puntaje,$indice);

        break;
    case 2: //Jugar con una palabra elegida
        
        $indice = solicitarIndiceEntre($min,$max);
        $puntaje = jugar($coleccionPalabras, $indice, CANT_INTENTOS);
        $coleccionJuegos = agregarJuego($coleccionJuegos,$puntaje,$indice);
        
    break;
    case 3: //Agregar una palabra al listado

        $coleccionPalabras = insertarPalabra($coleccionPalabras);
        
        break;
    case 4: //Mostrar la información completa de un número de juego
        
        $datoCorrecto = false;
        $cantJuegos = count($coleccionJuegos)-1;

        while (!$datoCorrecto) {
            echo "Seleccione un indice entre 0 y ".$cantJuegos.": ";
            $indiceJuego = trim(fgets(STDIN));
            if($indiceJuego >= 0 && $indiceJuego <= $cantJuegos && is_numeric($indiceJuego)){
                mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego);
            }
            else{
                echo "Error!, debe seleccionar un indice entre 0 y ".$cantJuegos."\n";
            }
            $datoCorrecto = $indiceJuego >= 0 && $indiceJuego <= $cantJuegos && is_numeric($indiceJuego);
        }

        
        break;
    case 5: //Mostrar la información completa del primer juego con más puntaje
        
        $indiceMayor = indiceMayorPuntaje($coleccionJuegos);
        mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceMayor);

        break;
    case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
        
        $esNumero = false;
        
        while (!$esNumero) {
            echo "Seleccione un puntaje: ";
            $puntaje = trim(fgets(STDIN));

            $esNumero = is_numeric($puntaje);

            if ($esNumero == false) {
                echo "Error! Ingrese un numero \n";
            }
            
        }
        
        $indiceSuperaPun = indiceSuperaPuntaje($coleccionJuegos,$puntaje);
        
        if ($indiceSuperaPun != -1) {
            mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceSuperaPun);
        }
        else{
            echo "Ningun juego supera el puntaje que ingresaste"."\n";
        }
       
        break;
    case 7: //Mostrar la lista de palabras ordenada por orden alfabetico

        ordenarPalabrasAlfabeticamente($coleccionPalabras);

        break;
    }
}while($opcion != 8);

