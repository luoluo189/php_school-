<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Controller;

class PersonalController extends Controller
{
    protected $_db;
    protected function _initialize() {
//       layout(false);
    }
    public function paddaddress(){
        $_nb=M('customer_information');
        $condition1=array();
        $condition1['ci_id']=$_GET['id'];
        //应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        //暂时设置id为1
        $result1=$_nb->where($condition1)->select();
        $this->assign('user', $result1[0]);
        //获得地址数据表
        $_db=M('customer_address');
        $_mb=$_db->table('customer_information')->select();
        $condition=array();
        $condition['ci_idd']=$_GET['id'];
        $result=$_db->where($condition)->select();
        $this->assign('address', $result);
        $this->display();
    }
    public function getpaddress(){
        layout(false);
        $data = array();
        $data['ca_name'] = I('ca_name');
        $data['ca_phone'] = I('ca_phone');
        $data['ca_address'] = I('ca_address');
        $data['ci_idd'] = I('ci_idd');
        //var_dump($data);
        $_mb = M('customer_address');
        $results = $_mb->add($data);
        if ($results) {
            $this->success( '添加成功！');
        } else {
            $this->error('添加失败！');
        }
    }
    public function paddress(){
        layout(false);
        $_nb=M('customer_information');
        $condition1=array();
        $condition1['ci_id']=$_GET['id'];//应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        $result1=$_nb->where($condition1)->select();
        $this->assign('user', $result1[0]);
        //var_dump($_GET['id']);
        //获得地址数据表
        $_db=M('customer_address');
        $_mb=$_db->table('customer_information')->select();
        $condition=array();
        $condition['ci_idd']=$condition1['ci_id'];
        $result=$_db->where($condition)->select();

        $this->assign('address', $result);
        $this->display();
    }

    /*
     * 编辑部分未完成
     */
    public function pchangeaddress(){

    }
    public function pset(){

        $_db=M('customer_information');
        $condition=array();
        $condition['ci_id']=$_GET['id'];
        $result=$_db->where($condition)->select();
        $this->assign('user', $result[0]);
        $this->display();
    }
    public function personal(){
        $_db=M('customer_information');
        $condition=array();
        $condition['openid']=$_COOKIE['openid'];
        $result=$_db->where($condition)->select();
        $result[0]['headimgurl']=$_COOKIE['headimgurl'];
//        dump($_COOKIE['headimgurl']);
        $this->assign('user', $result[0]);

//        dump($_SESSION);
        $this->display();
    }

}