<?php

/**
 * LegionPE
 * Copyright (C) 2015 PEMapModder
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace legionpe\theta\command;

use legionpe\theta\BasePlugin;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

class PhpCommand extends ThetaCommand{
	public function __construct(BasePlugin $main){
		parent::__construct($main, "php", "Execute PHp code directly", "/php <PHP code ...>");
	}
	public function execute(CommandSender $sender, $commandLabel, array $args){
		if(!($sender instanceof ConsoleCommandSender)){
			return true;
		}
		$code = implode(" ", $args);
		$this->getPlugin()->getLogger()->alert("Executing PHP code: $code");
		$this->getPlugin()->evaluate($code);
		return true;
	}
	public function testPermissionSilent(CommandSender $sender){
		return $sender instanceof ConsoleCommandSender;
	}
}
