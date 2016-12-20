<?php
namespace ParttimeJobAdmin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;


class ParttimejobController extends Controller
{

    /*
    * 功能：显示首页兼职发布者的信息（index页面）（成功）
    * 编写者：李雪
    * 状态：succeed
    */
    public function index(){

        $condition['pt_min_id'] = 1;
        $result = M('pt_manager_information')->where($condition)->select();
        $this->assign('pt_manager_information',$result);
        $this->display();
    }

    /*
    * 功能：添加兼职页面的显示
    * 编写者：李雪
    * 状态：succeed
    */
    public function add(){
        $partowerid= 1;
        $this->assign('pt_min_id',$partowerid);
        $this->display();
    }


    /*
  * 功能：查看兼职订单信息（order页面）（成功）
  * 编写者：李雪
  * 修改：骆静静修改 添加发布者id判断字段 
  * 状态：succeed
  */
    public function order(){

        $id=1;
        $sql = "select distinct pt_min_id, pt_trid,pt_pname,pt_inname,pt_pphone,pt_trtime,pt_inabstract
        from pt_trade,pt_information,pt_person_information,pt_state
        where pt_trade.ci_id=pt_person_information.pt_pid and pt_information.pt_inid=pt_trade.pt_inid 
        and pt_state.pt_sid=pt_person_information.pt_sid and pt_information.pt_min_id=$id";
        $order=M()->query($sql);
//        $this->assign('order',$order);
////        dump($order);
//        $this->display();

        //1.获取记录总条数
        $count=count($order);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=2;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select distinct pt_min_id, pt_trid,pt_pname,pt_inname,pt_pphone,pt_trtime,pt_inabstract
        from pt_trade,pt_information,pt_person_information,pt_state
        where pt_trade.ci_id=pt_person_information.pt_pid and pt_information.pt_inid=pt_trade.pt_inid 
        and pt_state.pt_sid=pt_person_information.pt_sid and pt_information.pt_min_id=$id limit $page->firstRow,$page->listRows";
        $order=M()->query($sqls);
        //dump($bgoods);
        //5.输出查询结果
        $this->assign('order',$order);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();
    }



     /*
      * 功能：管理兼职信息之修改（edit页面）（成功）
      * 编写者：李雪
      * 状态：succeed
      */
    public function edit(){
        if(isset($_POST['submit'])){//如果提交了信息
            $pt_inid['pt_inid']=I('get.id');
            $data = I('post.');
            //提交数据到数据库
            if(M('pt_information')->where($pt_inid)->save($data)){
                $this->success('数据更新成功！','/ParttimejobAdmin/parttimejob/manage/');
            }
            else{
                $this->error('插入失败！');
            }
        }
        else{
            //获取要编辑的订单
            $pt_inid=I('id');
            $pt = M('pt_information')->find($pt_inid);
            //分配用户到编辑订单页面
            $this->assign('pt',$pt);
            //显示编辑表单页
            $this->display();

        }
    }



    /*
     * 功能：修改首页用户信息（editor页面）（成功）
     * 编写者：李雪
     * 状态：succeed
     */    
    public function editor(){
        if(isset($_POST['submit'])){
            //如果点击了提交
            $data=array();
            $data=I('post.');
            if(M('pt_manager_information')->where('pt_min_id=1')->save($data)){
                $this->success('数据插入成功', '/ParttimejobAdmin/parttimejob/index/');
            }
            else{
                $this->error('数据插入失败');
            }
        }
        else{
            //获取要编辑的用户
            $pt_min_id=1;
            $pt_manager = M('pt_manager_information')->where($pt_min_id)->find($pt_min_id);
            //分配用户到编辑用户页面
            $this->assign('pt_manager',$pt_manager);
            //显示编辑用户表单页
            $this->display();
        }
    }
    /*
     * 功能：管理兼职订单（order页面）之查看详情选项（已完成）
     * 编写者：李雪
     * 修改：骆静静（兼职者备注不正确）
     * 状态：succeed
     */
    public function view(){
        $pt_trid = I('get.id');
        $sql = "select distinct pt_trid,pt_pname,pt_inname,pt_pphone,pt_trtime,pt_trremark
        from pt_trade,pt_information,pt_person_information,pt_state
        where pt_trade.ci_id=pt_person_information.pt_pid and pt_information.pt_inid=pt_trade.pt_inid
        and pt_state.pt_sid=pt_person_information.pt_sid and pt_trid=$pt_trid and pt_trifshow=1";
        $orders = M()->query($sql);
        $this->assign('orders',$orders);
        $this->display();
    }

