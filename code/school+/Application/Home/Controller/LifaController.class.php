<?php
namespace Home\Controller;

use Think\Controller;

class LifaController extends Controller
{
    protected $_db;
   public function index(){
//       $this->display(dianpu);
   }
   //
    public function dianpu(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        //$name = $result[0]['si_name'];
        $this->assign('set', $result[0]);
        $this->display();

    }
  
    public function jianjie(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        $this->assign('set', $result[0]);
        $this->display();
    }
    public function yuyue(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        $this->assign('set', $result[0]);
        $this->display();
    }
    //理发列表显示正常
    public function llist(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;        
        $result=$_db->where($condition)->select();  
        $this->assign('store', $result);
        $this->display();
    }
}