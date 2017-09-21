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
 * @since              21.09.2017
 */

declare(strict_types=1);

namespace Xajax;

use xajax;

/**
 * Class Factory
 *
 * @package Xajax
 */
class Factory
{
	/**
	 * Xajax Instances
	 *
	 * @var array
	 */
	private static $instances = [];

	/**
	 * Factory constructor.
	 */
	protected function __construct()
	{
	}

	/**
	 * Getting Access to Xajax
	 *
	 * @param string $instance      instanceName is necessary
	 * @param array  $configuration configuration to Xajax
	 *
	 * @return xajax
	 */
	public static function getInstance(string $instance = 'default', array $configuration = []): \xajax
	{
		// todo errors and logger on less instanceName
		// todo clearing evil name stuff if need
		$instances = self::getInstances();
		if (array_key_exists($instance, $instances) && ($foundInstance = $instances[$instance]) instanceof \xajax)
		{
			return $foundInstance;
		}
		$instances[$instance] = self::createXajax($configuration);
		self::setInstances($instances);

		return $instances[$instance];
	}

	/**
	 * @param array $configuration
	 *
	 * @return \xajax
	 */
	private static function createXajax(array $configuration = []): \xajax
	{
		return new \xajax($configuration);
	}

	/**
	 * @return array
	 */
	private static function getInstances(): array
	{
		return self::$instances;
	}

	/**
	 * @param array $instances
	 */
	private static function setInstances(array $instances)
	{
		self::$instances = $instances;
	}
}