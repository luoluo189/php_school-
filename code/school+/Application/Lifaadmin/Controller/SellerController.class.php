<?php
namespace Lifaadmin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
use Think\Upload;
//店铺信息
class SellerController extends Controller
{
    public function _before_index(){
        if($_SESSION['loginedName']==NULL){
            $jumpUrl = '/home/';
            $this->redirect($jumpUrl);
        }
    }
    public function index()
    {
        $_db=M('store_information');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
        $result=$_db->where($condition)->select();
        $result= $result[0];
//        dump($result[si_address]);
        $this->assign('store', $result);

        if($result[s_type_id]==1)
        {
            $type="理发店";
        }elseif($result[s_type_id]==2)
            {
                $type="商品店";
            }
        else{
            $type="兼职发布人";
        }
        $this->assign('type',$type);
         $this->display(seller);
    }
    public function changeseller(){
        $_db=M('store_information');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
        $result=$_db->where($condition)->select();
        $result= $result[0];
//        dump($result[si_address]);
        $this->assign('store', $result);

        $this->display();
    }

    public function changesellerpic(){
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        $this->display();
    }
    /*
      * 功能：修改店家信息的提交
      * 编写者：骆静静
      * 状态：succeed
      */
    public function store(){
        //获取post数据
        $data=I('post.');
       //dump($data);
        // 插入到数据表中
        $id =I('get.id');
        dump($id);
        $seller = M('store_information');
        $dd['si_id']=$id;
        //dump($dd);
        $result = $seller->where($dd)->save($data);
        dump($result);
//         善后处理
        if ($result) {
            //$this->success( '数据修改成功！','/admin/seller/seller');
            header('Location:/index.php/Lifaadmin/seller');
        } else {
            $this->error('数据修改失败！');
        }
    }
    /*
     * 功能：修改店家的照片
     * 编写者：骆静静
     * 状态：succeed
     */
    public function storePic(){
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
        $result = $seller->where($dd)->save($data);
        //dump($result);
        // 善后处理
        if ($result) {
            header('Location:/index.php/Lifaadmin/seller');
        } else {
            $this->error('数据修改失败！');
        }
    }
}