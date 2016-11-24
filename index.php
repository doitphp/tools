<?php
/**
 * file: index.php
 *
 * application index
 * @author tommy <tommy@doitphp.com>
 * @copyright Copyright (C) 2009-2012 www.doitphp.com All rights reserved.
 * @version $Id: index.php 1.0 2012-02-12 01:14:18Z tommy $
 * @package application
 * @since 1.0
 */

define('IN_DOIT', true);

/**
 * 定义项目所在路径(根目录):APP_ROOT
 */
define('APP_ROOT', dirname(__FILE__));


/**
 * 自定义DoitPHP框架目录文件所在路径。注：结尾无需"/"。
 */
define('DOITPHP_PATH', APP_ROOT . '/../doitphp');

/**
 * 自定义所要创建及管理项目(project)的目录路径。注：结尾无需"/"。
 */
define('WEB_APP_PATH', substr(APP_ROOT, 0, -6));


/**
 * 加载DoitPHP框架的初始化文件,如果必要可以修改文件路径
 */
require_once rtrim(DOITPHP_PATH, '/') . '/DoitPHP.php';

$config = APP_ROOT . '/application/config/application.php';

/**
 * 启动应用程序(网站)进程
 */
Doit::run($config);