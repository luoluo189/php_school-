<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

//店铺信息
class SellerController extends Controller
{
    public function seller()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

//        $sttype=M('store_type');
//        $sttype=$sttype->select();
//        $this->assign('sttype',$sttype);

        if($seller[s_type_id]==1)
        {
            $type="理发店";
        }elseif($seller[s_type_id]==2)
        {
            $type="商品店";
        }
        else{
            $type="兼职发布人";
        }
        $this->assign('type',$type);
        $this->display();

    }
    public function changeseller(){
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        $sttype=M('store_type');
        $sttype=$sttype->select();
        $this->assign('sttype',$sttype);

//        if($seller[s_type_id]==1)
//        {
//            $type="理发店";
//        }elseif($seller[s_type_id]==2)
//        {
//            $type="商品店";
//        }
//        else{
//            $type="兼职发布人";
//        }
//        $this->assign('type',$type);
        $this->display();
    }
    public function store(){
        //获取post数据
        $data=I('post.');
        //dump($data);
        //上传文件
        $upload=new Upload();
        //设置参数
        $upload->rootPath='./Public';
        $upload->savePath='/uploads/';
        //上传文件操作
        $info=$upload->upload();
        //dump($info);
        //上传后处理
        if(!$info){
            $this->error('文件上传失败!');
        }
        else{
            foreach ($info as $file){
                $saveFileName=$file['savepath'].$file['savename'];
                $data['si_image']=$saveFileName;
                //dump($data['si_image']);
            }
        }
       //dump($data);
        // 插入到数据表中
        $id =I('get.id');
        //dump($id);
        $seller = M('store_information');
        $dd['si_id']=$id;
        //dump($dd);
        $result = $seller->where($dd)->save($data);
        //dump($result);
        // 善后处理
        if ($result) {
            //$this->success( '数据修改成功！','/admin/seller/seller');
//            header('Location:/admin/seller/seller');
            $this->redirect('seller');
        } else {
            $this->error('数据修改失败！');
        }
    }


}