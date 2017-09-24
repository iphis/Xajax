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
 * @since              24.09.2017
 */

declare(strict_types=1);

namespace Xajax\Configuration;

/**
 * Trait Language
 *
 * @package Xajax\Config
 * @todo    check language folder
 * @todo    refacture languageManager or make an Vote
 */
trait Language
{
	/**
	 * @see \xajaxLanguageManager
	 * @var string
	 */
	protected $language;

	/**
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage(string $language)
	{
		$this->language = $language;
	}
}