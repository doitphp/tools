DoitPHP Tools V2.5
=============================
DoitPHP Tools 是doitphp 的辅助开发工具，俗称“脚手架”。使用本工具，可以提高项目开发效率。

[![Build Status](http://www.doitphp.com/assets/images/doitphp_friendlink_logo.jpg)](http://www.doitphp.com)

功能
------------
1、快速创建doitphp的项目目录。
2、快速创建Controller,Model,及library类文件。
3、对项目目录及文件进行增，删，改，查的操作。


环境要求
------------
基本要求：web服务器运行的PHP版为5.1.0或更高，支持SPL(PHP标准库)。


使用方法
------------
1.设置所要开发项目的目录路径
打开入口文件：index.php

		#21 -- #29

		/**
		 * 自定义DoitPHP框架目录文件所在路径。注：结尾无需"/"。
		 */
		define('DOITPHP_PATH', APP_ROOT . '/../doitphp');

		/**
		 * 自定义所要创建及管理项目(project)的目录路径。注：结尾无需"/"。
		 */
		define('WEB_APP_PATH', substr(APP_ROOT, 0, -6));

		将DOITPHP_PATH、WEB_APP_PATH更改为实际的目录路径。

2、配置数据库连接参数
打开配置文件：application/config/application.php

		#30 -- #37

		//设置数据库连接参数
		$config['db'] = array(
			'dsn'      => 'mysql:host=localhost;dbname=yourDbname',
			'username' => 'yourUserName',
			'password' => 'yourPassword',
			'charset'  => 'utf8',
			'prefix'   => '',
		);

根据实际情况设置数据库连接参数。

3、运行 index.php 。默认登录用户名及密码分别为: doitphp, 123456
如需更改用户名及密码, 打开配置文件：application/config/application.php

		#18 -- #22

		//设置登陆用户及密码
		$config['loginUser'] = array(
			'username'=>'doitphp',
			'password'=>123456,
		);

不细说了，你们懂得。

4、如果使用DoitPHP Tools生成项目目录。生成的项目文件index.php代码需改下代码。
打开生成的index.php

		#19 -- #22

		/**
		 * 加载DoitPHP框架的初始化文件,如果必要可以修改文件路径
		 */
		require_once APP_ROOT . '/doitphp/DoitPHP.php';

		就是上面require_once的文件(DoitPHP.php)路径。如果不实，请更改一下。
		因为DoitPHP Tools独立之后，DoitPHP.php的路径相对创建的目录灵活多了。DoitPHP Tools不能准确判断出来。



注：最后再重申一下：DoitPHP Tools 仅只是在开发环境下运行的。切不可将代码传到线上服务器上啊！后果很严重。原因自己想去吧。

官方网址：
------------
如果想获取更多关于DoitPHP的信息，或查看使用文档请访问官方网址。
	
	http://www.doitphp.com/