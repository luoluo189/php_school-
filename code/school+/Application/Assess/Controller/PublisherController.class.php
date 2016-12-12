<?php
namespace Assess\Controller;

use Think\Controller;
/*
 * 功能：发布者信息
 * 编写者：李雪
 */

class PublisherController extends Controller
{
    public function index(){
        $this->display(publisher);
    }
    public function publisher(){
        $publisher = M('publisher');
        $publisher = $publisher->select();
        $this->assign('publisher',$publisher);
        $this->display();
    }

    //添加发布者
    public function store(){
        $data = I('post.');
        $publisher = M('publisher');
        $result= $publisher->add($data);
        if($result){
            header("Location:/assess/publisher/publisher/");
        }
        else{
            $this->error('数据删除失败！');
        }
    }
    //添加发布者
    public function add(){
        $this->display();
    }

    //删除发布者
    public function delete(){
        $id= I('get.id');
        $publisher = M('publisher');
        if($publisher->where("id=$id")->delete()){
            header("Location:/assess/publisher/publisher");
        }
        else{
            $this->error('数据删除失败');
        }
    }

    //查看发布者
    public function view(){
        $id = I('get.id');
        $publisher = M('publisher')->where("id=$id")->select();
        $this->assign('publisher',$publisher);
        $this->display();
    }

    //编辑发布者信息
    public function edit(){

        if(isset($_POST['submit'])){//如果点击了提交按钮
            $id['id'] = I('get.id');
            dump($id);
            $data = I('post.');
            dump($data);

            $pb = M('publisher');
            if($pb->where($id)->save($data)){
                header("Location:/assess/publisher/publisher");
            }
            else{
                $this->error('失败');
            }
        }
        else{
            $id['id'] = I('get.id');
            $pb = M('publisher');
            $publisher = $pb->where($id)->select();
            $this->assign('publisher',$publisher);
            $this->display();
        }
    }
}