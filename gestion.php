<?php

/*	1- si es un ingreso lo guardo en ticket.txt
 	2- si es salida leo el archivo:
 	leer del archivo todos los datos, guardarlos en un array
	si la patente existe en el archivo .
	 sobreescribo el archivo con todas las patentes
	 y su horario si la patente solicitada
	... calculo el costo de estacionamiento a 
	20$ el segundo y lo muestro.
	si la patente no existe mostrar mensaje y 
	el boton que me redirija al index  
	3- guardar todo lo facturado en facturado.txt*/
$action=$_POST["estacionar"];
$patente= $_POST["patente"];
$ahora= date("y-m-d h:y:s");
$ListadeAutos = array();//creando un array dinamico

if ($action == "ingreso")
 {
  echo "se guardo la patente $patente";
  $archivo=fopen("ticket.txt", "a");//abre archivo
  fwrite($archivo,$patente."[".$ahora."\r");
  fclose($archivo);//cierra
}
else
	{

  		$archivo=fopen("ticket.txt", "r");//
		  //fread($archivo, length);
		while (!feof($archivo)) //rrecore el archivo
	 	{
		   $renglon =fgets($archivo);//lee una linea del archivo
		   //se puede validar con echo los renglones en blando
		   $auto= explode("[", $renglon);//devuelve un array
		   $ListadeAutos []=$auto;

	 	}//cierre while
  var_dump($ListadeAutos );//muestra el array con cada patente;
  fclose($archivo);
  $esta=false;	
 foreach ($ListadeAutos as $auto) //mostrar todas las patentes
 {
   echo $auto[0]."<br>";//cero es patente , 1 fecha 
  }//cierre forearch

}//cierre if


//var_dump($_POST["estacionar"]);



?>
<br>
<br>
<a href="index.php">volver</a>