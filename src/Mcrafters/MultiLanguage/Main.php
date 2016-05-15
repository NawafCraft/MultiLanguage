<?php

namespace Mcrafters\MultiLanguage;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

	private static $instance = null;
	
	public function onEnable(){
		$this->getServer()->getLogger()->info(TextFormat::BLUE . "MultiLanguage Has Been Enabled.");
		$this->getServer()->getLogger()->info(TextFormat::BLUE . "By: MCrafterss. http://github.com/MCrafterss");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir($this->getDataFolder(), 0777, true);
		$this->NL = new Config($this->getDataFolder()."NL.yml", Config::YAML, array());
		$this->EN = new Config($this->getDataFolder()."EN.yml", Config::YAML, array());
		$this->FR = new Config($this->getDataFolder()."FR.yml", Config::YAML, array());
		$this->DE = new Config($this->getDataFolder()."DE.yml", Config::YAML,array());
		$this->data = new Config($this->getDataFolder()."Data.yml", Config::YAML, array());
	}
	
	public static function getInstance(){
		return self::$instance;
	}
	
	public function setPlayerLang($player, $language){
		$this->data->set($player,$language);
		$this->data->save();
	}
	
	public function Translate($player, $message){
		$lang = $this->data->get($player);
		if ($lang === nl){
			$this->NL->get($message);
		}
		if ($lang === en){
			$this->EN->get($message);
		}
		if ($lang === fr){
			$this->FR->get($message);
		}
		if ($lang === de){
			$this->DE->get($message);
		}
	}
}
