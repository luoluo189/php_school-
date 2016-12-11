<?php
namespace Lifaadmin\Controller;

use Think\Controller;

class LifaController extends Controller
{

    public function index()
    {

    }

    /*
     * 功能：添加理发预约页面addlifa
     * 编写者：骆静静
     * 状态：succeed
     */
    public function addlifa(){
        $storeid= 2;
        $this->assign('storeid',$storeid);
        $this->display();
    }
    /*
     * 功能：添加理发预约控制器
     * 编写者：骆静静
     * 状态：succeed
     */
    public function theadd(){
        // 获取POST数据
        $data = I('post.');

        dump($data);

        // 插入到数据表中
        $_db = M('order_time_pmun');
        $result = $_db->add($data);
        
        //善后处理
        if ($result) {
            $this->success( '表数据插入成功！');
        } else {
            $this->error('表数据插入失败！');
        }
    }
    
    /*
     * 功能：管理理发预约页面
     * 编写者：骆静静
     * 状态：succeed
     */
    public function managelifa()
    {
        $_db=M('order_time_pmun');
        $storeid=2;
        $condition=array();
        $condition['si_idddd']=$storeid;
        $condition['ot_ifshow']='1';
        $result=$_db->where($condition)->select();
        $this->assign('store', $result);
        $this->display();
    }

    /*
     * 功能：软删除理发可预约信息
     * 编写者：骆静静
     * 状态：succeed
     */
    public function deletelifa(){
            $id=I('post.id');
//        $id=7;
            $_db=M('order_time_pmun');
            $tt['ot_pnid']=$id;
            $data['ot_ifshow']=0;
            $result =$_db->where($tt)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }
    
    /*
     * 功能：理发预约信息的显示
     * 编写者：骆静静
     * 状态：succeed
     */
    public function changelifa()
    {
        $id=$_GET['id'];
        $_db=M('order_time_pmun');
        $condition['ot_pnid']=I('get.id');
        $condition['ot_ifshow']=1;
        $result=$_db->where($condition)->select();
//        dump($result);
        $this->assign('news', $result[0]);
        $this->display();
    }
    
    /*
     * 功能：提交理发预约修改信息
     * 编写者：骆静静
     * 状态：succeed
     */
    public function toChangeLifa(){
        $data= I('post.');
        $_db=M('order_time_pmun');
        $result = $_db->save($data);
        if ($result) {
            $this->success( '修改成功！','managelifa',1);
        } else {
            $this->error('修改失败！','managelifa',1);
        }
    }
 
    /*
     * 功能：理发预约订单页面的显示
     * 编写者：骆静静
     * 状态：succeed
     */
   public function dingdan()
    {
        $storeid=2;
        $id=$storeid;
        $_db=M('order_trade');
        $condition['storeid']=$id;
        $condition['or_ifshow']=1;
        $result=$_db->where($condition)->select();
//      dump($result);
        $this->assign('dingdans', $result);
        $this->display();
    }
    
    /*
     * 功能：理发预约详情页
     * 编写者：骆静静
     * 状态：succeed
     */
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
    
    /*
     * 功能：软删除理发预约订单
     * 编写者：骆静静
     * 状态：succeed
     */
    public function deletelifadan(){

        $id=I('post.id');
        $_db=M('order_trade');
        $tt['or_tdid']=$id;
        $data['or_ifshow']=0;
        $result =$_db->where($tt)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }
    /*
     * 功能：订单状态的修改
     * 编写者：骆静静
     * 状态：succeed
     */
        /*
         * 功能：完成订单
         * 编写者：骆静静
         * 状态：succeed
         */
    public function danConfirm()
    {//完成订单——改为2

        $id=$_GET['id'];
        $_db=M('order_trade');
        $data['or_tdid']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_idd'];

        //判断订单的状态订单取消后不可以再次确定
       if($type== 1){
        // 要修改的数据对象属性赋值
           $this->error('订单已经取消不能确定呢！','dingdan',2);

       }
       elseif($type==2){
           $this->error('订单已经是确定状态啦！','dingdan',2);
       }
       else{
           $data['ts_idd'] = 2;
           $_db->save($data);
           $this->success('完成订单成功！','dingdan',2);
       }
    }
    /*
        * 功能：取消订单
        * 编写者：骆静静
        * 状态：succeed
        */
    public function danCancel(){
        $id=$_GET['id'];
        $_db=M('order_trade');
        $data['or_tdid']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_idd'];

        //判断订单的状态订单取消后不可以再次确定
        if($type== 2){
            // 要修改的数据对象属性赋值
            $this->error('订单已经确定不能取消呢！','dingdan',2);

        }
        elseif($type==1){
            $this->error('订单已经是取消状态啦！','dingdan',2);
        }
        else{
            $data['ts_idd'] = 1;
            $_db->save($data);
            $this->success('取消订单成功。。。','dingdan',2);
        }
    }
    /*
        * 功能：删除订单
        * 编写者：骆静静
        * 状态：succeed
        */
    public function danDelete(){
        $id=I('post.id');
        $_db=M('order_trade');
        $tt['or_tdid']=$id;
        $data['or_ifshow']=0;
        $result =$_db->where($tt)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }

}