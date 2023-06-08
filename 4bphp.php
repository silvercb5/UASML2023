<?php
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $x0 = $_POST["x0"];
    $lr = $_POST["lr"];

    $xkiri = $x0 - $lr;
    $xkanan = $x0 + $lr;

    $yx0 = ($a * $x0 * $x0) + ($b * $x0) + $c;
    $ykiri = ($a * $xkiri * $xkiri) + ($b * $xkiri) + $c;
    $ykanan = ($a * $xkanan * $xkanan) + ($b * $xkanan) + $c;

    $dkiri = abs($yx0 - $ykiri);
    $dkanan = abs($ykanan - $yx0);

    if($dkiri < $dkanan){
        $pengali = -1;
    }else{
        $pengali = 1;
    }
    if($pengali == -1){
        if($ykiri < $yx0){
            $min = 1;
        }else{
            $min = -1;
        }
    }else{
        if($ykanan < $yx0){
            $min = 1;
        }else{
            $min = -1;
        }
    }
    if($pengali == -1){
        $y_1 = $ykanan;
    }else{
        $y_1 = $ykiri;
    }
    $x = $x0;
    $iterasimax = 100;
    $n_iterasi = 0;
    $run = 1;
    while($run == 1){
        $n_iterasi++;

        $x = $x + ($pengali * $lr);
        $y = ($a * $x * $x) + ($b * $x) + $c;

        if($min == 1){
            if($y > $y_1 || $n_iterasi >= $iterasimax){
                $run = 0;
                $yminimal = $y_1;
            }else{
                $y_1 = $y;
            }
        }else{
            if($y < $y_1 || $n_iterasi >= $iterasimax){
                $run = 0;
                $ymaksimal = $y_1;
            }else{
                $y_1 = $y;
            }
        }
    }
    if($min == 1){
        echo "Maka nilai minimalnya adalah ".$yminimal;
    }else{
        echo "Maka nilai maksimalnya adalah ".$ymaksimal;
    }
?>
