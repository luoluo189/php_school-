<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {
//    public function _before_index(){
//        //前置操作，（执行index之前会自动调用该方法）
//        if(session('group_id')!=1){
//            $this->error('只有管理员才能访问后台','/home/');
//        }
//    }

    public function index() {
        layout(false);

       $this->display();
    }
    public function store(){
        $newsTable=M('news');
        // 获取POST数据
        $data = I('post.');
        //上传文件
        //1.创建文件上传类对象
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        //2.设置参数
        //设置文件保存目录
        $upload->rootPath='./Public';//默认根目录
        $upload->savePath='/uploads/';//保存目录
        //3.执行文件上传操作（上传后的处理）
        $info=$upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $url=array();
            foreach($info as $file) {
                //获取文件保存的目录
               $url[]=  $file['savepath'] . $file['savename'];
            }
            //把图片保存路径写入到$data中
            $data['photo1'] = $url[0];
            $data['photo2'] = $url[1];
        }
        // 插入到数据表中
        $result = $newsTable->data($data)->add();
        // 善后处理
        if ($result) {
            $this->success( '表数据插入成功！');
        } else {
            $this->error( '表数据插入失败！');
        }
    }
}