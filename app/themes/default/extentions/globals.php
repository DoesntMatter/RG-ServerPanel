<?php
class default_globals {
	function current_user(){
		global $current_user;
		return $current_user;
	}

	function realms(){
		$realms = array();
		$db_config = Environment::get_config_value('databases');
		foreach($db_config['realm'] as $key => $value){
			$realms[] = Realm::find($key);
		}
		return $realms;
	}

	function STATUS(){
		global $STATUS;
		return $STATUS;
	}

	function rooturl(){
		return Environment::$app_url;
	}

	function themeurl(){
		return Environment::$app_theme_url;
	}

	function TICKETSTATUS(){
		global $TICKET_STATUS;
		return $TICKET_STATUS;
	}
}