<?
function fib_recursive($i)
{
  if($i == 1 || $i == 2)
    return 1;

  return fib($i-1)+fib($i-2);
}
function fib_dynamic($n)
{
  $f = array();
  $f[1] = $f[2] = 1;
  for($i = 3; $i <= $n; $i++)
    {
      $f[$i]=$f[$i-1]+$f[$i-2];
    }
  return $f[$n];
}

echo fib_recursive(10)."\n";

echo fib_dynamic(10);

?>