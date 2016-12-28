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
     * 修改者：李雪
     */
    public function yuyue(){
        $condition=array();        
        $condition['s_type_id'] = 1;
        $condition['si_id'] = $_GET[si_id];
        $result=M('store_information')->where($condition)->select();
        $this->assign('set', $result[0]);

        //服务类型信息获取
        $si_id = I('si_id');
        $service = M('order_time_pmun')->where("si_idddd = $si_id")->select();
        $this->assign('service',$service);

        $this->display();
    }


    /*
     * 功能：预约数据提交
     * 编写者：孙池晔
     * 状态：已完成
     * 修改者：李雪
     */
    public function getyuyue()
    {

//        $_SESSION['ci_id'] = 1;
        $ci_id =  $_SESSION['ci_id'];

        $storeid = I('get.si_id');

        $or_typename = I('haircut');
        $or_typenameaa = implode("",$or_typename);
            $data = array();
            $data['storeid'] = $storeid;
            $data['ci_idid']= $ci_id;
            $data['ts_idd'] =I('ts_idd');
            $data['hair_name'] = I('name');
            $data['hair_gender']=I('sex');
            $data['hair_number'] = I('tel');
            $data['hair_long'] = I('hair');
            $data['or_typename'] = $or_typenameaa;
            $data['or_tdday'] = I('date');
            $data['or_tdtime'] = I('time');
            $data['hair_content'] = I('comment');

            // 插入到数据表中
        if($data['hair_name'] && $data['hair_gender'] && $data['hair_number'] && $data['hair_long'] && $data['or_typename'] &&  $data['or_tdday'] && $data['or_tdtime'] && $data['hair_content'] ){
            //如果数据均不为空

            //然后判断手机号码长度
            if(preg_match("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/", $data['hair_number'])){
                //如果手机号码验证通过

                $results =M('order_trade')->add($data);
                if ($results) {
                    echo <<<STR
				<script type="text/javascript">
					alert('您的预约成功了呢！');
                    window.location.href = "/index.php/home/lifa/dianpu?si_id={$storeid}";                  
				</script>
STR;
                } else {
                    echo <<<STR
				<script type="text/javascript">
					alert('预约失败！');
                    window.history.go(-1);
				</script>
STR;
                }

            }else{
                //如果手机号码格式不对
                echo <<<STR
				<script type="text/javascript">
					alert('您的手机号码格式有误！');
                    window.history.go(-1);
				</script>
STR;
            }

        }
        else{
            //如果有预约信息还没填写
            echo <<<STR
				<script type="text/javascript">
					alert('请先写入您的预约信息哦！');
                    window.history.go(-1);
				</script>
STR;
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