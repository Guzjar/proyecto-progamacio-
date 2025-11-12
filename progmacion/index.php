<?php
// ===============================
//  PROYECTO: LAS CABRAS DE SATURNO
// ===============================
//
// Contexto: La colonia Capra Majoris, en los anillos de Saturno,
// ha sido impactada por bolas de queso ardiente procedentes del
// cinturón de Meteorquesos. Este programa ayudará a los técnicos
// a analizar los daños y calcular las pérdidas (y ganancias).
//
// Simbología del mapa ($capraMajoris):
// "0" -> terreno rocoso
// "~" -> atmósfera de metano
// "C" -> zona habitada (corrales de cabras)
//
// Los impactos se almacenan en el array $impacts
// como coordenadas [fila, columna].
//
// =========================================
// MAPA ORIGINAL DE CAPRA MAJORIS
// =========================================

$capraMajoris = [
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', 'C', 'C', 'C', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '0', '0', '0', 'C', '0', 'C', 'C', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', 'C', 'C', '0', '0', 'C', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '0', 'C', 'C', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
];

// Coordenadas [fila, columna] de los impactos de queso
$impacts = [
    [20, 4],
    [2, 13],
    [13, 12],
    [3, 17],
    [2, 13],
    [5, 19],
    [6, 18],
    [5, 2],
    [20, 13],
    [9, 7],
    [5, 9],
    [15, 16],
    [16, 13],
    [16, 9],
    [16, 0],
    [3, 19],
    [19, 8],
    [1, 16],
    [18, 4],
    [21, 23],
    [7, 17],
    [22, 15],
    [21, 6],
    [14, 8],
    [12, 23],
    [7, 7],
    [22, 4],
    [3, 21],
    [2, 3],
    [8, 11],
    [0, 4],
    [7, 21],
    [11, 4],
    [7, 15],
    [6, 17],
    [5, 19],
    [4, 19],
    [4, 7],
    [23, 21],
    [15, 20],
    [2, 9],
    [21, 2],
    [1, 13],
    [7, 10],
    [21, 5],
    [13, 17],
    [2, 14],
    [11, 14],
    [22, 17],
    [18, 22],
    [2, 23],
    [3, 1],
    [18, 6],
    [17, 12],
    [18, 18],
    [20, 2],
    [3, 14],
    [11, 21],
    [6, 5],
    [6, 2],
    [12, 23],
    [18, 18],
    [21, 6],
    [10, 12],
    [5, 4],
    [16, 19],
    [8, 10],
    [12, 21],
    [15, 1],
    [20, 14],
    [3, 20],
    [6, 19],
    [20, 13],
    [15, 4],
    [10, 2],
    [5, 16],
    [20, 1],
    [12, 13],
    [11, 5],
    [12, 14],
    [8, 3],
    [6, 8],
    [19, 7],
    [16, 9],
    [13, 20],
    [3, 5],
    [1, 0],
    [20, 14],
    [12, 21],
    [12, 16],
    [15, 7],
    [9, 1],
    [1, 18],
    [20, 6],
    [8, 6],
    [22, 1],
    [10, 22],
    [19, 19],
    [7, 16],
    [8, 8]
];


// =========================================
// ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES
// =========================================


// =========================================
function mostrarMapa($mapa) {
    foreach ($mapa as $fila) {
        foreach ($fila as $celda) {

            echo $celda;
        }

        echo "<br>";
    }
}

function quesificando($mapa, $impactos) {
    foreach ($impactos as $impacto) {

        $fila = $impacto[0];
        $columna = $impacto[1];

        if ($mapa[$fila][$columna] == "C") {

            $mapa[$fila][$columna] = "Q";

        }
    }
    return $mapa;
}

function afectados($mapa) {
    $contador = 0;
    foreach ($mapa as $fila) {
        foreach ($fila as $celda) {

            if ($celda =="Q") {

                $contador++;
            }
        }
    }
    return $contador;
}
function danosTotales($mapa,$impactos){

    foreach ($impactos as $impacto) {
        $fila=$impacto[0];
        $columna=$impacto[1];
        if ($mapa[$fila][$columna]== "Q") {

                $mapa[$fila][$columna]="Q";

        }elseif ($mapa[$fila][$columna]== "~") {

                $mapa[$fila][$columna]= "S";

        }elseif ($mapa[$fila][$columna]== "0") {

               $mapa[$fila][$columna]="X";
        }
                
        }
        
        return $mapa;
    }
function estimacionesCoste($mapa){
    $costeRocoso=0;
    foreach ($mapa as $fila) {
        foreach ($fila as $celda) {
            if ($celda == "X"){
                 $costeRocoso++;
        }
    }
    
}
return $costeRocoso;
}
function atmosferapresente($mapa){
    $atmosferapresente=0;
    foreach ($mapa as $fila) {
        foreach ($fila as $celda) {
            if ($celda == "~"){
                 $atmosferapresente++;
        }
    }
    
}
return $atmosferapresente;
}
function atmosferaAfectada($mapa){
    $atmosferaAfectada=0;
    foreach ($mapa as $fila) {
        foreach ($fila as $celda) {
            if ($celda ==="S"){
                 $atmosferaAfectada++;
        }
    }
    
}
return $atmosferaAfectada;
}
$cabras=3000;
$desodorante=10 /1000;
$limpiarRocoso=75000;
$limpiarHabitadas=250000;
$precioPorKg = 7;
$totalDePeces=1000*1000;


$mapaQuesificado = quesificando($capraMajoris, $impacts);



$cabrasAfectadas = afectados($mapaQuesificado);



$totalCabrasAfectadas = $cabrasAfectadas * $cabras;
$litrosDesodorante = $totalCabrasAfectadas * $desodorante;



$zonasAfectadas= danosTotales($mapaQuesificado,$impacts);



$limpiar=estimacionesCoste($zonasAfectadas);
$limpiezaDeCabras=$cabrasAfectadas * $limpiarHabitadas;
$limpiarTerrenoRocoso=$limpiar * $limpiarRocoso;
$totalDeLimpieza=$limpiezaDeCabras + $limpiarTerrenoRocoso;



$presente= atmosferapresente($zonasAfectadas);
$atmAfectada = atmosferaAfectada($zonasAfectadas);
$repLosCorrales=$atmAfectada*$totalDePeces*$precioPorKg/$presente; 
$daniosNetos = $totalDeLimpieza - $repLosCorrales;


echo "Mapa original:<br>";
mostrarMapa($capraMajoris);
echo "<br>";
echo "Mapa quesificado :<br>";
mostrarMapa($mapaQuesificado);
echo "<br>";


echo "Cabras afectadas: " . $totalCabrasAfectadas . "<br>";
echo "Litros de desodorante anticheddar: " . $litrosDesodorante . " L";
echo "<br>";
echo "mapa de danos totales";
echo "<br>";
mostrarMapa($zonasAfectadas);
echo "<br>";
echo "coste total de la limpieza:".number_format($totalDeLimpieza, 0, ',', '.')."<br>";
echo "<br>";
echo " Recaudación ONG Cocineros Cósmicos: " . number_format($repLosCorrales, 0, ',', '.') . " €<br>";
echo "Daños netos estimados: " . number_format($daniosNetos, 0, ',', '.') . " €<br>";
//echo " Daños netos estimados: " . number_format($totalDeLimpieza, 0, ',', '.') . " €<br>";

// =========================================



?>