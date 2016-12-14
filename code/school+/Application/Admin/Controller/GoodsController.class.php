<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class GoodsController extends Controller
{
    public function design()
    {
         //种类分类
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);

        //商品信息
        $sql = "select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription
       from bs_type,bs_goods
       where bs_type.si_id=1 and bs_type.bs_tid=bs_goods.bs_tid";
        $bgoods = M()->query($sql);
        //dump($bgoods);
//            $this->assign('bgoods', $bgoods);
        //$this->display();

        //1.获取记录总条数
        $count=count($bgoods);
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=4;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $sqls = "select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription
       from bs_type,bs_goods
       where bs_type.si_id=1 and bs_type.bs_tid=bs_goods.bs_tid limit $page->firstRow,$page->listRows";
        $bgoods=M()->query($sqls);
        //dump($bgoods);
        //5.输出查询结果
        $this->assign('bgoods',$bgoods);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();

    }


    public function addgds(){
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);
        $this->display();
    }
    public function store(){
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
        $seller = M('bs_goods');
        $dd['si_id']=$id;
        //dump($dd);
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

    public function changegds(){
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);

        $id =I('get.id');
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        //dump($dd);
        $bgoods=$bgoods->where($dd)->select();
        $bgoods=$bgoods[0];
        //dump($bgoods);
        $this->assign('bgoods',$bgoods);
        $this->display();
    }
    public function updategoods(){
        //获取post数据
        $data=I('post.');
        //dump($data);
        $id =I('get.id');
        //dump($id);
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        //dump($dd);
        $result=$bgoods->where($dd)->save($data);
        if ($result) {
            $this->success( '数据修改成功！','/admin/goods/design');
        } else {
            $this->error('数据修改失败！');
        }
    }

    public function delete(){
        $id =I('get.id');
        //dump($id);
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        //dump($dd);
        if($bgoods -> where($dd)->delete()){
            $this->success('删除成功');
        }
        else{
            $this->error('删除失败');
        }
    }

       /*
        * 功能：批量删除
        * 编写者：安垒
        * 状态：succeed
        */
    public function destoryBatch(){
        $userModel = M('bs_goods');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("bs_gid IN ($id )")->delete())
        {
            $this->success('数据删除成功!');
        }
        else{
            $this->error('数据删除失败！');
        }


    }
}