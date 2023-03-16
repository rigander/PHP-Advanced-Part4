<?php
class MyObject{
  private $flag;
  public function __construct(){
    $this->flag = rand(0, 3);
  }
  public function action(){
    echo "Done\n";
    $ret = (bool)$this->flag;
    $this->flag = rand(0, 3);
    return $ret;
  }
}
$object1 = new MyObject();
$object2 = new MyObject();
$arrayIterator1 = new ArrayIterator( [$object1, $object2] );

$object3 = new MyObject();
$object4 = new MyObject();
$arrayIterator2 = new ArrayIterator( [$object3, $object4] );

$arrayIterator = new AppendIterator();
$arrayIterator->append($arrayIterator1);
$arrayIterator->append($arrayIterator2);

$it = new InfiniteIterator($arrayIterator);
foreach($it as $object){
  $result = $object->action();
  if(!$result) break;
  usleep(200);
}
