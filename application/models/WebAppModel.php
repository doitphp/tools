<?php
/**
 * 创建项目目录及文件管理模型
 *
 * @author tommy <tommy@doitphp.com>
 * @link http://www.doitphp.com
 * @copyright Copyright (C) Copyright (c) 2012 www.doitphp.com All rights reserved.
 * @license New BSD License.{@link http://www.opensource.org/licenses/bsd-license.php}
 * @version $Id: Webapp.php 1.0 2013-01-11 21:53:32Z tommy <tommy@doitphp.com> $
 * @package model
 * @since 1.0
 */

class WebAppModel {


	/**
	 * 创建项目引导文件（index.php）
	 *
	 * @access public
	 * @return string
	 */
	public function createIndexFile() {

		$filePath   = rtrim(WEB_APP_PATH, '/') . DS . 'index.php';
		$timeString = date('Y-m-d H:i:s');
		$fileContent = <<<EOT
<?php
/**
 * application index
 *
 * @author tommy <tommy@doitphp.com>
 * @copyright Copyright (C) 2009-2012 www.doitphp.com All rights reserved.
 * @version \$Id: index.php 1.0 {$timeString}Z tommy \$
 * @package application
 * @since 1.0
 */

define('IN_DOIT', true);

/**
 * 定义项目所在路径(根目录):APP_ROOT
 */
define('APP_ROOT', dirname(__FILE__));

/**
 * 加载DoitPHP框架的初始化文件,如果必要可以修改文件路径
 */
require_once APP_ROOT . '/doitphp/DoitPHP.php';

\$config = APP_ROOT . '/application/config/application.php';

/**
 * 启动应用程序(网站)进程
 */
Doit::run(\$config);
EOT;

		return File::writeFile($filePath, $fileContent);
	}


	/**
	 * 创建项目的重写规则引导文件(.htaccess)
	 *
	 * @access public
	 * @return string
	 */
	public function createHtaccessFile() {

		$filePath    = rtrim(WEB_APP_PATH, '/') . DS . '.htaccess';
		$fileContent = <<<EOT
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule !\\.(js|ico|txt|gif|jpg|png|css)\\\$ index.php [NC,L]
EOT;

		return File::writeFile($filePath, $fileContent);
	}

	/**
	 * 创建项目搜索引擎网络爬虫引导文件(robots.txt)
	 *
	 * @access public
	 * @return string
	 */
	public function createRobotsFile() {

		$filePath = rtrim(WEB_APP_PATH, '/') . DS . 'robots.txt';
		$fileContent = <<<EOT
User-agent: *
Crawl-delay: 10
Disallow: /doitphp/
Disallow: /application/
Disallow: /cache/
Disallow: /logs/
EOT;

		return File::writeFile($filePath, $fileContent);
	}

