<?php
namespace Lifaadmin\Controller;

use Think\Controller;

class LifaController extends Controller
{
//    public function __construct()
//    {
//        
//    }

    public function index()
    {
      
        $this->redirect('seller');
    }
//添加理发预约订单succeed
    public function addlifa(){
        $storeid= 2;
        $this->assign('storeid',$storeid);
        $this->display();
    }
    public function theadd(){
        // 获取POST数据
        $data = I('post.');

        dump($data);

        // 插入到数据表中
        $_db = M('order_time_pmun');
        $result = $_db->add($data);


//        $sql="INSERT INTO `school`.`order_time_pmun` (`ot_pnid`, `ot_pntime`, `ot_pnpnum`, `ot_type`, `si_idddd`) VALUES (NULL, $data[ot_pntime], $data[ot_pnpnum], $data[ot_type], $data[si_idddd]);";
//        $_db =M('order_time_pmun');
//        $result = $_db->execute($sql);
//         善后处理
        if ($result) {
            $this->success( '表数据插入成功！');
        } else {
            $this->error('表数据插入失败！');
        }
//        $this->display();
    }

    public function managelifa()
    {
        $_db=M('order_time_pmun');
        $storeid=2;
        $condition=array();
        $condition['si_idddd']=$storeid;
        $result=$_db->where($condition)->select();
        $this->assign('store', $result);
        $this->display();
    }

//    删除理发可预约信息succeed
    public function deletelifa(){
            $id=I('post.id');
            $_db=M('order_time_pmun');
            $tt['ot_pnid']=$id;
            $result =$_db->where($tt)->delete();
    }
//    getchange理发预约信息的显示succeed
    public function changelifa()
    {
        $id=$_GET['id'];
        $_db=M('order_time_pmun');
        $condition['ot_pnid']=I('get.id');
        $result=$_db->where($condition)->select();
//        dump($result);
        $this->assign('news', $result[0]);
        $this->display();
    }
//    提交理发预约修改信息succeed
    public function toChangeLifa(){
//             dump("toChangeLifa");
        $data= I('post.');
        $_db=M('order_time_pmun');
        $result = $_db->save($data);
        if ($result) {
            $this->success( '修改成功！','managelifa',1);
        } else {
            $this->error('修改失败！','managelifa',1);
        }
    }
//    订单页面的显示succeed
    public function dingdan()
    {
        $storeid=2;
        $id=$storeid;
        $_db=M('order_trade');
        $condition['storeid']=$id;
        $result=$_db->where($condition)->select();
//        dump($result);
        $this->assign('dingdans', $result);
        $this->display();
    }
    public function seedingdan()
    {
        $id=$_GET['id'];
        $_db=M('order_trade');
        $condition['or_tdid']=I('get.id');
        $result=$_db->where($condition)->select();
//        dump($result);
        $this->assign('lifadan', $result[0]);
        $this->display();
    }

//       echo "删除理发订单";succeed
    public function deletelifadan(){

        $id=I('post.id');
        $_db=M('order_trade');
        $tt['or_tdid']=$id;
        $result =$_db->where($tt)->delete();
    }

//    订单状态的修改
    //确认订单
    public function danConfirm(){
        $id=$_GET['id'];
        $_db=M('order_trade');

        // 实例化User对象
        //// 要修改的数据对象属性赋值
        $data['or_tdid']=$id;
        $data['ts_idd'] = 2;
        $_db->save($data);
        $this->redirect('dingdan');
    }
    //    取消订单
    public function danCancel(){
        $id=$_GET['id'];
        $_db=M('order_trade');
        $data['or_tdid']=$id;
        $data['ts_idd'] = 1;
        $_db->save($data);
        $this->redirect('dingdan');
    }
    //删除订单
    public function danDelete(){
        $id=$_GET['id'];
        $_db=M('order_trade');
        $tt['or_tdid']=$id;
        $result =$_db->where($tt)->delete();
        $this->redirect('dingdan');
    }

}