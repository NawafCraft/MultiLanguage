<<?php

namespace Mcrafterss/MultiLanguage;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

	private static $instance = null;
	$this->NL = new Config($this->getDataFolder()."NL.yml", Config::YAML, array());
	$this->EN = new Config($this->getDataFolder()."EN.yml", Config::YAML, array());
	$this->FR = new Config($this->getDataFolder()."FR.yml", Config::YAML, array());
	
	
	public function getPlayerLang($player){
		$player->getConfig()->get($player)
	}
	
	public function setPlayerLang($player, $language){
		$player->getConfig()->set($player,$language)
	}
	
	public function Translate($player, $message){
		$lang = $player->getPlayerLang($player);
		if ($lang === nl){
			$message2 = $this->NL->get($message);
			$player->sendMessage($message2);
		}
		if ($lang === en){
			$message2 = $this->EN->get($message);
			$player->sendMessage($message2);
		}
		if ($lang === fr){
			$message2 = $this->FR->get($message);
			$player->sendMessage($message2);
		}
	}
}
