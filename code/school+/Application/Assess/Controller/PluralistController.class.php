<?php
namespace Assess\Controller;
use Think\Controller;
/*
 * 功能：兼职者信息管理
 * 编写者：李雪
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
        $this->assign('pluralist',$pluralist);
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
}