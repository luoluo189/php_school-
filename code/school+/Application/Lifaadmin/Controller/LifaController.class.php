<?php
namespace Lifaadmin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
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

        $this->assign('storeid',$_SESSION['si_id']);
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

        //dump($data);

        // 插入到数据表中
        $_db = M('order_time_pmun');
        $result = $_db->add($data);

        //善后处理
        if ($result) {
           // $this->success( '表数据插入成功！');
            header('Location:/index.php/Lifaadmin/lifa/managelifa');
        } else {
            $this->error('表数据插入失败！');
        }
    }
    
    /*
     * 功能：管理理发预约页面
     * 编写者：骆静静
     * 修改者：高小力，加数据分页功能
     * 状态：succeed
     */
    public function managelifa()
    {
        $_db=M('order_time_pmun');
        $condition=array();
        $condition['si_idddd']=$_SESSION['si_id'];;
        $condition['ot_ifshow']='1';
        $result=$_db->where($condition)->select();
//        $this->assign('store', $result);
//        $this->display();

        //1.获取记录总条数
        $count=count($result);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $result=$_db->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        //5.输出查询结果
        $this->assign('store',$result);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
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
     * 功能：批量删除
     * 编写者：高小力
     * 状态：succeed
     */
    public function destoryBatchlan(){
        $userModel = M('order_time_pmun');
        $getid = I('id'); //获取选择的复选框的值
        dump($getid);
        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("ot_pnid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/index.php/Lifaadmin/lifa/managelifa');
        }
        else{
            $this->error('数据删除失败！');
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
            //$this->success( '修改成功！','managelifa',1);
            header('Location:/index.php/Lifaadmin/lifa/managelifa');
        } else {
            $this->error('修改失败！','managelifa',1);
        }
    }
 
    /*
     * 功能：理发预约订单页面的显示
     * 编写者：骆静静
     * 修改者：高小力 加数据分页
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
//        $this->assign('dingdans', $result);
//        $this->display();
        //1.获取记录总条数
        $count=count($result);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $result=$_db->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        //5.输出查询结果
        $this->assign('dingdans',$result);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
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
    * 功能：批量删除
    * 编写者：高小力
    * 状态：succeed
    */
    public function destoryBatchlans(){
        $userModel = M('order_trade');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("or_tdid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            //header('Location:/admin/lan/lan');
            header('Location:/index.php/Lifaadmin/lifa/dingdan');
        }
        else{
            $this->error('数据删除失败！');
        }
    }


    /*
     * 功能：订单状态的修改
     * 编写者：骆静静
     * 修改者：孙池晔
     * 状态：succeed

     */
    /*
     * 功能：完成订单
     * 编写者：骆静静
     * 修改者：孙池晔
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
            echo "<script>alert('订单已经取消不能确定呢！') ;history.go(-1);</script>";

        }
        elseif($type==2){
            echo "<script>history.go(-1);</script>";
        }
        else{
            echo "<script>alert('确定完成订单吗？');</script>";
            $data['ts_idd'] = 2;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";
        }
    }
    /*
        * 功能：取消订单
        * 编写者：骆静静
        * 修改者：孙池晔
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
            echo "<script>alert('订单已经确定不能取消呢！') ;history.go(-1);</script>";

        }
        elseif($type==1){
            echo "<script>history.go(-1);</script>";
        }
        else{
            echo "<script>alert('确定取消订单吗？');</script>";
            $data['ts_idd'] = 1;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";
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