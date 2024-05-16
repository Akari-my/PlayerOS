<?php
/*
 *
 *  *
 *  *  *
 *  *  *   Copyright (c) 2022. Akari_my
 *  *  *
 *  *  *   Permission is hereby granted, free of charge, to any person obtaining a copy
 *  *  *   of this software and associated documentation files (the "Software"), to deal
 *  *  *   in the Software without restriction, including without limitation the rights
 *  *  *   to use, copy, modify, merge, publish, distribute, sublicense, andor sell
 *  *  *   copies of the Software, and to permit persons to whom the Software is
 *  *  *   furnished to do so, subject to the following conditions:
 *  *  *
 *  *  *   The above copyright notice and this permission notice shall be included in all
 *  *  *   copies or substantial portions of the Software.
 *  *  *
 *  *  *   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  *  *   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  *  *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  *  *   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  *  *   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  *  *   OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  *  *   SO
 */

namespace Akari\PlayerOS;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class PlayerOS extends PluginBase{

    public function onEnable(): void{
        $this->getLogger()->info("§7--------------------------");
        $this->getLogger()->info("    §4Player§cOS    ");
        $this->getLogger()->info("      §cVersion: §f1,0");
        $this->getLogger()->info("      §cAuthor: §fAkari_my");
        $this->getLogger()->info("    §4Player§cOS    ");
        $this->getLogger()->info("§7--------------------------");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if ($command->getName() == "os"){
            if (count($args) < 1){
                $sender->sendMessage("§4Player§cOS§8» Usage [/os <player name>");
                return false;
            }
            $name = implode(" ", $args);
            $os = ["Unknown", "Android", "iOS", "macOS", "FireOS", "GearVR", "HoloLens", "Windows 10", "Windows", "Dedicated", "Orbis", "Playstation 4", "Nintento Switch", "Xbox One"];
            $controls = ["Unknown", "Mouse & Keyboard", "Touch", "Controller"];
            $player = Server::getInstance()->getPlayerExact($name);
            if ($player instanceof Player){
                $sender->sendMessage("§4Player§cOS§8»\n§f- §aPlayer Name: §f" . $player->getName() . "\n- §aDevice: §f" . $os[$player->getPlayerInfo()->getExtraData()["DeviceOS"] ?? 0] . "\n- §aPing: §f" . $player->getNetworkSession()->getPing() . "\n- §aControl: §f" . $controls[$player->getPlayerInfo()->getExtraData()["CurrentInputMode"] ?? 0] . "\n- §aDevice Model: §f" . $player->getPlayerInfo()->getExtraData()["DeviceModel"] ?? "Unknown");
            } else {
                $sender->sendMessage("§4Player§cOS§8» §cPlayer not Found");
            }
        }
        return true;
    }
}
