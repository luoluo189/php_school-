<?php
namespace Home\Controller;

use Think\Controller;

class DingdanController extends Controller
{
//    public function index()
//    {
//        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//        $this-display();
//    }
    public function confirm(){

        $media = M('customer_address');
        $m['ci_idd'] = 1;
        $m['ca_id'] = 1;
// 把查询条件传入查询方法
        $s = $media->where($m)->select(); 
        $this->assign('s',$s);
        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=1 and bs_gid=1";
        $storename=M()->query($sql);
       // dump($storename);
        // $n= count($storename);
        // $count=0;
        //  for ($i=0; $i < $n ; $i++) { 
        //      $c=$storename[$i][sh_cnum]*$storename[$i][bs_gprice];
        //      $count=$count+$c;
        //  }
        
        //   $this->assign('cs',$count);
           $this->assign('storename',$storename);
        $this->display();

       
    }
    public function gouwuche_queren(){


        $sql = "select bs_gname,bs_gprice,sh_cnum,bs_gurl
        from bs_goods,shopping_cart
        where bs_goods.bs_gid=shopping_cart.bs_gidd and ci_idddd=1";
        
      
        
        // $_db=M('shopping_cart');

        // $condition['ci_idddd']=1;
        // $condition1=$_db->where($condition)->select();
        
        // $n=count($condition1);
        // for ($i=0; $i < $n ; $i++) { 
        //     $storename[]=M('bs_goods')->where("bs_gid=%d",array($condition1[$i]['bs_gidd']))->find();
        // }
        // dump($storename);
        // $this->assign('',$condition1);
        
        $storename=M()->query($sql);
        $n= count($storename);
        $count=0;
         for ($i=0; $i < $n ; $i++) { 
             $c=$storename[$i][sh_cnum]*$storename[$i][bs_gprice];
             $count=$count+$c;
         }
        //dump($count);
        //dump($storename);
        $this->assign('storename',$storename);
        $this->assign('cs',$count);
      $this->display();
    }
    public function personal_comment(){
    	$this->display();
    }
    public function personal_list(){
    	$this->display();
    }
}