<?php

use Xajax\Factory;

require_once __DIR__ . '/bootstrap.php';

$xajax = Factory::getInstance();

function testFluentInterface()
{
	return Factory::getInstance()::getGlobalResponse()
	              ->alert('Here is an alert.')
	              ->assign('submittedDiv', 'innerHTML', 'Here is some <b>HTML text</b>.');
}

$xajax->getPlugin('function')->registerRequest((array) 'testFluentInterface');

$xajax->processRequest();
$xajax->getConfig()->setJavascriptURI('../');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Fluent Interface Test | xajax Tests</title>
	<?php $xajax->printJavascript('../') ?>
</head>
<body>
<h2><a href="index.php">xajax Tests</a></h2>
<h1>Fluent Interface Test (PHP 7+ only)</h1>
<p>
	<a href="#" onclick="xajax_testFluentInterface();return false;">Perform Test</a>
<div id="submittedDiv">
</div>
</body>
</html>

