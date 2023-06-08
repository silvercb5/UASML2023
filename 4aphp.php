<?php
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $x0 = $_POST["x0"];
    $lr = $_POST["lr"];

    $xkiri = $x0 - $lr;
    $xkanan = $x0 + $lr;

    $ykiri = ($a * $xkiri * $xkiri) + ($b * $xkiri) + $c;
    $ykanan = ($a * $xkanan *$xkanan) + ($b * $xkanan) + $c;

    if($ykiri < $ykanan){
        $pengali = -1;
    }else{
        $pengali = 1;
    }
    $y_1 = ($a * $x0 * $x0) + ($b * $x0) + $c;
    $x = $x0;
    $iterasimax = 100;
    $n_iterasi = 0;
    $run = 1;
    while($run == 1){
        $n_iterasi++;

        $x = $x + ($pengali * $lr);
        $y = ($a * $x * $x) + ($b *$x) + $c;

        if($y > $y_1 || $n_iterasi >= $iterasimax){
            $run = 0;
            $yminimal = $y_1;
        }else{
            $y_1 = $y;
        }
    }
    echo "Maka nilai minimalnya adalah ".$yminimal;
?>
    