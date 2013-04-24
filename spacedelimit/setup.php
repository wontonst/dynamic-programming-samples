<?php

class SpaceDelimit_Setup {
  public static function debug(){
    $word = 'rocktomorrow';
    if( SpaceDelimit_Setup::recursive($word,0,strlen($word)))echo 'GOOD';else echo 'BAD';
  }
  public static function dynamic($word=null,$i=null,$j=null){

  }
  public static function recursive($word=null,$i=null,$j=null){
    if($i >= $j)return true;
    for($c =$i; $c <= $j; $c++)
      {
	if(SpaceDelimit_Setup::d(substr($word,$i,$c)) && SpaceDelimit_Setup::recursive($word,$c+1,$j-1-$c))return true;
      }
    return false;
  }

  public static function d($word){
    switch($word){
    case 'hi': case 'hey': case 'test': case 'tomorrow': case 'rocket': case 'ship': case 'rock':
      return true;
    default:return false;
    }
  }
}
SpaceDelimit_Setup::debug();
?>