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
		$this->saveDefaultConfig();
		$this->NL = new Config($this->getDataFolder()."NL.yml", Config::YAML, [
            	'testmessage' => hallo
        	]);
		$this->EN = new Config($this->getDataFolder()."EN.yml", Config::YAML, [
            	'testmessage' => hello
        	]);
		$this->FR = new Config($this->getDataFolder()."FR.yml", Config::YAML, [
            	'testmessage' => bonjour
        	]);
		$this->DE = new Config($this->getDataFolder()."DE.yml", Config::YAML, [
            	'testmessage' => hallo2
        	]);
		$this->data = new Config($this->getDataFolder()."Data.yml", Config::YAML, [
            	'driesboy' => nl
        	]);
	}
	
	public static function getInstance(){
		return self::$instance;
	}
	
	public function setPlayerLang($player, $language){
		$this->data->set($player,$language)
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
