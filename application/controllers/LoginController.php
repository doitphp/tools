<?php
/**
 * 登陆及登出
 *
 * @author tommy <tommy@doitphp.com>
 * @link http://www.doitphp.com
 * @copyright Copyright (C) Copyright (c) 2012 www.doitphp.com All rights reserved.
 * @license New BSD License.{@link http://www.opensource.org/licenses/bsd-license.php}
 * @version $Id: Login.php 1.0 2013-01-11 21:53:32Z tommy <tommy@doitphp.com> $
 * @package Controller
 * @since 1.0
 */

class LoginController extends Controller {

	/**
	 * 首页
	 *
	 * 登陆表单
	 *
	 * @access public
	 * @return void
	 */
	public function indexAction() {

		$loginStatus = $this->getCookie(Configure::get('loginCookieName'));
		if ($loginStatus) {
			//当已经登陆时，直接跳转网址
			$gotoUrl = $this->_parseGotoUrl();
			$this->redirect($gotoUrl);
		}

		//display page
		$this->display();
	}

	/**
	 * ajax调用：用于处理登陆表单的数据提交
	 *
	 * @access public
	 * @return void
	 */
	public function ajaxloginAction() {

		//获取参数
		$userName = $this->post('user_name');
		$passWord = $this->post('user_password');
		if (!$userName || !$passWord) {
			$this->ajax(false, '对不起，用户名或密码不能为空');
		}

		//从配置文件中获取当前的用户名及密码
		$loginUserInfo = Configure::get('loginUser');
		if (!$loginUserInfo || !is_array($loginUserInfo)) {
			$this->ajax(false, '配置文件中登陆用户的信息设置错误');
		}

		if ($userName == $loginUserInfo['username'] && $passWord == $loginUserInfo['password']) {

			//当用户输入的用户名及密码正确
			$this->setCookie(Configure::get('loginCookieName'), true, 18000);

			//获取跳转网址
			$gotoUrl = $this->_parseGotoUrl();

			$this->ajax(true, '登陆成功！', array('targetUrl'=>$gotoUrl));
		}

		$this->ajax(false, '对不起，输入的用户名或密码错误');
	}

	/**
	 * 登出（用户登陆注销）
	 *
	 * @access public
	 * @return void
	 */
	public function logoutAction() {

		//cookie重值
		$this->setCookie(Configure::get('loginCookieName'), false);
		$this->setCookie(Configure::get('gotoUrlCookieName'), null);

		//跳转至登陆页面
		$this->redirect($this->getActionUrl('index'));
	}

	/**
	 * 前函数(方法)
	 *
	 * @access public
	 * @return boolean
	 */
	public function init() {

		//assign params
		$this->assign(array(
		'baseImageUrl'  => $this->getAssetUrl('images'),
		'baseScriptUrl' => $this->getAssetUrl('js'),
		));

		return true;
	}

	/**
	 * 分析跳转网址
	 *
	 * @access protected
	 * @return void
	 */
	protected function _parseGotoUrl() {

		$gotoUrl = $this->getCookie(Configure::get('gotoUrlCookieName'));
		$gotoUrl = (!$gotoUrl) ? $this->createUrl(DEFAULT_CONTROLLER . '/' . DEFAULT_ACTION) : $gotoUrl;

		return $gotoUrl;
	}
}