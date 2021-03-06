<?php

/*

           -
         /   \
      /         \
   /   PocketMine  \
/          MP         \
|\     @shoghicp     /|
|.   \           /   .|
| ..     \   /     .. |
|    ..    |    ..    |
|       .. | ..       |
\          |          /
   \       |       /
      \    |    /
         \ | /

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.


*/

class GlowingRedstoneOreBlock extends SolidBlock{
	public function __construct(){
		parent::__construct(GLOWING_REDSTONE_ORE, 0, "Glowing Redstone Ore");
	}

	public function onUpdate(BlockAPI $level, $type){
		if($type === BLOCK_UPDATE_SCHEDULED or $type === BLOCK_UPDATE_RANDOM){
			$level->setBlock($this, REDSTONE_ORE, $this->getMetadata(), false);			
			return BLOCK_UPDATE_WEAK;
		}else{
			$level->scheduleBlockUpdate($this, mt_rand(45, 100));
		}
		return false;
	}
	
	public function getDrops(Item $item, Player $player){
		if($item->isPickaxe() >= 2){
			return array(
				//array(331, 4, mt_rand(4, 5)),
			);
		}else{
			return array();
		}
	}
	
}