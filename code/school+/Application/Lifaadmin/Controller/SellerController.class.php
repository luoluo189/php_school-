<?php
namespace Lifaadmin\Controller;

use Think\Controller;
use Think\Upload;
//店铺信息
class SellerController extends Controller
{
    public function index()
    {
        $_db=M('store_information');
        $condition=array();
        $condition['si_id']=6;
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
        $condition['si_id']=6;
        $result=$_db->where($condition)->select();
        $result= $result[0];
//        dump($result[si_address]);
        $this->assign('store', $result);

        $this->display();
    }

    public function changesellerpic(){
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=6;
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
        dump($data);
        // 插入到数据表中
        $id =I('get.id');
        dump($id);
        $seller = M('store_information');
        $dd['si_id']=$id;
        $result = $seller->where($dd)->save($data);
        dump($result);
        // 善后处理
        if ($result) {
            //$this->success( '数据修改成功！','/admin/seller/seller');
            header('Location:/Lifaadmin/seller');
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
            //$this->success( '数据修改成功！','/admin/seller/seller');
            header('Location:/Lifaadmin/seller/');
        } else {
            $this->error('数据修改失败！');
        }
    }
}