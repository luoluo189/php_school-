<?php
namespace Home\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();

use Think\Controller;

class DianjiaController extends Controller
{


    public $userId=1;
    /*
     * 功能：店家界面
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function dianjia(){

        //通过店家ID获取商品种类
        $condition['si_id']=$_GET['si_id'];
        $name = M('store_information')->where($condition)->select();
        $set = array();
        $set = $name[0];
        $goodtype = M('bs_type')->where($condition)->select();
        //var_dump($goodtype);
        $tid=array();
        $_db=M('bs_goods');
        for($i=0;$i<count($goodtype);$i++){
            $tid[$i]= $goodtype[$i]['bs_tid'];
            $conditions['bs_tid']=$tid[$i];
            $goodname[$i] = M('bs_goods')->where($conditions)->select();
            //var_dump($goodname[$i]);
        }
        //var_dump($tid);
        //获取推荐信息
        $conditionss['bs_rname'] = '推荐';
        $result = M('bs_recommend')->where($conditionss)->select();
        $commen =array();
        $commen = $result[0];
        //var_dump($commen);
        $this->assign('commen',$commen);

        $this->assign('set',$set);
        //获取商品详细信息
        // 数据库sql语句拼接？
        $this->assign('bs_goods',$goodname);
        $this->assign('image',$name);
        $this->display();
    }
    /*
     * 功能：index显示
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function index(){

        //通过店家ID获取商品种类
        $condition['si_id']=$_GET['si_id'];
        $name = M('store_information')->where($condition)->select();
        $set = array();
        $set = $name[0];
        $goodtype = M('bs_type')->where($condition)->select();
        //var_dump($goodtype);
        $tid=array();
        $_db=M('bs_goods');
        for($i=0;$i<count($goodtype);$i++){
            $tid[$i]= $goodtype[$i]['bs_tid'];
            $conditions['bs_tid']=$tid[$i];
            $goodname[$i] = M('bs_goods')->where($conditions)->select();
            //var_dump($goodname[$i]);
        }
        //var_dump($tid);
        $conditionss['bs_rname'] = '推荐';
        $result = M('bs_recommend')->where($conditionss)->select();
        $commen =array();
        $commen = $result[0];
        //var_dump($commen);
        $this->assign('commen',$commen);

        $this->assign('set',$set);
        $this->assign('bs_goods',$goodname);
        $this->display();
    }

    /*
     * 功能：店家简介
     * 编写者：黄桃源
     * 状态：succeed
     */

    public function jianjie(){
        $_SESSION['ci_id']=1;

        //获取店家ID
        $si_id = $_GET['si_id'];

        $sql = "select bs_tname,bs_gurl,bs_type.bs_tid
        from bs_type,bs_goods
        where bs_type.bs_tid = bs_goods.bs_tid and si_id = $si_id  ";
        $type1 = M()->query($sql);

        $Model2 = M('store_information');
        $type2 = $Model2->where("si_id = $si_id")->select();
        //var_dump($type2);
        $si = array();
        $si= $type2[0];
        //var_dump($si);
        $this->assign('bs_type',$type1);
        $this->assign('si',$si);
        $this->display();
    }

    public function pingjia(){
        $this->display();
    }

    /*
     * 功能：商品列表
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function goodslist(){

        $condition['bs_tid'] = $_GET['bs_tid'];
        $result=M('bs_goods')->where($condition)->select();
        $set0=M('bs_type')->where($condition)->select();
        $set=array();
        $set = $set0[0];
        $this->assign('bs_goods',$result);
        $this->assign('set',$set);
        $this->display();
    }

    /*
     * 功能：商品详情
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function shangpin(){

        $si_id = $_GET['si_id'];//店家id
        $bs_rid= $_GET['id'];//推荐id

        $sql = "select bs_gname,bs_gurl,bs_gprice,bs_gdescription
        from bs_goods,bs_type
        where bs_goods.bs_rid = $bs_rid and bs_type.si_id = $si_id  and bs_type.bs_tid = bs_goods.bs_tid";

        $result = M()->query($sql);
        $set = array();
        $set = $result[0];
//dump($set);
        $name=M('store_information')->where("si_id = $si_id")->select();
        $si = array();
        $si = $name[0];

        $this->assign('set',$set);
        $this->assign('si',$si);
        $this->assign('image',$name);

        $this->display();
    }




    /*
     * 功能：商品详情跳转
     * 编写者：李雪
     * 状态：已完成
     */

