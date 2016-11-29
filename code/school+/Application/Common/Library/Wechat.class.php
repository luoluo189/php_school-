<?php
namespace Common\Library;
//define your token

//define("TOKEN", "zhangzhimin");
    /*define('APPID', "wxfd74994b21325e2d");
    define('SECRET',"7de309fbc9c84519564a505efd505492");*/
//define('APPID', "wxa030218076a17196");
//define('SECRET',"7d314b48599fb3f02ed030275c2aef4a");

////我的新的测试号
//define('APPID', "wx19a92c9c296ea1f3");
//define('SECRET',"40540eef80990dc747471f7a845a4bc0");

//我的测试号
define('APPID', "wx1c94debc4261784b");
define('SECRET',"807ef7a29813c302316bec00446507c5");

class Wechat
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //清空缓存
        ob_clean();
        //valid signature , option
        if(self::checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    /**
     * 1、接收用户发送过来的数据
     */
    public function receiveMessage(){
        //1) 接收数据（xml数据包）
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];//php7无效
        $postStr = file_get_contents("php://input");
        file_put_contents('log.xml',$postStr,FILE_APPEND);
        //2) 转成xml对象
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        //3) 返回xml对象
        return $postObj;
    }
    /**
     * 2、回复文本消息函数
     */
    public function responseTextMsg($toUserName,$fromUserName,$content){
        //1) 组织xml数据包
        $xmlStr = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        $resultStr = sprintf($xmlStr, $toUserName,$fromUserName,time(),$content);
        file_put_contents('log.xml',$resultStr,FILE_APPEND);
        //2) 发送消息
        echo $resultStr;
    }
    /**
     * 3、回复图片消息
     */
    public function responseImageMsg(){

    }

    /**
     * 4、回复语音消息
     */
    public function responseVoiceMsg(){

    }

    /**
     * 5、回复视频消息
     */
    public function responseVideoMsg(){

    }
    /**
     * 6、回复图文消息
     */
    public function responseImageTextMsg($toUserName,$fromUserName,$result,$num){
        error_log('response', 3, 'log.log');
        $time = time();
        //1、组织xml数据包
        $tpl="<xml>
<ToUserName><![CDATA[$toUserName]]></ToUserName>
<FromUserName><![CDATA[$fromUserName]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>$num</ArticleCount>
<Articles>";

        foreach($result as $tmp){
            $title=$tmp['title'];
            $description=$tmp['description'];
            $picurl = $tmp['thumb'];
            $url = $tmp['url'];
            $tpl .="<item>
<Title><![CDATA[$title]]></Title> 
<Description><![CDATA[$description]]></Description>
<PicUrl><![CDATA[$picurl]]></PicUrl>
<Url><![CDATA[$url]]></Url>
</item>";
            file_put_contents('imageText.xml',$tpl);
        }

        $tpl .= "</Articles>
</xml>";
        //2、发送消息给用户
        echo $tpl;
    }
    /**
     * 7、回复音乐消息
     */
    public function responseMusicMsg(){

    }


    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 创建菜单
     */
    /*
    public function createMenu($url, $menu){
        $curl = new Curl\Curl();
        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);//加上这条就可以啦！
        $curl->post($url, $menu);
        if($curl->error){
            echo $curl->error_code;//错误代码
            echo $curl->error_message;//错误代码
        }else{
            echo $curl->response;//返回信息
        }
    }
    */
    public function createMenu($url,$menu){
        $curl = curl_init ($url);//初始化CURL会话
        $timeout = 5;

        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $menu);
        $result = curl_exec ($curl);

        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            return curl_error($curl);
        }
        curl_close ( $curl );
    }
    public function getAccessToken(){
        //打开缓存文件
        $str = trim(file_get_contents('access_token.php'));
        $access_token = json_decode($str);
        if($access_token->expire_time < time() || !$access_token){//access_token过期了或缓存文件未创建
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".SECRET;
            $newStr = file_get_contents($url);
            $access_token = json_decode($newStr);
            $access_token->expire_time=time()+7000;
            file_put_contents('access_token.php',json_encode($access_token));
        }
        return $access_token->access_token;
    }
    public function addMedia($url,$filePath,$formData){
        $curl = curl_init ($url);//初始化CURL会话
        $timeout = 5;

        $data= array(
            "media"=>"@{$filePath}",
            'form-data'=>$formData
        );
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);

        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            return curl_error($curl);
        }
        curl_close ( $curl );
    }
    public function getMediaList($url,$data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);//过滤头部
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($curl,CURLOPT_POST,true); // post传输数据
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);// post传输数据
        $responseText = curl_exec($curl);
        $res = json_decode($responseText, true);
        curl_close($curl);

        return $res;
    }
    public function addNews($url,$data){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }

    public function getInfo($url, $data){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }

    /**
     * 获取菜单数据
     */
    public function menuView($url){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }
//删除素材
    function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        echo "djfowej";
        return $output;
    }

}

?>