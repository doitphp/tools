<?php
/**
 * controller method cookie数据存贮管理
 *
 * @author tommy <tommy@doitphp.com>
 * @link http://www.doitphp.com
 * @copyright Copyright (C) Copyright (c) 2012 www.doitphp.com All rights reserved.
 * @license New BSD License.{@link http://www.opensource.org/licenses/bsd-license.php}
 * @version $Id: controllerMethodStorage.php 1.0 2013-02-13 10:39:56Z tommy <tommy@doitphp.com> $
 * @package library
 * @since 1.0
 */

class controllerMethodStorage extends methodStorage {

	/**
	 * 存贮文件的名称
	 *
	 * @var string
	 */
	const METHOD_CACHE_NAME = 'doitToolsControolerMethodStorage';

	/**
	 * 分析缓存文件的路径
	 *
	 * @access protected
	 * @return string
	 */
	protected function _parseCacheFilePath() {

	    return sys_get_temp_dir() . '/' . md5(self::METHOD_CACHE_NAME);
	}
}