<?php
namespace Assess\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
/*
 * 功能：兼职者信息管理
 * 编写者：李雪
 * 修改者:高小力，加上数据分页功能,批量删除
 */

class PluralistController extends Controller
{
    /*
     * 功能：兼职者信息首页显示
     * 编写者：李雪
     * 状态：已完成
     */
    public function pluralist(){
        //字段需要：兼职者id，兼职者昵称，兼职者手机号，兼职者状态，兼职交易id，可预约时间，交易备注

        //兼职者id，兼职者昵称，（兼职状态id），兼职者手机号在pt_person_information中
        //兼职交易id，在pt_state中（根据兼职状态id查找）
        //交易时间，交易备注，在pt_trade中，（根据兼职者id查找）

        $sql = "select  pt_pid,pt_pname,pt_pphone,pt_sname,pt_trid,pt_trtime,pt_trremark 
        from pt_person_information,pt_state,pt_trade
        where pt_person_information.pt_sid = pt_state.pt_sid and pt_person_information.pt_pid = pt_trade.ci_id ";
        $pluralist=M()->query($sql);
//        $this->assign('pluralist',$pluralist);
//        $this->display();

        //1.获取记录总条数
        $count=count($pluralist);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=2;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select  pt_pid,pt_pname,pt_pphone,pt_sname,pt_trid,pt_trtime,pt_trremark 
        from pt_person_information,pt_state,pt_trade
        where pt_person_information.pt_sid = pt_state.pt_sid and pt_person_information.pt_pid = pt_trade.ci_id limit $page->firstRow,$page->listRows";
        $pluralist=M()->query($sqls);
        //dump($pluralist);
        //5.输出查询结果
        $this->assign('pluralist',$pluralist);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();

    }

    /*
     * 功能：查看兼职者详细信息
     * 编写：李雪
     * 状态：已完成
     */
    public function view(){
        $id = I('get.id');
//        dump($id);
        $sql = "select  distinct pt_pid,pt_pname,pt_pphone,pt_sname,pt_trid,pt_trtime,pt_trremark 
        from pt_person_information,pt_state,pt_trade
        where pt_person_information.pt_sid = pt_state.pt_sid and pt_person_information.pt_pid = pt_trade.ci_id 
        and pt_person_information.pt_pid=$id";
        $pluralist=M()->query($sql);
//        dump($pluralist);
        $this->assign('pluralist',$pluralist);
        $this->display();
    }

    /*
     * 功能：删除兼职者信息
     * 编写者：李雪
     *
     */
    public function delete(){
        $id = I('get.id');
//        dump($id);
        $pluralist = M('pt_person_information');
        $result = $pluralist->where("pt_pid=$id")->delete();
        if($result){
            header("Location:/assess/pluralist/pluralist");
        }
        else{
            $this->error('数据删除失败');
        }
    }

    public function destoryBatchlan(){
        $userModel = M('pt_person_information');
        $getid = I('id'); //获取选择的复选框的值
         //dump($getid);
        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("pt_pid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/assess/pluralist/pluralist');
        }
        else{
            $this->error('数据删除失败！');
        }
    }
}