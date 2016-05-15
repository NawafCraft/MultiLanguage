<?php

namespace MCrafters;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;

use Mcrafters\MultiLanguage\Main;


class AvoidOps extends PluginBase implements Listener {

	public function onEnable(){
        	$this->getServer()->getPluginManager()->registerEvents($this, $this);
   	}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$message = "testmessage";
        	$player->sendMessage(MultiLanguage::getInstance()->translate($player, $message);
        }
}
