<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();


use Think\Controller;

class LifaController extends Controller
{
    protected $_db;
    public $userId=1;
   

    /*
     * 功能：理发店铺页
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function dianpu(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        //$name = $result[0]['si_name'];
        $this->assign('set', $result[0]);
        $this->display();
    }

    /*
     * 功能：简介页面
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function jianjie(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        $this->assign('set', $result[0]);

        //获取店家ID
        $condition['si_id'] = $_GET['si_id'];
        //var_dump($condition);
        $Model1 = M('bs_type');
        $Model2 = M('store_information');
        $type1 = $Model1->where($condition)->select();
        $type2 = $Model2->where($condition)->select();
        //var_dump($type2);
        $si = array();
        $si= $type2[0];
        //var_dump($si);
        $this->assign('bs_type',$type1);
        $this->assign('si',$si);

        $this->display();
    }

    /*
     * 功能：理发预约界面
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function yuyue(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;
        $condition['si_id']=$_GET[si_id];
        $result=$_db->where($condition)->select();
        $this->assign('set', $result[0]);
        $this->display();
    }


    /*
     * 功能：预约数据提交
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function getyuyue()
    {

    // var_dump($result);
            $data = array();
            $data['storeid'] =I('storeid');
            $data['ci_idid']= I('ci_idid');
            $data['ts_idd'] =I('ts_idd');
            $data['hair_name'] = I('name');
            $data['hair_gender']=I('sex');
            $data['hair_number'] = I('tel');
            $data['hair_long'] = I('hair');
            $data['or_typename'] = I('haircut');
            $data['or_tdday'] = I('date');
            $data['or_tdtime'] = I('time');
            $data['hair_content'] = I('comment');

            // 插入到数据表中
           $_mb = M('order_trade');
           $results = $_mb->add($data);

           if ($results) {
               $referer = $_SERVER['HTTP_REFERER'];
               echo "<script>alert('预约成功');document.location.href='$referer'</script>";
           } else {
                $this->error('预约失败！');
            }
    }

    /*
     * 功能：理发列表显示
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function index(){
        $_db=M('store_information');
        $condition=array();        
        $condition['s_type_id']=1;        
        $result=$_db->where($condition)->select();  
        $this->assign('store', $result);
        $this->display();
    }

}