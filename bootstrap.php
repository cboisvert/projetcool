<?php
//define the private directory path
$privateDir = dirname(__FILE__);


if(file_exists($privateDir.DIRECTORY_SEPARATOR.$application.'_'.$environment))
	$appPath = $privateDir.DIRECTORY_SEPARATOR.$application.'_'.$environment;
else
	$appPath = $privateDir.DIRECTORY_SEPARATOR.$application;

//look if in maintenance
if(isset($maintenance) && $maintenance===true)
{
	if(!isset($allowedIP) || !in_array($_SERVER['REMOTE_ADDR'],$allowedIP) || !isset($_GET['no-maintenance']))
	{
		include("$privateDir/$application/maintenance.php");
		exit();
	}
}

//define basic params
defined('YII_DEBUG') or define('YII_DEBUG',$environment==='dev');
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//include Yii
require_once("$privateDir/yii/framework/yii.php");

//Set vendors and extensions paths
if(!defined('VENDORS_PATH'))
{
	if(file_exists($privateDir.DIRECTORY_SEPARATOR.'vendors'.'_'.$environment))
		define('VENDORS_PATH',$privateDir.DIRECTORY_SEPARATOR.'vendors'.'_'.$environment);
	else
		define('VENDORS_PATH',$privateDir.DIRECTORY_SEPARATOR.'vendors');
}
Yii::setPathOfAlias('vendors',VENDORS_PATH);
defined('EXT_PATH') or define('EXT_PATH',$privateDir.DIRECTORY_SEPARATOR.'projetcool/ext');
if(!defined('EXT_PATH'))
{
	if(file_exists($privateDir.DIRECTORY_SEPARATOR.'projetcool/ext_'.$environment))
		define('EXT_PATH',$privateDir.DIRECTORY_SEPARATOR.'projetcool/ext_'.$environment);
	else
		define('EXT_PATH',$privateDir.DIRECTORY_SEPARATOR.'projetcool/ext');
}
//include the globals helpers
if(file_exists("$appPath/globals.php"))
	include_once("$appPath/globals.php");
//load the configuration files
$config = CMap::mergeArray(
	include("$appPath/config/main.php"),
	include("$appPath/config/$environment.php")
);

//create and run the application
class EWebApplication extends CWebApplication
{
	
	protected function preinit()
	{
		parent::preinit();
		$this->setExtensionPath(EXT_PATH);
	}
}
Yii::createApplication('EWebApplication',$config)->run();
