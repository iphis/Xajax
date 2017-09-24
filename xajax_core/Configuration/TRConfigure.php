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

namespace Xajax\Configuration;

use Xajax\Configuration;

/**
 * Trait TRConfigure
 *
 * @package Xajax\Configuration
 */
trait TRConfigure
{
	/**
	 * Simple Helper to get the Xajax Configuration with the old way in xajax Core  and plugins
	 *
	 * @notice this is an tmp helper method
	 * @return \Xajax\Configuration
	 */
	public function getConfigurationInstance(): Configuration
	{
		return Configuration::getInstance();
	}
}