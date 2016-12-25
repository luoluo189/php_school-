<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;

class PersonalController extends Controller
{
    protected $_db;
    public $userId=1;
    /*
     * 功能：
     * 编写者：孙池晔
     * 状态：已完成
     * 修改者：李雪
     */
    public function paddaddress(){
        layout(false);
        $_nb = M('customer_information');
        $condition1=array();
        $condition1['ci_id'] = $_GET['id'];//获取到的客户id

        $result1=$_nb->where($condition1)->select();
        $this->assign('user', $result1[0]);
        //获得地址数据表
        $_db=M('customer_address');
        $_mb=$_db->table('customer_information')->select();
        $condition=array();
        $condition['ci_idd']=$_GET['id'];   
        $result=$_db->where($condition)->select();
        $this->assign('address', $result);
        $this->display();
    }
    /*
     * 功能：新增收货地址
     * 编写者：孙池晔
     * 状态：已完成
     * 修改者：李雪
     */
    public function getpaddress(){
        layout(false);
        $data = array();
        $data['ca_name'] = I('ca_name');
        $data['ca_phone'] = I('ca_phone');
        $data['ca_address'] = I('ca_address');
        $data['ci_idd'] = I('ci_idd');

        if ($data['ca_name'] &&  $data['ca_phone'] && $data['ca_address']  &&  $data['ci_idd']){//如果数据均不为空
            if(preg_match("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/", $data['ca_phone'])){//如果手机号码符合要求

                $results = M('customer_address') ->add($data);//数据插入
                if($results){//如果插入成功
                    echo <<<STR
				<script type="text/javascript">
					alert('地址信息添加成功！');
                    window.location.href = "/index.php/home/personal/paddress";
				</script>
STR;
                }
                else{
                    echo <<<STR
				<script type="text/javascript">
					alert('地址信息添加失败！');
                    window.location.href = "/index.php/home/personal/paddress";
				</script>
STR;
                }

            }
            else{//如果手机号码不符合要求
                echo <<<STR
				<script type="text/javascript">
					alert('手机号码不符合要求！');
                    window.history.go(-1);
				</script>
STR;
            }

       }else {
            echo "<script>                  
                    alert('地址信息还未添加！');
                    window.history.go(-1);
                    </script>";
        }
    }
    /*
     * 功能：收货地址管理首页
     * 编写者：孙池晔
     * 状态：已完成
     * 修改者：李雪
     */
    public function paddress(){
        layout(false);
        $_SESSION['ci_id'] =1;

        $_nb=M('customer_information');
        $condition1=array();
        $condition1['ci_id'] = $_SESSION['ci_id'];//应该获取到的是该微信号本身的id，这里由于还未实现自动得到微信号本身的id，所以手动输入id
        $result1=$_nb->where($condition1)->select();
        $this->assign('user', $result1[0]);
        //var_dump($_GET['id']);
        //获得地址数据表
        $_db=M('customer_address');
        $_mb=$_db->table('customer_information')->select();
        $condition=array();
        $condition['ci_idd']=$condition1['ci_id'];    
        $result=$_db->where($condition)->order('ca_id')->select();

        $this->assign('address', $result);

        $this->display(); 
    }

    /*
     * 功能：设置部分
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function pset(){
        $_db=M('customer_information');
        $condition=array();
        $condition['ci_id']=$_GET['id'];
        $result=$_db->where($condition)->select();
        $this->assign('user', $result[0]);
        $this->display();
    }
    /*
     * 功能：个人主页
     * 编写者：孙池晔
     * 状态：已完成
     */
    public function personal(){
        $_SESSION['ci_id']=1;
        //本地调试
        $_db=M('customer_information');
        $condition=array();
        $condition['ci_id']=$_GET['id'];
        $result=$_db->where($condition)->select();
        $this->assign('user', $result[0]);
        $this->display();

        //服务器代码
        /*
        $_db=M('customer_information');
        $condition=array();
//        cookie带有openid,通过openid可以查询用户的id
        $condition['openid']=$_COOKIE['openid'];

        $result=$_db->where($condition)->select();
        $result[0]['headimgurl']=$_COOKIE['headimgurl'];
//        dump($_COOKIE['headimgurl']);
        $this->assign('user', $result[0]);

//        dump($_SESSION);
        $this->display();
        */
    }


    /*
     * 功能：用户地址删除
     * 编写者：李雪
     * 状态：已完成
     */
    public function delete(){
        $id= I('get.id');
        $customer = M('customer_address');
        if($customer->where("ca_id= $id")->delete()){
            echo <<<STR
				<script type="text/javascript">
					alert('地址信息删除成功！');
                    window.location.href = "/index.php/home/personal/paddress";
				</script>
STR;
        }
        else{
            echo <<<STR
				<script type="text/javascript">
					alert('地址信息删除失败！');
                    window.location.href = "/index.php/home/personal/paddress";
				</script>
STR;
        }
    }


    /*
    * 功能： 编辑已有地址
    * 编写者：李雪
    * 状态：
    */
    public function editaddress(){

        $ci_id = $_GET['id'];
        $customer = M('customer_address')->where("ca_id=$ci_id")->select();
        $cus = $customer[0]['ci_idd'];//用户id
        $this->assign('cus',$cus);//获取用户id并分配

        if(isset($_POST['submit'])){//如果点击了提交//if开始的括号
            $ca_id = I('get.id');
            $data = array();
            $data['ca_name'] = I('ca_name');
            $data['ca_address'] = I('ca_address');
            $data['ca_phone'] = I('ca_phone');
            $data['ci_idd'] = $cus;//用户id

            //判断手机号码是否符合要求
            if(preg_match("/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/", $data['ca_phone'])){//如果手机号码符合要求
                $result = M('customer_address')->where("ca_id=$ca_id")->save($data);//如果手机号码符合要求,数据更新
                if($result){//如果数据已经更新
                    echo <<<STR
				<script type="text/javascript">
					alert('修改成功！');
                    window.location.href = "/index.php/home/personal/paddress";
				</script>
STR;
                }
                else{//如果数据未更新
                    echo <<<STR
				<script type="text/javascript">
					alert('您的信息还未修改！');
					window.history.go(-1);
				</script>
STR;
                }
            }
            else{//如果手机号码不符合要求
                echo <<<STR
				<script type="text/javascript">
					alert('手机号码格式有误！');
					window.history.go(-1);
				</script>
STR;
            }

        }//if结束的括号
        else{//如果没有点击提交
            $id= I('get.id');
            $editaddress = M('customer_address');
            $editaddress = $editaddress->where("ca_id= $id")->select();
            $this->assign('editaddress',$editaddress);
            $this->display();
        }
    }


    /*
     * 功能：默认地址修改
     * 编写者：李雪
     * 状态：已完成
     */

    public function setaddress(){
        $id = I('get.id');
        $_SESSION['ci_id'] = 1;
        $ci_id = $_SESSION['ci_id'];
        $data = array();
        $data['ci_id'] = $ci_id;
        $data['ca_idd'] = $id;
        $result = M('customer_information')->where("ci_id=$ci_id")->save($data);

        if($result){
           return true;
        }
        else{
          return false;
        }
    }
}