<?php
	/**
	 * Elgg ban user
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	require_once("../../../engine/start.php");
	
	// block non-admin users
	admin_gatekeeper();
	
	// Get the user 
	$guid = get_input('guid');
	$obj = get_entity($guid);
	
	if ( ($obj instanceof ElggUser) && ($obj->canEdit()))
	{
		if ($obj->disable())
			system_message(elgg_echo('admin:user:ban:yes'));
		else
			system_message(elgg_echo('admin:user:ban:no'));
	}
	else
		system_message(elgg_echo('admin:user:ban:no'));
		
	header("Location: {$CONFIG->wwwroot}admin/user/");
	exit;
?>