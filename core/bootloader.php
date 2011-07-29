<?php
//---------------------------------------------------------------------------
//-- Bootstraping
//---------------------------------------------------------------------------

//-- Registering Framework_Autoloader and Custom Autoloaders
if (RUNLEVEL >= 1) {
    require_once(FRAMEWORK_ROOT . '/core/autoloader.php');
    Framework_Autoloader::register();
    require_once(FRAMEWORK_ROOT . '/loaders/custom_libs.php');
}

//-- Setting up the Environment and Error-Handling
if (RUNLEVEL >= 2) {
    require_once(FRAMEWORK_ROOT . '/loaders/error_handling.php');
    require_once(FRAMEWORK_ROOT . '/loaders/environment.php');
    Debug::add('Environment loaded');
    Debug::stopTimer();
}

//-- Start Session-Management
if (RUNLEVEL >= 3) {
    require_once(FRAMEWORK_ROOT . '/loaders/sessions.php');
    SessionManager::start();
    Debug::add('SessionManagement loaded');
    Debug::stopTimer();
}

//-- Loading Application-Variables
if (RUNLEVEL >= 4) {
    require_once(APP_ROOT . '/defaults.php');
    $lang = Environment::get_config_value('lang');
    require_once(APP_ROOT . "/lang/{$lang}/lang.php");
    Debug::add('Application-Variables loaded');
    Debug::stopTimer();
}

//-- Startup Application
if (RUNLEVEL >= 5) {
    Debug::add('Starting Application');
    Debug::stopTimer();
    $router = Router::instance();
    $router->route();
}
