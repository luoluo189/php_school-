<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
/**
 * @Author: 孙池晔
 * @Date:   2016-11-17 
 * @Last Modified by:   孙池晔
 * @Last Modified time: 2016-12-6 
 */
class LifaController extends Controller
{
    protected $_db;
   
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
    public function getyuyue()
    {

    // var_dump($result);
            $data = array();
            $data['storeid'] =I('storeid');
            $data['ci_idid']= I('ci_idid');
            $data['ts_idd'] =I('ts_idd');
            $data['hair_name'] = I('name');
            $data['hair_gender']=I('sex');
            $data['hair_number'] = I('tel');
            $data['hair_long'] = I('hair');
            $data['or_typename'] = I('haircut');
            $data['or_tdday'] = I('date');
            $data['or_tdtime'] = I('time');
            $data['hair_content'] = I('comment');
         
        // 插入到数据表中
       $_mb = M('order_trade');
       $results = $_mb->add($data);
       if ($results) {
            $this->success( '预约成功！');
        } else {
            $this->error('预约失败！');
        }
        
    }
    //理发列表显示正常
    public function index(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;        
        $result=$_db->where($condition)->select();  
        $this->assign('store', $result);
        $this->display();
    }
}