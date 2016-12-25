<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/22
 * Time: 14:55
 */
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
class JianzhiController extends Controller{
    public $userId=1;
    /*
    作者：尤燕飞
    功能：获取兼职列表页
    */
    public function jianzhi(){
        $_db=M('pt_information');
        $c = $_db->select();
        $this->assign('c',$c);
        $this->display();
    }
    /*
    作者：尤燕飞
    功能：获取兼职详情页
    */
    public function jianzhi_content(){
        $pt_inid['pt_inid']= $_GET['id'];
        //dump($pt_inid);

        $_db = M('pt_information');
        $cont = $_db->where($pt_inid)->select();
        $x['pt_min_id'] = $cont[0]['pt_min_id'];
        $this->assign('cont',$cont);
        $b = M('pt_manager_information');
        $cx = $b->where($x)->select();
        //dump($cx);
        $this->assign('cx',$cx);

        $this->display();
    }
    /*
    作者：尤燕飞
    功能：获取兼职预约页
    */
    public function jianzhi_list(){
        $ci_id=$_SESSION['ci_id'];
        $pt_inid['pt_inid']= $_GET['id'];
        //dump($pt_inid);
        $_db = M('pt_information');
        $cont = $_db->where($pt_inid)->select();
        //从客户表中获取$ci_id
        $pts = M('customer_information')->where("ci_id=$ci_id")->select();

        $this->assign('cont',$cont);
        $this->assign('pts',$pts);
        $this->display();
    }
    /*
    作者：尤燕飞
    功能：向数据库添加兼职交易信息
    修改者：李雪
    */
    public function add(){
        $ci_id = $_SESSION['ci_id'];
        $pts = M('customer_information')->where("ci_id = $ci_id")->select();
        $pt_inid['pt_inid']= $_GET['id'];

        $time = time();//获取时间
        $times = date('Y-m-d H:i:s', $time);//时间格式化

        //获取要插入到pr_trde表的数据
        $data = array();

        //兼职交易id由客户id，兼职id，时间戳组合而成
        $data['pt_trid'] = $time;
        $data['pt_trtime'] = $times;//时间
        $data['pt_trremark']= I('post.pt');//备注
        $data['pt_inid'] = $pt_inid['pt_inid'];//兼职id
        $data['ts_id'] = 8;//默认交易状态8 兼职预约成功
        $data['ci_id'] = $ci_id;//客户id
        $pt_pphone= I('pt_pphone');//手机号

        if( $data['pt_trremark'] && $data['pt_inid'] && $data['pt_trtime'] && $pt_pphone) {//如果所提交数据均不为空
            //开始验证手机号码格式
            if(preg_match("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/",$pt_pphone)){//如果手机号码格式正确
                $pt = M('pt_trade')->add($data);//插入兼职信息到pt_trade表，
                //获取要插入到pt_personal_information表的数据
                $person = array();
                $person['pt_pid'] = $ci_id;
                $person['pt_pname'] = $pts[0]['ci_name'];
                $person['pt_sid'] = 0;
                $person['pt_pphone'] = $pt_pphone;

                $p =   M('pt_person_information')->where("pt_pid=$ci_id")->select();
                if(!p){//查询pt_personal_information表内是否有该客户信息,如果没有
                    //将兼职者信息插入到pt_personal_information表
                    $persons = M('pt_person_information')->add($person);

                    if($pt && $persons){
                        echo <<<STR
				<script type="text/javascript">
					alert('预约成功！');
                    window.location.href = "/index.php/home/dingdan/personal_list";
				</script>
STR;
                    }
                    else{
                        echo <<<STR
				<script type="text/javascript">
					alert('预约失败！');
                    window.history.go(-1);
				</script>
STR;
                    }
                }
                else{//如果数据表中有相关客户信息
                    if($pt){
                        echo <<<STR
				<script type="text/javascript">
					alert('预约成功！');
                    window.location.href = "/index.php/home/dingdan/personal_list";
				</script>
STR;
                    }
                    else{
                        echo <<<STR
				<script type="text/javascript">
					alert('预约失败！');
                    window.history.go(-1);
				</script>
STR;
                    }

                }

            }
            else{//如果手机号码格式错误
                echo <<<STR
				<script type="text/javascript">
					alert('手机号码格式有误！');
                    window.history.go(-1);
				</script>
STR;
            }

        }
        else {//如果提交数据有空值
            echo <<<STR
				<script type="text/javascript">
					alert('请先填写相关信息！');
                     window.history.go(-1);
				</script>
STR;
        }

    }
    /*
     * 功能：搜索
     * 编写者：安垒
     * 状态：完成
     */
    public function search()
    {
        $key = I('get.search_word');                               //获取参数

        $sellUserModel = M('pt_information');                           //要查询的表

        $where['pt_inname'] = array('like', "%{$key}%");            //like查询的条件

        $where['pt_inabstract'] = array('like', "%{$key}%");    //like查询的条件

        $where['_logic'] = 'OR';                                    //语句之间的连接条件
        $c = $sellUserModel->where($where)->select();

        if (NULL == $c) {
            $this->error("很抱歉，没找到您要查找的兼职类型");
        }
        $this->assign('c',$c);
        $this->display(jianzhi);
    }

}