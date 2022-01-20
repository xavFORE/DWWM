<?php


for ( $i=65  ; $i<91 ; $i++ )
{
    $lettreMAJ = chr( $i ); 
    $lettreMIN = chr( $i+32 );
    print( " $i $lettreMAJ    $lettreMIN\n");
}

print( "\n");


$codeET = ord('é');
$lettre = chr( $codeET-32 );


print( $lettre  ); 
print( "\n");
print( "------------------------\n");


$str = "Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός";

print( "$str\n");

$str = mb_strtoupper( $str , 'UTF-8');

print( "$str\n");


$val = "éèêùû";
$val = iconv('UTF-8','ASCII//TRANSLIT',$val); 
print( "$val\n");
?>