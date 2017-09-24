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

use Xajax\Helper\Encoding;

/**
 * Class Configuration
 *
 * @package Xajax
 */
class Configuration
{
	/**
	 * @var self
	 */
	private static $instance;
	/**
	 * Legacy-Mode can be used to refacture xajax 6 versions. The Legacy-Flag allows to get and set vars without type checking
	 *
	 * @deprecated 7.1 Legacy Mode will be removed
	 * @var bool
	 */
	static protected $legacy = false;
	/**
	 * String: XAJAX_DEFAULT_CHAR_ENCODING UTF-8
	 * Default character encoding used by both the <xajax> and
	 * <xajaxResponse> classes.
	 *
	 * @var string
	 */
	protected $characterEncoding;
	/**
	 * @since xajax 7.0.1 Replaces the XAJAX_DEFAULT_CHAR_ENCODING
	 * @var string
	 */
	private static $defaultCharacterEncoding = 'UTF-8';
	/**
	 * A configuration option used to indicate whether input data should be UTF8 decoded automatically.
	 * Boolean: bDecodeUTF8Input
	 *
	 * @var bool
	 * @see xajaxArgumentManager.inc.php
	 */
	protected $decodeUTF8Input;
	/**
	 * Convert special characters to the HTML equivellent.  See also <xajax->bOutputEntities> and <xajax->configure>.
	 * Called by the xajax object when configuration options are set in the main script.  Option
	 * values are passed to each of the main xajax components and stored locally as needed.  The
	 * <xajaxResponseManager> will track the characterEncoding and outputEntities settings.
	 *
	 * @var bool
	 */
	protected $outputEntities;

	/**
	 *  Getter
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function __get($name)
	{
		if (self::isLegacy())
		{
			return $this->{$name};
		}

		$method = self::getMethodName('get', $name);
		if (method_exists($this, $method))
		{
			return $this->{$method()};
		}

		// never giveback an parameter without getter
		throw new \BadMethodCallException(__CLASS__ . '::' . __METHOD__ . ' Method ' . $method . ' for variable ' . $name . ' does not exists');
	}

	/**
	 * Setter
	 *
	 * @param $name
	 * @param $value
	 *
	 * @return mixed
	 */
	public function __set($name, $value)
	{
		if (self::isLegacy())
		{
			return $this->{$name} = $value;
		}

		$method = self::getMethodName('set', $name);
		if (method_exists($this, $method))
		{
			return $this->$method($value);
		}
		// never overload the setter! Make sure you have an
		throw new \BadMethodCallException(__CLASS__ . '::' . __METHOD__ . ' Method ' . $method . ' for variable ' . $name . ' does not exists');
	}

	/**
	 * @param $name
	 *
	 * @example create an method isTestVar() then  isset(Configuration::getInstance()->testVar) will be checked by the method
	 * @return bool|mixed
	 */
	public function __isset($name)
	{
		if (self::isLegacy())
		{
			return isset($this->{$name});
		}

		$method = self::getMethodName('is', $name);
		if (method_exists($this, $method))
		{
			return $this->{$method()};
		}

		return isset($this->{$name});
	}

	/**
	 * Internal MethodName Compiler
	 *
	 * @param string $type get|set|is
	 * @param string $name variable-name which should interact with the method
	 *
	 * @return string
	 */
	private static function getMethodName($type = '', $name = ''): string
	{
		return $type . ucfirst($name);
	}

	/**
	 * @return string
	 */
	public function getCharacterEncoding(): string
	{
		if ('' === $this->characterEncoding)
		{
			// todo perhaps log
			$this->setCharacterEncoding(self::getDefaultCharacterEncoding());
		}

		return $this->characterEncoding;
	}

	/**
	 * @param string $characterEncoding
	 */
	public function setCharacterEncoding($characterEncoding = '')
	{
		// @todo check the Setter, the encoding is valid
		if (Encoding::getEncoding($characterEncoding, true))
		{
			$this->characterEncoding = (string) $characterEncoding;
		}
	}

	/**
	 * @return string
	 */
	public static function getDefaultCharacterEncoding(): string
	{
		return self::$defaultCharacterEncoding;
	}

	/**
	 * @return Configuration
	 */
	public static function getInstance(): Configuration
	{
		if (!self::$instance instanceof self)
		{
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Configuration constructor.
	 */
	protected function __construct()
	{
	}

	/**
	 * @return bool
	 */
	public function isDecodeUTF8Input(): bool
	{
		return $this->decodeUTF8Input;
	}

	/**
	 * @param bool $decodeUTF8Input
	 */
	public function setDecodeUTF8Input($decodeUTF8Input = false)
	{
		$this->decodeUTF8Input = (bool) $decodeUTF8Input;
	}

	/**
	 * @return bool
	 */
	public function isOutputEntities(): bool
	{
		return $this->outputEntities;
	}

	/**
	 * @param bool $outputEntities
	 */
	public function setOutputEntities($outputEntities = false)
	{
		$this->outputEntities = (bool) $outputEntities;
	}

	/**
	 * @return bool
	 * @deprecated 7.1 will be removed
	 */
	public static function isLegacy(): bool
	{
		return self::$legacy;
	}

	/**
	 * @param bool $legacy
	 *
	 * @deprecated 7.1 will be removed
	 */
	public static function setLegacy($legacy = false)
	{
		self::$legacy = (bool) $legacy;
	}
}