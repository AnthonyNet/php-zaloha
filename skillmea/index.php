<?php
// example code
class Being{
    public $name;
    public $health;
    public $inventory = [];

    public function __construct($name, $health, array $inventory){
		$this->name = $name;
		$this->health = $health;
		$this->inventory = $inventory;
	}

	public function takeDamage($damage){
		$this->health -= $damage;



		if($this->health <= 0){
			$this->perish();
		} else {
			var_dump($this->name . ' has: ' . $this->health . ' HP.');
		}
	}

	public function perish(){
		var_dump($this->name . ' has perished.');
	}
}

$hero = new Being('Marceline', 50, [
    'gold'=>120, 'potion'=>3, 'axe'=> 1
]);

$hero->takeDamage(10);
$hero->takeDamage(40);
?>