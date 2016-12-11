<?php
namespace Home\Controller;

use Think\Controller;

class PersonalController extends Controller
{
    protected $_db;
    protected function _initialize() {
       layout(false);
   }
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
        $result1=$_nb->where($condition)->select();
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
    public function pchangeaddress(){
        // layout(false);
        // $_db=M('customer_address');
        // $condition=array();
        // $condition['ci_idd']=$_GET['id'];
        // $condition['ca_id'] = $_GET['id'];
        // $id=$_db->where($condition)->select();
        // var_dump($id);
        // $data = array();
        // $data['ca_name'] = I('ca_name');
        // $data['ca_phone'] = I('ca_phone');
        // $data['ca_address'] = I('ca_address');
        // $data['ci_idd'] = I('ci_idd');
       // var_dump($data);
       //  $_mb = M('customer_address');
       // $results = $_mb->add($data);
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