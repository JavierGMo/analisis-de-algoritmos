<?php
// Aumentar el límite de memoria
define('WP_MEMORY_LIMIT', '512M');
 
// Aumentar el límite de memoria en la administración
define( 'WP_MAX_MEMORY_LIMIT', '256M' );
//clase para nombre_archivo, peso, y precio

class Archivo{

	public $nombre;
	public $peso;
	public $precio;
	public $tmp_peso;

	function __construct($nombre, $peso, $precio){
		$this->nombre = $nombre;
		$this->peso = $peso;
		$this->precio = $precio;
		$this->tmp_peso = $peso;
	}

	public function get_nombre(){
		return $this->nombre;
	}

	public function get_peso(){
		$this->tmp_peso = (int)((preg_split('[G]', $this->tmp_peso))[0]);
		return $this->tmp_peso;
	}

	public function get_precio(){
		return $this->precio;
	}

	public function __destruct() {
        echo '<br> Destroying objeto DX <br>';
    }
}
//Modulos

function leer_archivo($nombre_archivo){
	$archivos_array = array();
	$archivo_leido = fopen($nombre_archivo.".txt", "r");
	if($archivo_leido!=null){
		while(!feof($archivo_leido)){
			$linea = fgets($archivo_leido);
			$temp_array = preg_split('[,]', $linea);
			//$archivos_array[] = $temp_array;
			$archivos_array[] = new Archivo($temp_array[0], $temp_array[1], $temp_array[2]);
		}
	}
	fclose($archivo_leido);

	return $archivos_array;
}
//se quitan todos los archivos mayores a 8
function limpieza_uno($archivos_array, $tam_array_archivos){
	
	$array_temporal = array();
	$i = 0;
	while($i<$tam_array_archivos){
		if($archivos_array[$i]->get_peso()<=8){
			$array_temporal[] = $archivos_array[$i];
		}
		++$i;
	}
	//var_dump($array_temporal);
	return $array_temporal;
}

function permutaciones($archivos_array, $tam_array_archivos){
	//Permutaciones de valores por peso de archivo
	$i = 0;
	$j = 0;
	$n = 0;
	$var_espera = 0;
	$ocurrencias = 0;
	$combinaciones_maximas = 3;
	$ocurencias_array = array();
	$temp_array = array();
	$b = $tam_array_archivos -1;

	//Hacer variacion sin repeticion o con repeticion
	//Numero de combinaciones
	for ($k=0; $k<$combinaciones_maximas; $k++){ 
		$n = ($n*$b) + $b;
	}
	echo "<br><br>"."combinaciones:".$n."<br>";
	for ($i=30; $i<=$n; $i++) { 
		$ocurrencias = $i;
		do {
			$var_espera = $ocurrencias%$b;
			if($var_espera == 0){
				$ocurencias_array[] = $archivos_array[$b];
				$ocurrencias = $ocurrencias/$b-1;
			}else{
				$ocurencias_array[] = $archivos_array[$var_espera];
				$ocurrencias = $ocurrencias/$b;
			}
		} while ($ocurrencias>0);
		$temp_array[] = $ocurencias_array;
		$ocurencias_array = array();
	}
	$ocurencias_array = null;
	return $temp_array;
}
//fin modulos

//Variables
$archivos_array = array();
$array_temporal = array();
$tam_array_archivos = 0;
$i = 0;
$j = 0;
$n = 0;
$var_espera = 0;
$combinaciones_maximas = 3;
$ocurencias_array = array();
$temp_array = array();
//fin variables

//Lectura del archivo
$archivos_array = leer_archivo("archivos");
$tam_array_archivos = count($archivos_array);


//Limpiar el arreglo quitando valores pesos mayores a 8
$archivos_array =  limpieza_uno($archivos_array, $tam_array_archivos);

//destruimos objetos
$array_temporal = array();

$tam_array_archivos = count($archivos_array);



$temp_array = permutaciones($archivos_array, $tam_array_archivos);




/*
loop i:
	loop j:
		if(i!=j){
			suma_pesos += archivos_array[j];
			if(suma_pesos<=8){
				temp_array[] = array(archivos_array[j]);
			}
		}else{
			temp_array[] = archivos_array[j];
			suma_pesos += archivos_array[i];
		}
*/
echo "<br>Repeticiones combinaciones<br>";
var_dump($temp_array);
// echo "<br>Archivos arrya<br>";
// print_r($archivos_array);



?>