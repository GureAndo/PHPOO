<?php
//grace a l'autoloead je n'est besoin que ce l'appeler lui car il et automatiser a la creation des require_once
//je l'apelle lui , il me recupere tout les autre a contion q'il et tout un mot similaire dans leur nom 
require 'AutoLoad.php';
//touts mes class sont reconnue grace a un seul require_once
$a = new A;
$b = new B;
$c = new C;
$d = new D;

echo'<pre>'; var_dump($a); echo'</pre>';
echo'<pre>'; var_dump($b); echo'</pre>';
echo'<pre>'; var_dump($c); echo'</pre>';
echo'<pre>'; var_dump($d); echo'</pre>';

$d->test();