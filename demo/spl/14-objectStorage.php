<?php
class Course{
  private $_name;
  public function __construct($name){
    $this->_name = $name;
  }
  public function __toString(){
    return strtoupper($this->_name);
  }
}

$courses = new SplObjectStorage();

$php = new Course('php');
$xml = new Course('xml');
$java = new Course('java');

$courses->attach($php);
$courses->attach($java);
var_dump( $courses->contains($php) );
var_dump( $courses->contains($xml) );
var_dump( $courses->contains($java) );

$courses->attach($xml);
var_dump( $courses->contains($xml) );

$courses->detach($java);
var_dump( $courses->contains($java) );
 
$titles = [];
foreach ($courses as $course) {
  $titles[] = (string) $course;
}
echo join(', ', $titles);
