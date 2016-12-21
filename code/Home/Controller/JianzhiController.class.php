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
    public $userId=1;
	/*
	作者：尤燕飞
	功能：获取兼职列表页
	*/

	public function jianzhi(){
		 $_db=M('pt_information');
		 $c = $_db->select();
		$this->assign('c',$c);
		$this->display();
	}
	/*
	作者：尤燕飞
	功能：获取兼职详情页
	*/
	public function jianzhi_content(){
		$pt_inid['pt_inid']= $_GET['id'];
		//dump($pt_inid);
		
		$_db = M('pt_information');
		$cont = $_db->where($pt_inid)->select();
		$x['pt_min_id'] = $cont[0]['pt_min_id'];
		$this->assign('cont',$cont);
		$b = M('pt_manager_information');
		$cx = $b->where($x)->select();
		//dump($cx);
		$this->assign('cx',$cx);

		$this->display();
	}
	/*
	作者：尤燕飞
	功能：获取兼职预约页
	*/
	public function jianzhi_list(){

        $_SESSION['ci_id'] = 6;

        $ci_id = $_SESSION['ci_id'];
		
		$pt_inid['pt_inid']= $_GET['id'];
		//dump($pt_inid);
		$_db = M('pt_information');
		$cont = $_db->where($pt_inid)->select();
		//从客户表中获取$ci_id
		$pts = M('customer_information')->where("ci_id = $ci_id")->select();
		

		$this->assign('cont',$cont);
		$this->assign('pts',$pts);
		$this->display();


		
	}
	/*
	作者：尤燕飞
	功能：向数据库添加兼职交易信息
	*/
	public function add(){
	    $time = time();
		$pt_inid['pt_inid']= $_GET['id'];
		$time = date('Y-m-d H:i:s', $time);
		$data = array();

		$data['pt_inid']= $pt_inid['pt_inid'];
		$data['pt_trtime'] = $time;
		$data['pt_trremark']= I('post.pt');
		//默认交易状态
		$data['ts_id']=7;
		$data['ci_id']=1;

			if($data['pt_trremark'] && $data['pt_inid'] && $data['pt_trtime'])
			{
                $pt = M('pt_trade')->add($data);
                echo <<<STR
				<script type="text/javascript">
					alert('预约成功！');
                    window.location.href = "/index.php/home/dingdan/personal_list";
				</script>
STR;
			}
			else {
                echo "<script>alert('请先填写相关信息！');
                            window.history.go(-1);</script>";
            }
	}
}