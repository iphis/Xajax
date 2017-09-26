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
 * @since              23.09.2017
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/bootstrap.php';

$xajaxConfiguration = \Xajax\Configuration::getInstance();
$xajaxConfiguration::setLegacy(true);

var_dump($xajaxConfiguration);

var_dump(Xajax\Helper\Encoding::getPhpEncodings());