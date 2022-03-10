<?php
// le mot final signifie que cette class ne poura etre heriter par d'autre class(ne peut pas avoir d'heritier)
//le developpeur considere que le code est aboutie, et ne veut pas qu'il soit modifiable dans des classes qui herite
final class Application{

    public function exeApp(){
        return 'je fonctionne <br>'; 
    }
  
}
// c'est une class que l'on peut instancier contrairement a abstract
$app = new Application;
echo "etas de l'application: " . $app-> exeApp();

class App2{
    //app3 est une class 'normal' qui peut contenir des methodefinal
    final function lunchApp(){
        return ' application lancer <br>';
    }
}
//extention heriter de app2 
class Exe extends app2{
    
    //la class herite de la methode final lunchApp( mais je ne pourais pas la modifier ou la surcharger, la redefinir)
    // public function LunchApp(){
    //     return 'je fonctionne autrement';
    // }
}

$exe = new exe;
echo "etas de l'application: " . $app-> exeApp();
echo "<pre>";print_r(get_class_methods($exe)); echo"</pre>";