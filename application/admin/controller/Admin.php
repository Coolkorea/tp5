<?php  
	 namespace app\admin\controller;
	//没有继承TP控制器的基类
	//注意在没有继承的情况下使用TP控制器基类所提供的方法
	use think\View;
	use think\Controller;
	class Admin extends Controller
	{
		public function index(){
			return 'admin module';
		}
		public function getConfig(){
			//读取应用配置文件的数据
			dump(config('template'));
		}
		// 读取扩展配置文件中的数据
		public function getExtraConfig(){
			dump(config('redis'));
			dump(config('memcache.host1'));
		}
		public function getConfig2(){
			dump(config('web_name'));
		}
		public function getConfig3(){
			dump(config());
		}
		public function getModuleConfig(){
			dump(config('name'));
		}

		// 跨模块渲染
		public function fetchGoodsAdd(){
			//助手函数view
			// return view('index@goods/add');

			//直接使用view类下的fetch方法
			//$view = new View();
			//return $view->fetch('index@goods/add');

			//控制器基类下的fetch方法在模板上渲染，完全一致
			return $this->fetch('index@goods/add');
		}
	}
?>