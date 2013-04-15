<?php

class Cashier_Setup implements Resources\Setup {

    $this->coins = array(
                       1,
                       5,
                       10,
                       25
                   );
    public function recursive($target) {
        global $coins;
        if($target == 0)return 0;
        if($target < 0)return 100000000;
        $possible_solutions = array();
        foreach($coins as $int) {
            $possible_solutions[] = cashier($target-$int)+1;

        }
        return min($possible_solutions);
    }
    public function dynamic($target) {
        global $coins;
        $ref = array();
        $ref[0] = 0;
        for($i = 1; $i <= $target; $i++) {
            $min = 100000;
            foreach($coins as $coin) {
                if($i-$coin < 0)continue;
                if($ref[$i-$coin] < $min)$min = $ref[$i-$coin];
            }
            $ref[$i] = $min+1;
        }
        return $ref[$target];
    }
    public function debug {
        echo cashier(15)."\n".cashier(23)."\n";
        echo cashier_dynamic(15)."\n".cashier_dynamic(23);

    }
}
?>