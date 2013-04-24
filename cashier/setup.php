<?php
 $GLOBALS['coins'] = array(
                       1,
                       5,
                       10,
                       25
                   );

class Cashier_Setup implements Resources\Setup {

  public static function recursive($target=null,$target2=null,$target3=null) {
        if($target == 0)return 0;
        if($target < 0)return 100000000;
        $possible_solutions = array();
        foreach($GLOBALS['coins'] as $int) {
	  $possible_solutions[] = Cashier_Setup::recursive($target-$int)+1;

        }
        return min($possible_solutions);
    }
    public static function dynamic($target=null,$target2=null,$target3=null) {
        $ref = array();
        $ref[0] = 0;
        for($i = 1; $i <= $target; $i++) {
            $min = 100000;
            foreach($GLOBALS['coins'] as $coin) {
                if($i-$coin < 0)continue;
                if($ref[$i-$coin] < $min)$min = $ref[$i-$coin];
            }
            $ref[$i] = $min+1;
        }
        return $ref[$target];
    }
    public static function debug() {
      echo Cashier_Setup::recursive(15)."\n".Cashier_Setup::recursive(23)."\n";
      echo Cashier_Setup::dynamic(15)."\n".Cashier_Setup::dynamic(23);

    }
}
?>