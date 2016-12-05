<?php
namespace Admin\Controller;

use Think\Controller;

class DingController extends Controller
{
    public function ding()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $tstate=M('trade_state');
        $sql="select ts_name
            from store_information,trade_state
            where si_id=1 and store_information.s_type_id=trade_state.s_type_idd";
        $tstate=M()->query($sql);
        //dump($tstate);
        $this->assign('tstate',$tstate);

        $sqls="select bs_tr_id,ci_name,bs_tr_xtime,ts_name,bs_tr_way
        from bs_trade,trade_state,customer_information
        where bs_trade.ts_iddd=trade_state.ts_id and bs_trade.ci_id5=customer_information.ci_id and bs_sid=1";
        $tstates=M()->query($sqls);
        //dump($tstates);
        $this->assign('tstates',$tstates);
        $this->display();
    }
    public function changeding()
    {
        $this->display();
    }
    public function delete(){
        $id =I('get.id');
        //dump($id);
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        //dump($dd);
        if($bgoods -> where($dd)->delete()){
            $this->success('删除成功');
        }
        else{
            $this->error('删除失败');
        }
    }
}