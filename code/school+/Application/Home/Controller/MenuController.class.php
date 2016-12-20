<?php
namespace Home\Controller;

use Think\Controller;

class MenuController extends Controller
{

public function index()
{
//创建菜单
$access_token=\Common\Library\Wechat::getAccessToken();
$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
$menu='{
  "button":[   
     {	
           "name":"实用工具",
           "sub_button":[
           {	
               "type":"view",
               "name":"我要查查",
               "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1c94debc4261784b&redirect_uri=http%3a%2f%2floveluoluo189.cn%2findex.php%2fhome%2fjssdk%2findex&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
  
            },
            {
               "type":"view",
               "name":"加入我们",
                "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1c94debc4261784b&redirect_uri=http%3a%2f%2floveluoluo189.cn%2findex.php%2fhome%2fjoin%2fjoin&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
         },
            {
               "type":"view",
               "name":"违章查询",
               "url":"http://www.hbgajg.com/"
            },
            {
               "type":"view",
               "name":"快递查询",
               "url":"http://www.kuaidi100.com/?from=openv"
            }]
      },
      
      
      {
           "name":"快乐生活",
           "sub_button":[         
            {
               "type":"click",
               "name":"热门图文",
               "key":"V1002"
            },
            {
               "type":"click",
               "name":"智能机器人",
               "key":"V1001"
            }]
       },

       {	
          "type":"view",
          "name":"微官网",
          "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1c94debc4261784b&redirect_uri=http%3a%2f%2floveluoluo189.cn%2findex.php%2fhome%2f&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect"
      }]
 }';
 $result=\Common\Library\Wechat::createMenu($url,$menu);
 dump($result);
}

/**
 * 查看菜单
 */
public function view(){
 $access_token=\Common\Library\Wechat::getAccessToken();
  $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$access_token";

  $menuStr=\Common\Library\Wechat::menuView($url);
  $menu = json_decode($menuStr);
   // dump($menu);
  $this->assign("menu",$menu->menu->button);
  $this->display();
}

/**
 * 创建菜单
 */
public function manage(){
  $access_token=\Common\Library\Wechat::getAccessToken();
  $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$access_token";

  $menuStr=\Common\Library\Wechat::menuView($url);
  $menu = json_decode($menuStr);
  $this->assign("menu",$menu->menu->button);

  $this->display();
}
public function create(){
  $access_token=\Common\Library\Wechat::getAccessToken();
  $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
  $menu=I('menu');//主要是这里数据的组织
  $menuStr=array();
  $menuStr['button']=$menu;
  $menu=json_encode($menuStr,JSON_UNESCAPED_UNICODE);
  error_log($menu,3,'log.txt');
  $result=\Common\Library\Wechat::createMenu($url,$menu);

  echo $result['errmsg'];
}

}