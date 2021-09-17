<HTML>
<HEAD><TITLE>Constantes</TITLE>
<h1> Diferentes ejemplos de uso de Constantes </h1>
</HEAD>
<BODY>
<?php
/* Definiremos la constante EurPta y le asignaremos el valor 166.386 */
define("EurPta",166.386);
/* Definiremos la constante PtaEur asignándole el valor 1/166.386
En este caso el valor de la constante es el resultado
de la operación aritmética dividir 1 entre 166.386*/
define("PtaEur",1/166.386);
/* Definimos la constante Cadena y le asignamos el valor: 12
   Esta constante es una cadena*/
define("Cadena",12);
echo "<h1>Esto es un h1 dentro de un echo</h1>Diferentes ejemplos de uso de Constantes";
/* Definimos la constante Cadena2 y le asignamos el valor:
   12.54 Constante con punto decimal*/
define("Cadena2",12.54);
/* Comprobemos los valores.Observa la nueva forma en la que utilizamos echo
  Lo hacemos enlazando varias cadenas separadas con punto y/o coma,
  según se trate de echo o de print */
echo "Valor de la constante EurPta: ",EurPta,"<BR>";
echo "Valor de la constante PtaEur: ".PtaEur ."<BR>";
print "Valor de la constante Cadena: " .Cadena ."<BR>";
print "Valor de la constante Cadena x EurPta: " .Cadena*EurPta ."<br>";
print "Valor de la constante Cadena2 x EurPta: " .Cadena2*EurPta ."<br>";

echo "Ahora voy a probar yo mis valores";;
echo "Creo que tanto echo como print es lo mismo";

echo "esto es un echo <BR> ";
print "esto es un print <BR>";
/*Defino la constante dolar y euro*/
define("EuroDolar",1.18);
define("DolarEuro",1/0.85);

echo "<h3>Doy los valores del Dolar y del Euro</h3>";
echo "Valor de la constante Euro/Dolar:", EuroDolar,"<BR>";
echo "Valor de la constante Dolar/Euro", DolarEuro,"<BR>";

echo "<h3>Defino una variable de 20</h3>";
define("Cadena3",20);

echo "<h3>Multiplico la Cadena3=20 por el valor del dolar</h3>";
print "Valor de la constante Cadena3 x EuroDolar: " .Cadena3*EuroDolar ."<br>";
echo "<h3>Multiplico la Cadena3=20 por el valor del euro</h3>";
print "Valor de la constante Cadena3 x DolarEuro: " .Cadena3*DolarEuro ."<br>";

echo "<h3>Tambien podemos crear variables con el \$variable </h3>";

echo "A su vez podemos para concatenar valores como haciamos en java con el +" . "<br>";
echo "aqui funciona con el .Cadena3*EuroDolar.";

?>

</BODY>
</HTML>