    /*
       * 功能：管理兼职订单（order页面）之删除页面
       * 编写者：李雪
       * 修改：骆静静（兼职者备注不正确）
       * 状态：succeed
       */

    /*
     * 功能：管理已发布兼职（manage页面）（成功）
     * 编写者：李雪
     * 修改：骆静静添加发布者id还有ifshow
     * 状态：succeed
     */
    public function manage(){
        $publisher=1;
        $_db = M('pt_information');
        $tt=array();
        $tt['pt_min_id']=$publisher;
        $tt['pt_ifshow']=1;
        $pt = $_db->where($tt)->select();
        $this->assign('pt_information',$pt);
        $this->display();
    }

    /*
     * 功能：添加已发布兼职（manage页面）（成功）
     * 编写者：李雪
     * 修改：骆静静 添加隐藏域（succeed）
     * 状态：succeed
     */
    public function addAction(){

        $data=I('post.');
//dump($data);
        $jianzhi = M('pt_information');
        $result = $jianzhi->add($data);
//        dump($result);exit;
        if($result){
            $this->success('数据插入成功！','add');
        }
        else{
            $this->error('失败');
        }

    }
    /*
     * 功能：管理已发布兼职之删除（不成功）
     * 编写者：李雪
     * 修改：骆静静 软删除
     * 状态：succeed
     */
    public function deletemange(){
        $id =I('get.id');
//$id=2;
        dump($id);

        $_db = M('pt_information');
        $tt['pt_inid']=$id;
        $data['pt_ifshow']=0;
        $result=$_db->where($tt)->save($data);
//dump($result);
        if($result){
            $this->success('删除成功','/ParttimejobAdmin/parttimejob/manage');
        }
        else{
            $this->error('删除失败');
        }
    }





    /*
     * 功能：雇佣状态的修改
     * 编写者：孙池晔
     * 状态：succeed
     */
    /*
     * 功能：取消雇佣关系
     * 编写者：孙池晔
     * 状态：succeed
     */

    public function employCancel()
    {//完成订单——改为2

        $id=$_GET['id'];
        $_db=M('pt_trade');
        $data['pt_trid']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_id'];
        //判断订单的状态订单取消后不可以再次确定
        if($type== 9){
            // 要修改的数据对象属性赋值
            echo "<script>alert('已经同意雇佣！');history.go(-1);</script>";

        }
        elseif($type==10){

            echo "<script>alert('已经取消预约！');history.go(-1);</script>";

        }
        elseif($type==12){
            echo "<script>history.go(-1);</script>";
        }
        else{
            echo "<script>alert('确定取消雇佣吗？');</script>";
            $data['ts_id'] = 12;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";

        }
    }

    /*
     * 功能：完成雇佣
     * 编写者：孙池晔
     * 状态：succeed
     */

    public function employConfirm()
    {//完成订单——改为2

        $id=$_GET['id'];
        $_db=M('pt_trade');
        $data['pt_trid']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_id'];
        //判断订单的状态订单取消后不可以再次确定
        if($type== 9){
            // 要修改的数据对象属性赋值
            echo "<script>history.go(-1);</script>";

        }
        elseif($type==10){

            echo "<script>alert('已经取消预约！');history.go(-1);</script>";

        }
        elseif($type==12){
            echo "<script>alert('已经取消雇佣！');history.go(-1);</script>";
        }
        else{
            echo "<script>alert('雇佣关系已经确认！');</script>";
            $data['ts_id'] = 9;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";

        }
    }
   

   /*
     * 功能：取消预约
     * 编写者：孙池晔
     * 状态：succeed
     */
    public function ordCancel()
    {//完成订单——改为2

        $id=$_GET['id'];
        $_db=M('pt_trade');
        $data['pt_trid']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_id'];
        //判断订单的状态订单取消后不可以再次确定
        if($type== 9){
            // 要修改的数据对象属性赋值
            echo "<script>alert('已经同意雇佣！');history.go(-1);</script>";

        }
        elseif($type==10){

            echo "<script>history.go(-1);</script>";

        }
        elseif($type==12){
            echo "<script>alert('已经取消雇佣！');history.go(-1);</script>";
        }
        else{
            echo "<script>alert('确认取消预约？');</script>";
            $data['ts_id'] = 13;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";

        }
    }
}