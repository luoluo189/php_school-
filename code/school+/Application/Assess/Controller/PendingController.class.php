<?php
/**
 * Created by PhpStorm.
 * User: 高小力
 * Date: 2016/12/20
 * Time: 9:58
 */

namespace Assess\Controller;


use Think\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();

class PendingController extends Controller
{
    /*
     * 功能：商品审核信息
     * 编写者：高小力
     */
    public function goodscheck()
    {
        //商品信息
        $sql = "select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription
       from bs_type,bs_goods
       where bs_type.bs_tid=bs_goods.bs_tid and bs_gifshow=1 and if_renzheng=0";
        $bgoods = M()->query($sql);
        //dump($bgoods);
//            $this->assign('bgoods', $bgoods);
        //$this->display();

        //1.获取记录总条数
        $count=count($bgoods);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=4;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription
       from bs_type,bs_goods
       where bs_type.bs_tid=bs_goods.bs_tid and bs_gifshow=1 and if_renzheng=0 limit $page->firstRow,$page->listRows";
        $bgoods=M()->query($sqls);
        //dump($bgoods);
        //5.输出查询结果
        $this->assign('bgoods',$bgoods);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();
    }
    /*
     * 功能：商品审核信息删除
     * 编写者：高小力
     */
    public function delete(){
        $id=I('post.id');
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        $data['bs_gifshow']= 0;
        $result =$bgoods->where($dd)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }

    /*
     * 功能：商品审核信息批量删除
     * 编写者：高小力
     */
    public function destoryBatch(){
        $userModel = M('bs_goods');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("bs_gid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/index.php/assess/pending/goodscheck');
        }
        else{
            $this->error('数据删除失败！');
        }
    }
    /*
    * 功能：商品审核信息修改
    * 编写者：高小力
    */
    public function changecheck(){
        $id=$_GET['id'];
        $bgoods=M('bs_goods');
        $data['bs_gid']=$id;
        //数据库获取订单状态
        $type= $bgoods->select($id);
        $type = $type[0]['if_renzheng'];
        //dump($type);
        if($type==0){
            //echo "<script>alert('确定修改商品状态吗？');</script>";
            $data['if_renzheng'] = 1;
            $result=$bgoods->save($data);
            if($result){
                //echo "<script>alert('商品已通过审核');history.go(-1);</script>";
                header('Location:/index.php/assess/pending/goodscheck');
            }else{
                $this->error("数据修改失败");
            }


        }
    }


    /*
     * 功能：兼职信息的审核
     * 编写者：黄桃源
     * 状态：完成
     */
    public function jianzhi()
    {
        //$publisher= $_SESSION['pt_min_id'];
        $_db = M('pt_information');
        $tt=array();
        // $tt['pt_min_id']=$publisher;
        $tt['pt_ifshow']=1;
        $tt['if_renzheng']=0;
        //$pt = $_db->where($tt)->select();
        // $this->assign('pt_information',$pt);

        //分页功能
        //1.获取记录总条数
        $count=$_db->where($tt)->count();
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $pt=$_db->where($tt)->limit($page->firstRow.','.$page->listRows)->select();
        //var_dump($pt);
        //5.输出查询结果
        $this->assign('pt_information',$pt);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();

    }
    /*
     * 功能：兼职审核信息删除
     * 编写者：黄桃源
     * 状态：完成
     */
    public function deletes(){
        $id=I('post.id');
        $bgoods=M('pt_information');
        $dd['pt_inid']=$id;
        $data['pt_ifshow']= 0;
        $result =$bgoods->where($dd)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }

    /*
     * 功能：兼职审核信息批量删除
     * 编写者：黄桃源
     * 状态：完成
     */
    public function destoryBatchlans(){
        $userModel = M('pt_information');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("pt_inid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/index.php/assess/pending/jianzhi');
        }
        else{
            $this->error('数据删除失败！');
        }
    }
    /*
    * 功能：兼职审核信息修改
    * 编写者：黄桃源
    * 状态：完成
    */
    public function jianzhicheck()
    {
        $id = $_GET['id'];
        $bgoods = M('pt_information');
        $data['pt_inid'] = $id;
        //数据库获取订单状态
        $type = $bgoods->select($id);
        $type = $type[0]['if_renzheng'];
        //dump($type);
        if ($type == 0) {
            //echo "<script>alert('确定修改状态吗？');</script>";
            $data['if_renzheng'] = 1;
            $result = $bgoods->save($data);
            if ($result) {
                //echo "<script>alert('已通过审核');history.go(-1);</script>";
                header('Location:/index.php/assess/pending/jianzhi');
            } else {
                $this->error("数据修改失败");
            }
        }
    }

}