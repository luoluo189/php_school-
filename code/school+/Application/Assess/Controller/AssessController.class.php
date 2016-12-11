<?php
namespace Assess\Controller;
use Think\Controller;
use Think\Model;

/*
 * 功能：评价部分信息管理
 * 编写者：李雪
 * 所用数据表：appraise
 */

class AssessController extends Controller
{
    /*
     * 功能：显示后台评论主页
     * 编写者：李雪
     * 状态：已完成
     */
    public function assess(){
        //si_iddd,商家id，通过store_information找店家名(si_name)(si_iddd=si_id)
        //bs_gid,商品id，通过bs_goods找商品名(bs_gname)(bs_gid=bs_gid)
        //ci_iddd,客户id，通过customer_information找客户名(ci_name)(ci_iddd=ci_id)

        $assess = D('appraise')->relation(true)->select();
//        dump($assess);
        $this->assign('assess',$assess);
        $this->display();
    }
    /*
     * 功能：查看评论详情
     * 作者：李雪
     * 状态：已完成
     */
    public function view(){
        $id = I('get.id');
        $assess = D('appraise')->relation(true)->where("appr_id=$id")->select();
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
//        dump($id);
        $assess = D('appraise')->relation(true)->where("appr_id=$id")->delete();
        if($assess){
            header("Location:/assess/assess/assess");
        }
    }
}