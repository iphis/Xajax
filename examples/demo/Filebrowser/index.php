<?php
/**
 * PHP version php7
 *
 * @category
 * @package            xajax-php-7
 * @author             ${JProof}
 * @copyright          ${copyright}
 * @license            ${license}
 * @link
 * @see                ${docu}
 * @since              26.09.2017
 */
declare(strict_types=1);

use Xajax\Examples\Demo\Filebrowser\Directories;

require_once dirname(__DIR__) . '/bootstrap.php';
$xajax = Xajax\Factory::getInstance();

/**
 * Simple instance
 *
 * @return \Xajax\Examples\Demo\Filebrowser\Directories
 */
function getDirectories()
{
	static $directories;
	if ($directories)
	{
		return $directories;
	}
	$directories = new Directories();
	$directories->setDocRoot($_SERVER['DOCUMENT_ROOT'] . '/xajax-php-7/')->setScriptRoot(__DIR__);

	return $directories;
}

/**
 * Method where xajax sends the request against. After Running the Method the objResponse goes back to Xajax an will be send to the browser
 *
 * @param array $params
 *
 * @return \xajaxResponse
 */
function listDir(string $params = '')
{

	$directories = getDirectories();

	$objResponse = xajaxResponse::getInstance();

	return $objResponse->alert('selected node ' . $params);
}

function helperLink()
{
}

$xajax->getConfig()->setJavascriptURI('../../../');
$xajaxFunctionListDir = $xajax->getPlugin('function')->registerRequest((array) 'listDir');

$xajax->processRequest();

$directories = getDirectories();

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo basename(__DIR__) ?></title>
	    <?php $xajax->printJavascript(); ?>
	</head>
	<body>
    <?php

    $dirs          = $directories->getDirectoriesFromDir();
    $simpleExclude = ['.', '..', '.git', '.idea'];
    ?>
	<ul><?php

	    foreach ($dirs as $dir)
	    {

		    if (!in_array($dir->getFilename(), $simpleExclude, true) && is_dir($dir->getPathname()))
		    {
			    $node = md5($dir->getPathname())
			    ?>
						<li id="main_<?php echo $node ?>"><a href="javascript:void(null)"
															 onclick="xajax_listDir('<?php echo $node ?>')">Sub</a>
				<?php echo $dir->getPathname(); ?>
							<div id="sub_<?php echo $node ?>"></div>
						</li>
			    <?php
		    }
	    }

	    ?>
	</ul>
	<a href="javascript:void(null)" onclick="<?php echo $xajaxFunctionListDir->getScript() ?>">list</a>
	</body>
	</html>
<?php