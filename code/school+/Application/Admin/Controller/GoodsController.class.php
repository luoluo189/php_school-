<?php
/*
    * 功能：商品信息
    * 编写者：高小力
 */
namespace Admin\Controller;
//开启输出缓冲区
ob_start();
//开启会话
session_start();
use Think\Controller;
use Think\Upload;

class GoodsController extends Controller
{
    /*
    * 功能：显示商品信息
    * 编写者：高小力
    */
    public function design()
    {
         //种类分类
        $id=$_SESSION['si_id'];
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=$id;
        $condition['bs_tyifshow']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);

        //商品信息
        $sql = "select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription
       from bs_type,bs_goods
       where bs_type.si_id=$id and bs_type.bs_tid=bs_goods.bs_tid and bs_gifshow=1";
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
       where bs_type.si_id=$id and bs_type.bs_tid=bs_goods.bs_tid and bs_gifshow=1 limit $page->firstRow,$page->listRows";
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

    /*
    * 功能：添加商品信息
    * 编写者：高小力
    */
    public function addgds(){
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
        $condition['bs_tyifshow']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);
        $this->display();
    }

    /*
    * 功能：上传商品信息
    * 编写者：高小力
    */
    public function store(){
        //获取post数据
        $data=I('post.');

        //获取外键种类id
        $bstname['bs_tname']=I('post.bs_tname');
        //dump($bstname);
        $result = M('bs_type');
        $r = $result ->where($bstname)->select();
        $a=$r[0]['bs_tid'];
        //dump($a);
        $data['bs_tid']=$a;
        //dump($data);
//编辑产品状态首先默认为1
//       产品推荐默认为1
        $data['bs_gsid']=1;
        $data['bs_rid']=1;
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
                //dump($data['bs_gurl']);
            }
        }
        //dump($data);
        // 插入到数据表中
        $bgoods = M('bs_goods');
        $result = $bgoods->add($data);
        //dump($result);
        // 善后处理
        if ($result) {
            //$this->success( '数据添加成功！','/admin/goods/design');
            header('Location:/index.php/admin/goods/design');
        } else {
            $this->error('数据添加失败！');
        }
    }

    /*
    * 功能：修改商品信息
    * 编写者：高小力
    */
    public function changegds(){
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=$_SESSION['si_id'];
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

        //下拉菜单
        $btypeid=$bgoods['bs_tid'];
        //dump($btypeid);
        $bs_tname= M('bs_type')->where("bs_tid=$btypeid")->select();
        //dump($bs_tname);
        $btypetname=$bs_tname[0]['bs_tname'];
        //dump($btypetname);
        $this->assign('btypetname',$btypetname);

        $this->display();
    }
    public function updategoods(){
        //获取post数据
        $data=I('post.');
        //获取外键种类id
        $bstname['bs_tname']=I('post.bs_tname');
        dump($bstname);
        $result = M('bs_type');
        $r = $result ->where($bstname)->select();
        $a=$r[0]['bs_tid'];
        //dump($a);
        $data['bs_tid']=$a;
        dump($data);
//        //上传文件
//        $upload=new Upload();
//        //设置参数
//        $upload->rootPath='./Public';
//        $upload->savePath='/uploads/';
//        //上传文件操作
//        $info=$upload->upload();
//        //dump($info);
//        //上传后处理
//        if(!$info){
//            $this->error('文件上传失败!');
//        }
//        else{
//            foreach ($info as $file){
//                $saveFileName=$file['savepath'].$file['savename'];
//                $data['bs_gurl']=$saveFileName;
//                //dump($data['si_image']);
//            }
//        }
        $id =I('get.id');
        //dump($id);
        $bgoods=M('bs_goods');
        //$dd['bs_gid']=$id;
        //dump($dd);
        $result=$bgoods->where("bs_gid=$id")->save($data);
        if ($result) {
            //$this->success( '数据修改成功！','/admin/goods/design');
            header("Location:/index.php/admin/goods/design");
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
    public function changegoodspics(){
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
            header('Location:/index.php/admin/goods/design');
        } else {
            $this->error('数据修改失败！');
        }
    }


    /*
    * 功能：删除商品信息
    * 编写者：高小力
    */
    public function delete(){
        $id=I('post.id');
        $bgoods=M('bs_goods');
        $dd['bs_gid']=$id;
        $data['bs_gifshow']= 0;
        $result =$bgoods->where($dd)->save($data);
        if($result==true){
            return true;
        }else{
            return "删除失败";
        }
    }

    /*
    * 功能：商品信息的批量删除
    * 编写者：高小力
    */
    public function destoryBatch(){
        $userModel = M('bs_goods');
        $getid = I('id'); //获取选择的复选框的值

        if (!$getid) $this->error('未选择记录'); //没选择就提示信息

        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样

        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值

        if($userModel->where("bs_gid IN ($id )")->delete())
        {
            //$this->success('数据删除成功!');
            header('Location:/index.php/admin/goods/design');
        }
        else{
            $this->error('数据删除失败！');
        }

    }
}