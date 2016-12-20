<?php
namespace Assess\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
/*
 * 功能：发布者信息
 * 编写者：李雪
 * 修改者:高小力，加上数据分页功能,批量删除
 */

class PublisherController extends Controller
{
    public function index(){
        $this->display(publisher);
    }
    public function publisher(){
        $publisher = M('publisher');
//        $publisher = $publisher->select();
//        $this->assign('publisher',$publisher);
//        $this->display();
        //分页功能
        //1.获取记录总条数
        $count=$publisher->count();
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $publisher=$publisher->limit($page->firstRow.','.$page->listRows)->select();
        //5.输出查询结果
        $this->assign('publisher',$publisher);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
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

    public function destoryBatchlan(){
        $userModel = M('publisher');
        $getid = I('id'); //获取选择的复选框的值
       // dump($getid);
        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("id IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/assess/publisher/publisher');
        }
        else{
            $this->error('数据删除失败！');
        }
    }

}