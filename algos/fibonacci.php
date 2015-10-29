<?php
function fibonacci($lim){
    $n1 = 1;    
    $n2 = 0;
    for($i = 0; $i <= $lim; $i++){
        $sum = $n1 + $n2;
        $n1 = $n2;
        $n2 = $sum;
        yield $sum;
    }
}

foreach(fibonacci(10) as $num){
    var_dump($num);
}
