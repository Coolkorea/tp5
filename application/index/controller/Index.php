<?php
namespace app\index\controller;
use think\Controller;
use think\View;
class Stu{
	public $name = "wyh";
	public function good(){
		echo 'wyh say hello';
	}
}
class Index extends Controller
{	
	// 存储目录一般用视图模板控制器的名称保持一致
	// 即完整的存储目录为application/模块/view/控制器名称
	public function add(){
		
		//文件名称与调用的方法名称保持一致，后缀为.html文件
		
		//会渲染模板显示结果
		// return $this->fetch();
		
		// 使用助手函数渲染模板
		return view();
	}
	public function edit(){
		// 1、必须机场TP控制基类
		// return $this->fetch();
		

		// 2、使用助手函数渲染模板
		// return view();
		
		// 3、使用view类实现
		$view = new View();
		return $view->fetch();
	}

	// 渲染与方法名称不一致的模板
	public function addGoods(){
		//安装完整格式index@index/add
		//但是由于当前于宁的模块为index控制器也是index，因此可以省略
		return $this->fetch('add');
	}

	// 渲染其他控制器渲染的模板
	public function goods(){
		return $this->fetch('goods/add');
	}
	public function index(){
		// 控制器下的方法所执行的地址是index.php中
		return $this->fetch('../thinkphp/tpl/index.html');
	}

	//fetch方法的模板变量赋值
	public function assignParam(){
		$data = 'data';//程序运算的值
		// $data1 = "111111111";
		//在fetch方法中第二个参数为数组个数
		//下标为模板中使用的变量名称为具体数据
		return $this->fetch('add',['data'=>$data]);
	}
	// 使用assign赋值
	public function assignParam2(){
		$data = "data";//程序运算的值
		//assign为TP控制器基类所提供的方法
		$this->assign('data',$data);
		return $this->fetch('add');
	}
	//为模板文件分配数组
	public function assignArr(){
		$data = ['user_id'=>1,'user_name'=>'wyh'];
		$this->assign('data',$data);
		return $this->fetch();
	}
	// 实现分配对象
	public function assignObject(){
		$obj = new Stu();
		$this->assign('data',$obj);
		return $this->fetch();
	}









    // public function index()
    // {
    //     return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    // }
}
