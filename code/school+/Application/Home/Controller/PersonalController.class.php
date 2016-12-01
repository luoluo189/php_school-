<?php
namespace Home\Controller;

use Think\Controller;

class PersonalController extends Controller
{
    protected $_db;

    public function paddaddress(){
        $_nb=M('customer_information');
        $condition1=array();
        $condition1['ci_id']=$_GET['id'];//应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        $result1=$_nb->where($condition)->select();
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
    public function paddress(){
        $_nb=M('customer_information');
        $condition1=array();
        $condition1['ci_id']=$_GET['id'];//应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        $result1=$_nb->where($condition)->select();
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
        $condition['ci_id']=$_GET['id'];
        $result=$_db->where($condition)->select();
        $this->assign('user', $result[0]);
        $this->display();
        
    }
   
}