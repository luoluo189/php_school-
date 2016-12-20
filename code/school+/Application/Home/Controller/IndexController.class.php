<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function _before_index(){

        //接收code的值
        $code=I('code');
        //	dump($code);

        //2、获取access_token的值
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx1c94debc4261784b&secret=807ef7a29813c302316bec00446507c5&code=$code&grant_type=authorization_code";
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            $result = json_decode($result);
            //	dump($result);
            //3、拉取用户信息
            $access_token=$result->access_token;
            $openid=$result->openid;
            $url2="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $curl = curl_init ($url2);
            curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
            $result2 = curl_exec ($curl);
            if(curl_errno()==0){
//                dump(json_decode($result2));
                //分配到视图文件
                $this->assign('user',json_decode($result2));
                $users=json_decode($result2);
//赋值给session
                $_SESSION['openid']=$users->openid;
                $_SESSION['nickname']=$users->nickname;
                $_SESSION['headimgurl']=$users->headimgurl;
//                赋值给cookie
                setcookie('openid', $_SESSION['openid'], time()+3156000);
                setcookie('headimgurl', $_SESSION['headimgurl'], time()+3156000);
//                dump($_SESSION);
//                dump($_COOKIE);

            }else{
                dump(curl_errno($curl));
            }
        }else {
            dump(curl_errno($curl));
        }

    }
    public function index(){
        $_db=M('customer_information');
        $tt['openid']=$_COOKIE['openid'];
        $result=$_db->where($tt)->count();
        if($result==0){
            $news['ci_name']=$_SESSION['nickname'];
            $news['openid']=$_SESSION['openid'];
            if($_SESSION['openid']==NULL){
                echo "<script>alert('请在微信打开');</script>";
            }else{
                $result3=$_db->add($news);
            }
        }else{
            $usernews=$_db->where($tt)->select();
        }
        setcookie('userid', $usernews[0]['ci_id'], time()+3156000);
        $this->display();
    }


      /*
       * 功能：搜索
       * 编写者：安垒
       * 状态：完成
       */
    public function search(){
        $key=I('get.search_word');                               //获取参数

        $sellUserModel = M('bs_goods');                           //要查询的表

        $where['bs_gname']=array('like',"%{$key}%");            //like查询的条件

        $where['bs_gdescription']=array('like',"%{$key}%");    //like查询的条件

        $where['_logic']='OR';                                    //语句之间的连接条件
        $list=$sellUserModel->where($where)->select();

        if (NULL ==$list){
            $this->error("很抱歉，没找到您要查找的商品");
        }
        //dump($list);

       //完成跳转
        foreach ($list as $key=>$val){                            //获取bs_tid
//            dump($val);
            $id= $val[bs_tid];
//            dump($id);
            $sql = "select si_id from bs_type where bs_type.bs_tid = $id";     //通过bs_tid去条件查询si_id
            $sii_id=M()->query($sql);
           // dump($sii_id);
            foreach ($sii_id as $k => $v){
               // dump($v);
                $si_id = $v[si_id];
                //dump($si_id);
                $this->assign('si_id',$si_id);
            }
        }

//        如果数据很多需要分页显示
        //$count = M('bs_goods')->where($where)->count('bs_gid');
//        dump($count);                                                      //统计记录条数
//        $page = new Page($count, 6);
//        $limit = $page->firstRow . ',' . $page->listRows;
//
//
//        $rows = D('bs_goods')->where($where)->order('addtime DESC')->limit($limit)->select(); //查询


        $this->assign('list',$list);                                //分配

        $this->display(sousuo);
    }

    public function personal(){
        redirect('/index.php/home/personal/personal');

    }
    public function gouwuche(){
        redirect('/index.php/home/dingdan/gouwuche_queren');
    }
}