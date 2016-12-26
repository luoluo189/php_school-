<?php
namespace Assess\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
use Think\Model;

/*
 * 功能：评价部分信息管理
 * 编写者：李雪
 * 修改者:高小力，加上数据分页功能,批量删除
 * 所用数据表：appraise
 */

class AssessController extends Controller
{
    /*
   * 功能：判断session
   * 编写者：骆静静
   * 状态：已完成
   */
    public function _before_assess(){
        if($_SESSION['loginedName']==NULL){
            $jumpUrl = '/home/';
            $this->redirect($jumpUrl);
        }
    }
    /*
     * 功能：显示后台评论主页
     * 编写者：李雪
     * 状态：已完成
     */
    public function assess(){
        //si_iddd,商家id，通过store_information找店家名(si_name)(si_iddd=si_id)
        //bs_gid,商品id，通过bs_goods找商品名(bs_gname)(bs_gid=bs_gid)
        //ci_iddd,客户id，通过customer_information找客户名(ci_name)(ci_iddd=ci_id)


//        //带模型的关联查询
//        $assess = D('appraise')->relation(true)->limit(5)->order('appr_id')->select();
//        $this->assign('assess',$assess);
//        $this->display();


        //普通查询
        $sql = "select appr_id,appr_content,appr_score,si_name,ci_name
        from appraise,store_information,customer_information
        where appraise.si_iddd=store_information.si_id and appraise.ci_iddd=customer_information.ci_id order by appr_id";
        $assess = M()->order('appr_id')->query($sql);
//        $this->assign('assess',$assess);
//        $this->display();

        //1.获取记录总条数
        $count=count($assess);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=4;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select appr_id,appr_content,appr_score,si_name,ci_name
        from appraise,store_information,customer_information
        where appraise.si_iddd=store_information.si_id and appraise.ci_iddd=customer_information.ci_id order by appr_id limit $page->firstRow,$page->listRows";
        $assess=M()->query($sqls);
        //dump($bgoods);
        //5.输出查询结果
        $this->assign('assess',$assess);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();


    }
    /*
     * 功能：查看评论详情
     * 作者：李雪
     * 状态：已完成
     */
    public function view(){
//        //带模型的关联查询
//        $id = I('get.id');
//        $assess = D('appraise')->relation(true)->where("appr_id=$id")->select();
//        $this->assign('assess',$assess);
//        $this->display();

        $id = I('get.id');
        $sql = "select appr_id,appr_content,appr_score,si_name,ci_name
        from appraise,store_information,customer_information
        where appraise.si_iddd=store_information.si_id and appraise.ci_iddd=customer_information.ci_id 
        and appr_id=$id";
        $assess = M()->query($sql);
        $this->assign('assess',$assess);
        $this->display();
    }
    /*
     * 功能：删除评论
     * 编写者：李雪
     * 状态：已完成
     */
    public function delete(){
        $id = I('get.id');
        $assess = D('appraise')->relation(true)->where("appr_id=$id")->delete();

        if ($assess) {
            //header("Location:/assess/assess/assess");
            $referer = $_SERVER['HTTP_REFERER'];
            echo "<script>alert('删除成功');document.location.href='$referer'</script>";
        } else {
            $this->error('删除失败！');
        }
    }

    public function destoryBatchlan(){
        $userModel = M('appraise');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("appr_id IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/assess/assess/assess');
        }
        else{
            $this->error('数据删除失败！');
        }
    }
}