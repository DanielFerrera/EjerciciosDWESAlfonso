<HTML>
<HEAD> <TITLE> Funciones Cadenas Caracteres </TITLE> </HEAD>

<BODY>
<?php

echo "<h2> EJERCICIO 6 DE FUNCIONES CADENAS PARA CARACTERES</h2>";

 $cadena1="esta es una cadena de caracteres";

 $num=65;
 $caracter="A";

echo "La funcion chr convierte una letra en un numero ASCII y al revés <br/>";
echo "Funcion chr($num)=".chr($num)."<br/>";
echo "Funcion ord($caracter)=".ord($caracter)."<br/><br/>";

echo "La funcion strlen cuenta los caracteres de la cadena INCLUIDOS ESPACIOS<br/>";
echo "Funcion strlen($cadena1)=".strlen($cadena1)."<br/>";
echo "La funcion  strtolower convierte la cadena a minisculas<br/>";
echo "Funcion strtolower($cadena1)=".strtolower($cadena1)."<br/>";
echo "La funcion  strtolower convierte la cadena a mayusculas<br/>";
echo "Funcion strtoupper($cadena1)=".strtoupper($cadena1)."<br/>";
echo "La funcion  ucwords convierte la primera letra de cada palabra en Mayuscula<br/>";
echo "Funcion ucwords($cadena1)=".ucwords($cadena1)."<br/>";
echo "La funcion  ucwords convierte la primera letra de la primera palabra en Mayuscula<br/>";
echo "Funcion ucfirst($cadena1)=".ucfirst($cadena1)."<br/><br/>";

$cadena2="   esta es otra cadena de Caracteres  ";

echo "La funcion  ltrim elimina espacios en blanco de la IZQUIERDA<br/>";
echo "Funcion ltrim($cadena2)=".ltrim($cadena2)."<br/>";
echo "La funcion  ltrim elimina espacios en blanco de la DERECHA<br/>";
echo "Funcion rtrim($cadena2)=".rtrim($cadena2)."<br/>";
echo "La funcion  ltrim elimina espacios en blanco de la IZQUIERDA Y DERECHA<br/>";
echo "Funcion trim($cadena2)=".trim($cadena2)."<br/><br/>";

$cadena1="esta es una cadena de caracteres";

echo "Funcion substr($cadena1,0)=".substr($cadena1,0)."<br/>";
echo "La funcion  substr devuelve la cantidad de caracteres que le pidas<br/>";
echo "SI LE PIDES UN NUMERO POSITIVO EMPIEZA DESDE EL PRINCIPIO, SI ES NEGATIVO, DESDE EL FINAL<br/>";
echo "Funcion substr($cadena1,-5)=".substr($cadena1,-5)."<br/>";
echo "Funcion substr($cadena1,-2)=".substr($cadena1,-2)."<br/>";
echo "SE EL PUEDEN PONER DOS NUMEROS, siempre empieza por cero la primera <br/>";
echo "Funcion substr($cadena1,2,6)=".substr($cadena1,2,6)."<br/>";
echo "Funcion substr($cadena1,0,8)=".substr($cadena1,0,8)."<br/>";
echo "Funcion substr($cadena1,2,-3)=".substr($cadena1,2,-3)."<br/>";
echo "Funcion substr($cadena1,-7,5)=".substr($cadena1,-7,5)."<br/>";
echo "Funcion substr($cadena1,-7,-5)=".substr($cadena1,-7,-5)."<br/>";
echo "Funcion substr($cadena1,-5,-7)=".substr($cadena1,-5,-7)."<br/><br/>";

echo "La funcion strrev da la vuelta a la cadena <br/>";
echo "Funcion strrev($cadena1)=".strrev($cadena1)."<br/>";
echo "La funcion str_repeat repite la cadena al final de la misma <br/>";
echo "Funcion str_repeat($cadena1,3)=".str_repeat($cadena1,2)."<br/><br/>";



$cadena3="cadenacaracteres";
echo "La funcion str_pad permite dar un valor total de lo que tiene que ocupar esa cadena y con que se va a rellenar <br/>";
echo "En este caso la cadena cadenacaracteres ocupa 16 huecos y se van a rellenar hasta 50 con asteriscos por ejemplo<br/>";
echo "BOTH SIRVE PARA AMBOS LADOS, LEFT PARA SOLO LA IZQUIERDA Y RIGHT SOLO LA DERECHA<br/>";
echo "Funcion str_pad($cadena3,50,'*',STR_PAD_BOTH)=".str_pad($cadena3,50,"*",STR_PAD_BOTH)."<br/>";
echo "Funcion str_pad($cadena3,50,'*',STR_PAD_LEFT)=".str_pad($cadena3,50,"*",STR_PAD_LEFT)."<br/>";
echo "Funcion str_pad($cadena3,50,'*',STR_PAD_RIGHT)=".str_pad($cadena3,50,"*",STR_PAD_RIGHT)."<br/><br/>";


echo "\$cadena3=$cadena3"."<br/>";
echo "La funcion str_replace reemplaza unas letras por otras de la cadena que desees<br/>";
echo 'Funcion str_replace("a","e",$cadena3)='.str_replace("a","e",$cadena3)."<br/>";
echo 'Funcion str_replace("ca","K",$cadena3)='.str_replace("ca","K",$cadena3)."<br/><br/>";









?>
</BODY>
</HTML>
