<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class GoodsController extends Controller
{
    public function design()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $btype=M('bs_type');
        $condition=array();
        $condition['si_id']=1;
        $btype=$btype->where($condition)->select();
        $this->assign('btype',$btype);

        $sql="select bs_gid,bs_gname,bs_gsize,bs_gprice,bs_gnumber,bs_gurl,bs_gdescription 
       from bs_type,bs_goods where bs_type.si_id=1 
       and bs_type.bs_tid=bs_goods.bs_tid";
        $bgoods=M()->query($sql);
        //dump($bgoods);
        $this->assign('bgoods',$bgoods);
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
        //获取post数据
        $data=I('post.');
        $data['bs_tid']=2;
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
            $this->success( '数据添加成功！','/school+/admin/goods/design');
        } else {
            $this->error('数据添加失败！');
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
            $this->success( '数据修改成功！','/school+/admin/goods/design');
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
}