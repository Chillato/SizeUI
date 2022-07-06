<?php

namespace ChillatoDev;

use ChillatoDev\Vecnavium\FormsUI\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;


class Main extends PluginBase implements Listener{

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if ($sender->getName()) {
            switch ($command->getName()){
                case "sizeui":
                    $this->size($sender);
            }
            return true;
        }
        return true;
    }
    public function size($player){
        $size = new SimpleForm(function(Player $player, int $data = null){
           if($data === null){
               return true;
           }
           switch($data){
               case 0:
                   $player->setScale(15.0);
                   break;
               case 1:
                   $player->setScale(1.0);
                   break;
               case 2:
                   $player->setScale(0.1);
                   break;
           }
        });
        $size->setTitle("SizeUI");
        $size->setContent("choose the size you want");
        $size->addButton("§lGiant", 0);
        $size->addButton("§lNormal", 0);
        $size->addButton("§lSmall", 0);
        $size->sendToPlayer($player);
    }
}