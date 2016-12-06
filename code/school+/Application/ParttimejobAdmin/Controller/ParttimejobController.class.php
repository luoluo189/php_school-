<?php
namespace ParttimeJobAdmin\Controller;
use Think\Controller;


class ParttimejobController extends Controller
{

    //显示首页兼职发布者的信息（index页面）（成功）
    public function index(){

        $condition['pt_min_id'] = 1;
        $result = M('pt_manager_information')->where($condition)->select();
        $this->assign('pt_manager_information',$result);
        $this->display();
    }


    public function add(){
        $partowerid= 1;
        $this->assign('pt_min_id',$partowerid);
        $this->display();
    }


    //查看兼职订单信息（order页面）（成功）
//    骆静静修改 添加发布者id判断字段
    public function order(){

        $id=2;
        $sql = "select distinct pt_min_id, pt_trid,pt_pname,pt_inname,pt_pphone,pt_trtime,pt_inabstract
        from pt_trade,pt_information,pt_person_information,pt_state
        where pt_trade.ci_id=pt_person_information.pt_pid and pt_information.pt_inid=pt_trade.pt_inid 
        and pt_state.pt_sid=pt_person_information.pt_sid and pt_information.pt_min_id=$id";
        $order=M()->query($sql);
        $this->assign('order',$order);
//        dump($order);
        $this->display();
    }




    //管理兼职信息之修改（edit页面）（成功）
    public function edit(){
        if(isset($_POST['submit'])){//如果提交了信息
            $pt_inid['pt_inid']=I('get.id');
            $data = I('post.');
            //提交数据到数据库
            if(M('pt_information')->where($pt_inid)->save($data)){
                $this->success('数据更新成功！','/school+/ParttimejobAdmin/parttimejob/manage/');
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




    //修改首页用户信息（editor页面）（成功）
    public function editor(){
        if(isset($_POST['submit'])){
            //如果点击了提交
            $data=array();
//            $data['pt_min_name']=I('pt_min_name');
//            $data['pt_min_idnum']=I('pt_min_idnum');
//            $data['pt_min_phone']=I('pt_min_phone');
//            $data['pt_min_type']=I('pt_min_type');
//            $data['pt_min_app_state']=I('pt_min_app_state');
            $data=I('post.');
            if(M('pt_manager_information')->where('pt_min_id=1')->save($data)){
                $this->success('数据插入成功', '/school+/ParttimejobAdmin/parttimejob/index/');
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

    //管理兼职订单（order页面）之查看详情选项（已完成）
    public function view(){
        $pt_trid = I('get.id');
        $sql = "select distinct pt_trid,pt_pname,pt_inname,pt_pphone,pt_trtime,pt_inabstract
        from pt_trade,pt_information,pt_person_information,pt_state
        where pt_trade.ci_id=pt_person_information.pt_pid and pt_information.pt_inid=pt_trade.pt_inid
        and pt_state.pt_sid=pt_person_information.pt_sid and pt_trid=$pt_trid";
        $orders = M()->query($sql);
        $this->assign('orders',$orders);
        $this->display();
    }




    //管理已发布兼职（manage页面）（成功）
    public function manage(){
        $pt_person_information = M('pt_information');
        $pt = $pt_person_information->select();
        $this->assign('pt_information',$pt);
        $this->display();
    }


    public function addAction(){
        //还未成功
//        $data=array();
//        $data['pt_inname']=I('pt_inname');
//        $data['pt_inmoney"']=I('pt_inmoney');
//        $data['pt_inaddress']=I('pt_inaddress');
//        $data['pt_min_phonee']=I('pt_min_phonee');
//        $data['pt_inabstract']=I('pt_inabstract');
        $data=I('post.');
//dump($data);
//        exit;
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

    //管理已发布兼职之删除（不成功）
    public function delete(){
        $pt_inid = I('get.id');
        dump($pt_inid);

        $pt_information = M('pt_information');

        if($pt_information->where($pt_inid)->delete()){
            $this->success('删除成功','/school+/ParttimejobAdmin/parttimejob/manage');
        }
        else{
            $this->error('删除失败');
        }
    }
}