    public function jumps(){

        $si_id = $_GET['si_id'];//店家id
        $bs_gid= $_GET['id'];//商品id

        $sql = "select bs_gname,bs_gurl,bs_gprice,bs_gdescription,bs_tname,bs_gsize,bs_gid
        from bs_goods,bs_type
        where bs_goods.bs_gid = $bs_gid and bs_type.si_id = $si_id  and bs_type.bs_tid = bs_goods.bs_tid";
        $result = M()->query($sql);
        $set = array();
        $set = $result[0];

        $name=M('store_information')->where("si_id = $si_id")->select();
        $si = array();
        $si = $name[0];

        $this->assign('set',$set);
        $this->assign('si',$si);
        $this->assign('image',$name);

        $this->display("Dianjia:shangpin");
    }

    /*
    * 功能：美食列表
    * 编写者：黄桃源
    * 状态：succeed
    */
    public function meishi(){

        $_db=M('store_information');
        $condition=array();
        $condition['s_type_id']=2;
        $result=$_db->where($condition)->select();
        $this->assign('store_information', $result);
        $this->display();
    }

    /*
     * 功能：商家列表
     * 编写者：黄桃源
     * 状态：succeed
     */

    public function shangjia(){

        $_db=M('store_information');
        $result=$_db->select();
        $this->assign('store_information', $result);
        $this->display();
    }

    /*
     * 功能：商家列表具体跳转
     * 编写者：李雪
     * 状态：
     */
    /*
     * 吃的进dianjia,s_type_id是2
     * 理发进dianpu,s_type_id是1
     * 兼职进jianzhi,s_type_id是3
     */
    public function jump(){

        $id = I('get.si_id');
        //通过店家ID获取商品种类
        $name = M('store_information')->where("si_id=$id")->select();

        $set = array();
        $set = $name[0];

        $goodtype = M('bs_type')->where("si_id=$id")->select();
        //var_dump($goodtype);

        $tid = array();
        $_db = M('bs_goods');
        for($i=0;$i<count($goodtype);$i++){
            $tid[$i]= $goodtype[$i]['bs_tid'];
            $conditions['bs_tid']=$tid[$i];
            $goodname[$i] = M('bs_goods')->where($conditions)->select();
            //var_dump($goodname[$i]);
        }
        //var_dump($tid);
        //获取推荐信息
        $conditionss['bs_rname'] = '推荐';
        $result = M('bs_recommend')->where($conditionss)->select();
        $commen =array();
        $commen = $result[0];
        //var_dump($commen);
        $this->assign('commen',$commen);
        $this->assign('set',$set);
        //获取商品详细信息
        $this->assign('bs_goods',$goodname);
        $this->assign('image',$name);

        if($set['s_type_id'] == 1){
            $this->display('Lifa:dianpu');//店铺
        }
        else if($set['s_type_id'] == 2){
            $this->display('Dianjia:dianjia');//店家
        }
        else if($set['s_type_id'] == 3){
            $_db=M('pt_information');
            $c = $_db->select();
            $this->assign('c',$c);
            $this->display('Jianzhi:jianzhi');//兼职
        }
    }



    /*
    * goodlist页面数据插入数据库
    * 编写者：黄桃源
    * 状态：succeed
    */
    public function gouwu1(){
        //$id = $_GET['id'];


        $news = array();
        $news['bs_gidd'] = $_GET['id'];

        $news['ci_idddd'] = $_SESSION['ci_id'];
//        dump($news);
        $results = M('shopping_cart')->add($news);
        if($results){
            if($results) {
                echo <<<STR
				<script type="text/javascript">
					alert('加入购物车成功！');
                    window.location.href = "/index.php/home/dingdan/gouwuche_queren";
				</script>
STR;
            }
            else{
                echo <<<STR
				<script type="text/javascript">
					alert('加入购物车失败！');
                    window.history.go(-1);
				</script>
STR;

            }

        }

    }
    /*
     * 店家页面数据插入数据库
     * 编写者：黄桃源
     * 状态：succeed
     */
    public function gouwu2(){
        //global $userId;

        $news = array();
        $news['bs_gidd'] = $_GET['id'];
        $news['ci_idddd'] = 1;
        //var_dump($news);
        $results = M('shopping_cart')->add($news);
        $this->display("Dingdan:gouwuche_queren");
    }
    /*
   * 功能：商家列表搜索
   * 编写者：安垒
   * 状态：succeed
   */

    public function search(){
        $key=I('get.search_word');                               //获取参数

        $sellUserModel = M('store_information');                 //要查询的表

        $where['si_name']=array('like',"%{$key}%");            //like查询的条件

        $where['si_sintroduce']=array('like',"%{$key}%");    //like查询的条件

        $where['_logic']='OR';                                    //语句之间的连接条件

        $result=$sellUserModel->where($where)->select();

        //返回不存在的商家
        if (NULL == $result){
            $this->error("很抱歉，没找到您要查找的商家");
        }

        $this->assign('store_information', $result);

        $this->display(shangjia);


    }
}