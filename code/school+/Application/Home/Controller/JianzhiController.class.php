<?php


/*
作者：尤燕飞
功能：实现兼职模块的动态获取
日期：12.7
*/
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;

class JianzhiController extends controller{
	public function jianzhi(){
		 $_db=M('pt_information');
		 $c = $_db->select();
		$this->assign('c',$c);
		$this->display();
	}
	public function jianzhi_content(){
		$pt_inid['pt_inid']= $_GET['id'];
		//dump($pt_inid);
		
		$_db = M('pt_information');
		$cont = $_db->where($pt_inid)->select();
		$x['pt_min_id'] = $cont[0][pt_min_id];
		$this->assign('cont',$cont);
		$b = M('pt_manager_information');
		$cx = $b->where($x)->select();
		//dump($cx);
		$this->assign('cx',$cx);

		$this->display();
	}
	public function jianzhi_list(){
		$pt_inid['pt_inid']= $_GET['id'];
		//dump($pt_inid);
		$_db = M('pt_information');
		$cont = $_db->where($pt_inid)->select();
		$this->assign('cont',$cont);
		$this->display();
		
	}

}