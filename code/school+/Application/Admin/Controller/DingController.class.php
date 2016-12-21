<?php
/*
    * 功能：商品类订单
    * 编写者：高小力
 */
namespace Admin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;

class DingController extends Controller
{
    /*
    * 功能：显示商品类订单
    * 编写者：高小力
    * 修改者：ljj* 添加了判断ifshow=1
    * 状态：succeed
    */
    public function ding()
    {
         //选择交易状态分类
        $id=$_SESSION['si_id'];
        $sql="select ts_name
            from store_information,trade_state
            where si_id= $id and store_information.s_type_id=trade_state.s_type_idd";
        $tstate=M()->query($sql);
        //dump($tstate);
        $this->assign('tstate',$tstate);

        //订单信息
        $sqls="select bs_tr_id,ci_name,bs_tr_xtime,ts_name,bs_tr_way
        from bs_trade,trade_state,customer_information
        where bs_trade.ts_iddd=trade_state.ts_id and bs_trade.ci_id5=customer_information.ci_id and bs_sid=1 and bs_trade.ifshow=1";
        $tstates=M()->query($sqls);
        //dump($tstates);
//        $this->assign('tstates',$tstates);
//        $this->display();

        //1.获取记录总条数
        $count=count($tstates);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sql1 = "select bs_tr_id,ci_name,bs_tr_xtime,ts_name,bs_tr_way
        from bs_trade,trade_state,customer_information
        where bs_trade.ts_iddd=trade_state.ts_id and bs_trade.ci_id5=customer_information.ci_id and bs_sid=1 and bs_trade.ifshow=1 limit $page->firstRow,$page->listRows";
        $tstates=M()->query($sql1);
        //dump($tstates);
        //5.输出查询结果
        $this->assign('tstates',$tstates);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();
    }

    /*
    * 功能：显示商品类订单的详细信息
    * 编写者：高小力
    * 状态：succeed
    */
    public function dingview()
    {
        $id=I('get.id');
        //dump($id);
        //获取商品信息
        $sql="select bs_gname,bs_gprice,bs_mgnum
        from bs_goods,bs_many_goods
        where bs_goods.bs_gid= bs_many_goods.bs_giddd and bs_tr_id=$id";
        $shangpin=M()->query($sql);
        //dump($shangpin);
        $this->assign('shangpin',$shangpin);

        $num=count($shangpin)+1;
        //dump($num);
        $this->assign('num',$num);


        //获取用户姓名
        $sqls="select bs_tr_id,ci_name
        from customer_information,bs_trade
        where bs_trade.ci_id5=customer_information.ci_id and bs_tr_id=$id";
        $name=M()->query($sqls);//二维数据
        $name=$name[0];
        //dump($name);
        $this->assign('name',$name);

        $dd['bs_tr_idd']=$id;
        //dump($dd);
        $btin=M('bs_trade_information');
        $btin=$btin->where($dd)->select();
        $btin=$btin[0];
//        dump($btin);
        $this->assign('btin',$btin);

        $this->display();

    }
    /*
    * 功能：软删除商品订单
    * 编写者：高小力
    * 修改者：ljj* 添加了判断ifshow=1实现软删除和ajax的实现
    * 状态：succeed
    */
    public function delete(){
        $id =I('post.id');
        dump($id);
        $btrade=M('bs_trade');
        $dd['bs_tr_id']=$id;
        $data['ifshow']=0;
        //dump($dd);
        $result =$btrade->where($dd)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }

    /*
        * 功能：批量删除
        * 编写者：安垒
        * 状态：succeed
        */

    public function destoryBatchding()
    {
        $userModel = M('bs_trade');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("bs_tr_id IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/index.php/admin/ding/ding');
        }
        else{
            $this->error('数据删除失败！');
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
        $_db=M('bs_trade');
        $data['bs_tr_id']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_iddd'];
        //判断订单的状态订单取消后不可以再次确定
        if($type== 5){
            // 要修改的数据对象属性赋值
            echo "<script>alert('订单已经取消不能确定呢！') ;history.go(-1);</script>";

        }
        elseif($type==6){
//            订单已经确定
            echo "<script>history.go(-1);</script>";

        }
        else{
            echo "<script>alert('确定完成订单吗？');</script>";
            $data['ts_iddd'] = 6;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";

        }
    }
    /*
     * 功能：取消订单
     * 编写者：骆静静
     * 状态：succeed
     */
    public function danCancel(){
        $id=$_GET['id'];
        $_db=M('bs_trade');
        $data['bs_tr_id']=$id;

        //数据库获取订单状态
        $type= $_db->select($id);
        $type = $type[0]['ts_iddd'];

        //判断订单的状态订单取消后不可以再次确定
        if($type== 6){
            // 要修改的数据对象属性赋值
            echo "<script>alert('订单已经确定不能取消呢！') ;history.go(-1);</script>";

        }
        elseif($type==5){
            echo "<script>history.go(-1);</script>";
        }
        else{
            echo "<script>alert('确定取消订单吗？');</script>";
            $data['ts_iddd'] = 5;
            $_db->save($data);
            echo "<script>history.go(-1);</script>";
        }
    }


}