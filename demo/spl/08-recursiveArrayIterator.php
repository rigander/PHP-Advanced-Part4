<?php
$menu = [
          'Homepage',
          'Register',
          'About' => [
                      'The Team',
                      'Our Story'
                    ],
          'Contact' => [
                        'Locations',
                        'Support'
                      ]
        ];
// Наследуем RecursiveIteratorIterator
class MyMenu extends RecursiveIteratorIterator{
  public function beginChildren(){
    echo "<ul>\n";
  }
  public function endChildren(){
    echo "</ul></li>\n";
  }
}
// Рекурсивная итерация
$rit = new MyMenu(new RecursiveArrayIterator($menu), 
                     RecursiveIteratorIterator::SELF_FIRST);
echo "<ul>\n";
foreach($rit as $key => $value) {
  if ($rit->hasChildren()) {
    echo "<li>$key\n";
    continue;
  }
  echo "<li>$value</li>\n";
}
echo "</ul>\n";