<?php
/**
* 
*/
class user_controller extends Controller
{
	
	function add(){
		global $config;
		$this->render(array('active' => $config['registration']));
	}
	
	function create($params){
		if(isset($params['username']) && isset($params['password'])){
			$params['flags'] = "2";
		  if($user = User::create($params)){
				$this->flash('success','Thank you for registering, please login!');
				$this->render_ajax('success', "Thank you for registering, please login!");
		  } else {
				$errors = array();
		  	foreach($user->errors AS $error){
		     	  $errors .= $error . "<br />";
		    }
				$this->render_ajax('error', $errors);
		   }
		} else {
			$this->render_ajax('error', 'Error');
		}
	}
	
	function characters(){
		global $user;
		if($user->logged_in()){
			$user->fetchChars();
			$main = $user->fetchMainChar();
			$this->render('user_characters.tpl',array('main' => $main));
		}
	}
	
	function make_main($params){
		global $user;
		if(isset($params['guid']) && $user->setMainChar($params['guid'],$params['realm'])){
			$this->flash('success', "Main wurde geändert");
		} else {
		  $this->flash('error', "Main konnte nicht geändert werden");
		}
		$this->redirect_to('user','characters');
	}
	
	function edit_password(){
		$this->render('change_password.tpl');
	}
	
	function edit_email(){
		$this->render('change_email.tpl');
	}
	
	function update($params){
		global $user;
		if(isset($params['email']) && isset($params['email_confirm'])) {
			if($params['email'] == $params['email_confirm']){
				if($user->change_email($params['email'])){
					$this->render_ajax('success','E-Mail Adresse erfolgreich geändert');
				} else {
					$this->render_ajax('error','E-Mail Adresse konnte nicht geändert werden');
				}
			} else {
				$this->render_ajax('error','E-Mail Adresse müssen übereinstimmen');
			}
		} elseif(isset($params['password']) && isset($params['password_confirm'])) {
			if($params['password'] == $params['password_confirm']){
				if($user->change_password($params['password'])){
					$this->render_ajax('success','Passwort erfolgreich geändert');
				} else {
					$this->render_ajax('error','Passwort konnte nicht geändert werden');
				}
			} else {
				$this->render_ajax('error','Passwörter müssen übereinstimmen');
			}
		}
	}
	
	function passwsord_lost($params){
		if(isset($params['email'])){
			if(!empty($params['email']) && $user->userid == NULL){
				$user_id = userid_by_email($params['email']);
				if($user_id){
					$user = new User;
					$user->loadUser($user_id,false);
					if($user->send_reset_password()){
						flash('success', 'E-Mail wurde verschickt');
					} else {
						flash('error', 'E-Mail konnte nicht gesendet werden');
					}
				} else {
					flash('error', 'E-Mail Adresse konnte nicht gefunden werden');
				}
			} else {
				flash('error', 'Du bist eingeloggt!? Wie kann man da sein Passwort verlieren??');
				header('Location: index.php');
			}
		}
		$this->render('password_lost.tpl',array());
	}
	
	function password_reset(){
		if(isset($params['key'])) {
			if(User::validate_reset_password_key($params['key'])){
				$this->render('password_reset.tpl',array('key' => $params['key']));
			} 
		} elseif(isset($params['password']) && isset($params['password_confirm'])) {
			if($_POST['password'] == $params['password_confirm']){
				if(User::reset_password($params['key'], $params['password'])){
					$this->flash('success', 'Passwort wurde erfolgreich geändert! Du kannst dich jetzt einloggen');
				} else {
					$this->flash('error','Der Key ist ungültig!');
				}
				header('Location: index.php');
			} else {
				$this->flash('error', 'die Passwörter müssen gleich sein!');
			}
		} else {
			header('Location: index.php');
		}
		$this->render('password_reset.tpl',array('key' => $params['key']));
	}
}