	/**
	 * 创建项目配置文件(application.php)
	 *
	 * @access protected
	 * @return string
	 */
	protected function _createConfigFile() {

		$filePath   = rtrim(WEB_APP_PATH, '/') . DS . 'application/config/application.php';
		$timeString = date('Y-m-d H:i:s');
		$fileContent = <<<EOT
<?php
/**
 * 项目主配置文件
 *
 * @author tommy <tommy@doitphp.com>
 * @link http://www.doitphp.com
 * @copyright Copyright (C) Copyright (c) 2012 www.doitphp.com All rights reserved.
 * @license New BSD License.{@link http://www.opensource.org/licenses/bsd-license.php}
 * @version \$Id: application.php 2.0 {$timeString}Z tommy <tommy@doitphp.com> $
 * @package config
 * @since 1.0
 */

if (!defined('IN_DOIT')) {
    exit();
}

/**
 * 设置时区，默认时区为东八区(中国)时区(Asia/ShangHai)。
 */
//\$config['application']['defaultTimeZone'] = 'Asia/ShangHai';

/**
 * 设置URL网址的格式。
 *  Configure::GET_FORMAT为：index.php?router=controller/action&params=value;
 *  Configure::PATH_FORMAT为:index.php/controller/action/params/value。
 * 默认为：Configure::PATH_FORMAT
 */
//\$config['application']['urlFormat'] = Configure::GET_FORMAT;

/**
 * 设置是否开启URL路由网址重写(Rewrite)功能。true:开启；false:关闭。默认：关闭。
 */
//\$config['application']['rewrite'] = true;

/**
 * 设置是否开启Debug调用功能。true:开启；false:关闭。默认：关闭。
 */
//\$config['application']['debug'] = true;

/**
 * 设置是否开启日志记录功能。true:开启；false:关闭。默认：关闭。
 */
//\$config['application']['log'] = true;

/**
 * 自定义项目(application)目录路径的设置。注：结尾无需"/"，建议用绝对路径。
 */
//\$config['application']['basePath'] = APP_ROOT . '/application';

/**
 * 自定义缓存(cache)目录路径的设置。注：结尾无需"/"，建议用绝对路径。
 */
//\$config['application']['cachePath'] = APP_ROOT . '/cache';

/**
 * 自定义日志(log)目录路径的设置。注：结尾无需"/"，建议用绝对路径。
 */
//\$config['application']['logPath'] = APP_ROOT . '/logs';

/**
 * 设置视图文件的格式。Configure::VIEW_EXT_HTML为html;Configure::VIEW_EXT_PHP为php。默认为：php。
 */
//\$config['application']['viewExt'] = Configure::VIEW_EXT_HTML;

/**
 * 设置数据库(关系型数据库)的连接参数。 注：仅支持PDO连接。
 *
 * @example
 * 例一：单数据库
 * \$config['db'] = array(
 *    'dsn'      => 'mysql:host=localhost;dbname=doitphp',
 *    'username' => 'root',
 *    'password' => '123qwe',
 *    'prefix'   => 'do_',
 *    'charset'  => 'utf8',
 * );
 *
 * 例二：数据库主从分离
 * \$config['db'] = array(
 *     'master'  => array(
 *         'dsn'      => '...',
 *         'username' => '...',
 *         'password' => '...',
 *     ),
 *     'slave'   => array(
 *         'dsn'      => '...',
 *         'username' => '...',
 *         'password' => '...',
 *     ),
 *     'prefix'  => 'do_',
 *     'charset' => 'utf8',
 * );
 * 注：prefix为数据表前缀。当没有前缀时，此参数可以省略。charset为数库编码。默认值为：utf8。如编码为utf8时，此参数也可以省略。
 */
//\$config['db']['dsn'] = 'mysql:host=yourHost;dbname=yourDbname';
//\$config['db']['username'] = 'yourUsername';
//\$config['db']['password'] = 'yourPassword';
EOT;

		return File::writeFile($filePath, $fileContent);
	}

	/**
	 * 创建403错误提示文件(index.html)
	 *
	 * @access protected
	 * @return string
	 */
	protected function _create403IndexFile($dirPath) {
		$filePath = $dirPath . '/index.html';
		$fileContent = <<<EOT
<!DOCTYPE html><html><head><meta charset="utf-8"><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>Directory access is forbidden.</p></body></html>
EOT;

		return File::writeFile($filePath, $fileContent);
	}

	/**
	 * 创建403错误提示文件(.htaccess)
	 *
	 * @access protected
	 * @return string
	 */
	protected function _create403HtaccessFile($dirPath) {
		$filePath = $dirPath . '/.htaccess';
		$fileContent = <<<EOT
deny from all
EOT;

		return File::writeFile($filePath, $fileContent);
	}

