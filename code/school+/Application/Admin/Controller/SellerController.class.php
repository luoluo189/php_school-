<?php
/*
    * 功能：店家信息
    * 编写者：高小力
 */
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

//店铺信息
class SellerController extends Controller
{
    /*
     * 功能：店家信息的展示
     * 编写者：高小力
     */
    public function seller()
    {
         $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        //店家种类的判断
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
    /*
     * 功能：修改店家信息的页面
     * 编写者：高小力
     */
    public function changeseller(){
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        $this->display();
    }
    /*
      * 功能：修改店家头像的页面
      * 编写者：骆静静
      * 状态：succeed
      */
    public function changesellerpic(){
        $seller=M('store_information');
        $condition=array();
        $condition['si_id']=1;
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        $this->display();
    }
    /*
     * 功能：修改店家信息的提交
     * 编写者：高小力
     */
    public function store(){
        //获取post数据
        $data=I('post.');
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
            header('Location:/admin/seller/seller');
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
            header('Location:/admin/seller/seller');
        } else {
            $this->error('数据修改失败！');
        }
    }
    /*
      * 功能：修改商品照片的页面
      * 编写者：孙池晔
      * 状态：succeed
      */
    public function changegoodspic(){

        $seller=M('bs_goods');
        $condition=array();
        $condition['bs_gid']=I('get.id');
        $seller=$seller->where($condition)->select();
        //dump($seller);
        $seller=$seller[0];
        //dump($seller);
        $this->assign('seller',$seller);

        $this->display();
    }
    /*
     * 功能：修改商品照片
     * 编写者：孙池晔
     * 状态：succeed
     */
    public function goodsPic(){
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
                $data['bs_gurl']=$saveFileName;
                //dump($data['si_image']);
            }
        }
        // dump($data);
        // 插入到数据表中
        $id =I('get.id');
        //dump($id);
        $seller = M('bs_goods');
        $dd['bs_gid']=$id;
         $result = $seller->where($dd)->save($data);
        
        // 善后处理
        if ($result) {
            //$this->success( '数据修改成功！','/admin/seller/seller');
            header('Location:/admin/goods/design');
        } else {
            $this->error('数据修改失败！');
        }
    }

}