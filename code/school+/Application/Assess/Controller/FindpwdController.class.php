<?php
namespace Assess\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
use Think\Model;

/*
 * 功能：找回密码信息管理
 * 编写者：孙池晔
 * 状态：已完成
 */

class FindpwdController extends Controller
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
    * 功能：显示店家找回密码信息
    * 编写者：孙池晔
    * 状态：已完成
    */
    public function index(){
    	//普通查询
        $sql = "select id,s_type_name,s_type,si_name,st_pon,si_phone,idnumber from findpwd,store_type where findpwd.s_type=store_type.s_type_id";
        $assess = M()->order('id')->query($sql);

        //1.获取记录总条数
        $count=count($assess);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=2;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select id,s_type_name,s_type,si_name,st_pon,si_phone,idnumber from findpwd,store_type where findpwd.s_type=store_type.s_type_id order by id limit $page->firstRow,$page->listRows";
        $assess=M()->query($sqls);
       
        //5.输出查询结果
        $this->assign('find',$assess);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();

    }
    

    /*
    * 功能：查看店家找回密码信息
    * 编写者：孙池晔
    * 状态：已完成
    */
    public function view(){

        $id = I('get.id');
        $sql = "select id,s_type_name,s_type,si_name,st_pon,si_phone,idnumber from findpwd,store_type where findpwd.s_type=store_type.s_type_id and id=$id";
        $assess = M()->query($sql);
        $this->assign('assess',$assess);
        $this->display();
    }
    /*
     * 功能：删除信息
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function delete(){
        $id = I('get.id');
        $assess = D('findpwd')->where("id=$id")->delete();
       
        if ($assess) {
            header('Location:/assess/findpwd/index');
        } else {
            $this->error('删除失败！');
        }
    }
    /*
     * 功能：批量删除信息
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function destoryBatchlan(){
        $userModel = M('findpwd');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("id IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/assess/findpwd/index');
        }
        else{
            $this->error('数据删除失败！');
        }
    }
}