	/**
	 * 创建项目应用目录(application)
	 *
	 * @access public
	 *
	 * @param boolean $isApache 服务器软件是否为apache
	 * @param boolean $hasExt 是否有扩展目录
	 * @param boolean $hasModule 是否为扩展模块目录
	 * @param boolean $hasLang 是否有多语言支持目录
	 *
	 * @return string
	 */
	public function createApplicationDir($isApache = true, $hasExt = false, $hasModule = false, $hasLang = false) {

		$appDirArray = array(
		'application',
		'application/controllers',
		'application/models',
		'application/views',
		'application/library',
		'application/widgets',
		'application/widgets/views',
		'application/config',
		);

		if ($hasExt) {
			$appDirArray[] = 'application/extensions';
		}
		if ($hasModule) {
			$appDirArray[] = 'application/modules';
		}
		if ($hasLang) {
			$appDirArray[] = 'application/language';
		}

		$webAppPath = rtrim(WEB_APP_PATH, '/').DS;

		$result = false;
		foreach ($appDirArray as $childDirName) {
			$dirPath = $webAppPath . $childDirName;
			$result = File::makeDir($dirPath);
			if (!$result) {
				return false;
			}
			//创建访问权限保护文件
			if ($isApache == true) {
				if ($childDirName == 'application') {
					$this->_create403HtaccessFile($dirPath);
				}
			} else {
				$this->_create403IndexFile($dirPath);
			}
			//创建主配置文件
			if ($childDirName == 'application/config') {
				$this->_createConfigFile();
			}
		}

		return true;
	}

	/**
	 * 创建项目仓库目录(asset)
	 *
	 * @access public
	 * @return string
	 */
	public function createAssetDir() {

		$assetDirArray = array(
		'assets',
		'assets/css',
		'assets/images',
		'assets/js',
		);

		$webAppPath = rtrim(WEB_APP_PATH, '/').DS;

		$result = false;
		foreach ($assetDirArray as $childDirName) {
			$dirPath = $webAppPath . $childDirName;
			$result = File::makeDir($dirPath);
			if (!$result) {
				return false;
			}
			//创建访问权限保护文件
			$this->_create403IndexFile($dirPath);
		}

		return true;
	}

	/**
	 * 创建项目仓库目录(cache)
	 *
	 * @access public
	 *
	 * @param boolean $isApache 服务器软件是否为apache
	 *
	 * @return string
	 */
	public function createCacheDir($isApache = false) {

		//parse cache dir array
		$cacheDirArray = array(
		'cache',
		'cache/models',
		'cache/temp',
		'cache/htmls',
		'cache/views',
		'cache/data',
		);

		$webAppPath = rtrim(WEB_APP_PATH, '/').DS;

		$result = false;
		foreach ($cacheDirArray as $childDirName) {
			$dirPath = $webAppPath . $childDirName;
			$result = File::makeDir($dirPath, 0777);
			if (!$result) {
				return false;
			}

			//创建访问权限保护文件
			if ($isApache == true) {
				if ($childDirName == 'cache') {
					$this->_create403HtaccessFile($dirPath);
				}
			} else {
				$this->_create403IndexFile($dirPath);
			}
		}

		return true;
	}

	/**
	 * 创建项目日志目录(logs)
	 *
	 * @access public
	 *
	 * @param boolean $isApache 服务器软件是否为apache
	 *
	 * @return string
	 */
	public function createLogDir($isApache = false) {

		$dirPath = rtrim(WEB_APP_PATH, '/') . DS . 'logs';

		$result = File::makeDir($dirPath);
		if (!$result) {
			return false;
		}

		(!$isApache) ? $this->_create403IndexFile($dirPath) : $this->_create403HtaccessFile($dirPath);

		return true;
	}

	/**
	 * 分析项目的根目录
	 *
	 * 当根目录不存在时，则创建根目录
	 *
	 * @access public
	 * @return string
	 */
	public function parseWebAppPath() {

		//parse webapp path
		$webAppPath = rtrim(WEB_APP_PATH, '/').DS;

		return File::makeDir($webAppPath);
	}
}