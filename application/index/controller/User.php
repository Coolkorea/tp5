<?php 
	//1、申请命名空间 默认需要根据目录名称编写application\index\controller,但是由于TP框架在执行过程中重写了
	//application目录的命名空间为app
	namespace app\index\controller;
	// 2、namespace 控制器基类  此步骤并非必须
	use think\Controller;
	use think\Config;//为什么从think开始？直接使用类名称调用方法一定要先use
	//

	// 类名称需要与控制器的名称一样
	class User extends Controller{

		// 编写自定义的方法
		public function index(){
			// tp5中返回结果推荐使用return 返回并不推荐使用echo直接输出
			// 使用return 的原因是在TP源中当调用方法时，可以接收到方法返回的结果，再次对数据进行格式化处理
			return 'return Controller index action';
		}
		public function readConfig(){
			//获取config配置文件中app_namespace配置
			//$app_namespace = Config::get("app_namespace");
			//var_dump($app_namespace);
			//读取二级配置   最多支持二级配置  即点只能写一次
			 //$type = Config::get('cache.type');
			 //var_dump($type);
			// //读取所有的配置信息
			 $all = Config::get();
			 var_dump($all);
		}
		// 使用助手函数读取配置信息
		// config获取和设置配置参数
		public function readConfigUseFuncion(){
			// var_dump(config('app_namespace'));
			// var_dump(config('cache.type'));
			// var_dump(config());
			dump(config('database'));
		}
		// 动态修改配置
		// 修改配置信息注意，只是临时修改而已，不会修改到变量的文本中本身的内容
		public function writeConfig(){
			//使用config类下的set方法
			Config::set('database.database','mysql');
			//使用助手函数
			config('database.password','root');
			//dump为TP中内置的助手函数用于方便查看数据，等价于echo '<pre>';var_dump(数据)
			dump(config('database'));
		}
		public function getModuleConfig(){
			dump(config('name'));
		}

	}
 ?>