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
 * @since              27.09.2017
 */

declare(strict_types=1);

namespace Xajax\Examples\Demo\Filebrowser {

	use RecursiveDirectoryIterator;
	use RuntimeException;

	/**
	 * Class Directories
	 *
	 * @package Xajax\Examples\Demo\Scriptdirectories
	 */
	class Directories
	{
		/**
		 * public_html Directory
		 *
		 * @var string
		 */
		protected $docRoot;
		/**
		 * Where the current called php-script is located
		 *
		 * @var string
		 */
		protected $scriptRoot;
		/**
		 * Getting directories from RootDir to this dir
		 *
		 * @var string
		 */
		protected $docFromDir;

		/**
		 * @return \RecursiveDirectoryIterator
		 * @throws \RuntimeException
		 */
		public function getDirectoriesFromDir(): \RecursiveDirectoryIterator
		{
			$fdDir = '';
			if ('' === ($fdDir = $this->getDocFromDir()) && '' === ($fdDir = $this->getDocRoot()))
			{
				throw new RuntimeException('Missing of setting the from Dir');
			}

			return new RecursiveDirectoryIterator($fdDir);
		}

		/**
		 * @return string
		 */
		public function getDocRoot(): string
		{
			return (string) $this->docRoot;
		}

		/**
		 * @param string $docRoot
		 *
		 * @return Directories
		 */
		public function setDocRoot(string $docRoot): Directories
		{
			$this->docRoot = $docRoot;

			return $this;
		}

		/**
		 * @return string
		 */
		public function getScriptRoot(): string
		{
			return (string) $this->scriptRoot;
		}

		/**
		 * @param string $scriptRoot
		 *
		 * @return Directories
		 */
		public function setScriptRoot(string $scriptRoot): Directories
		{
			$this->scriptRoot = $scriptRoot;

			return $this;
		}

		/**
		 * @return string
		 */
		public function getDocFromDir(): string
		{
			return (string) $this->docFromDir;
		}

		/**
		 * @param string $docFromDir
		 *
		 * @return Directories
		 */
		public function setDocFromDir(string $docFromDir): Directories
		{
			$this->docFromDir = $docFromDir;

			return $this;
		}
	}
}