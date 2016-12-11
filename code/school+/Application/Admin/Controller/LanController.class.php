<?php
namespace Admin\Controller;

use Think\Controller;

class LanController extends Controller
{
    public function lan()
    {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $stype=M('bs_type');
        $condition=array();
        $condition['si_id']=1;
        //1.获取author_id=3记录总条数
        $count=$stype->where($condition)->count();
        //dump($count);
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $stype=$stype->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        //5.输出查询结果
        $this->assign('stype',$stype);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();
        //$stype=$stype->where($condition)->select();
        //dump($stype);
        //$stype=$this->assign('stype',$stype);
        //$this->display();
    }
    public function addlan(){
        $this->display();
    }
    public function store(){
        $stype=M('bs_type');
        $data=array();
        $data['bs_tname']=I('title');
        $data['si_id']=1;
        //dump($data);
        $resulut=$stype->add($data);
        //dump($resulut);
        if($resulut)
        {
            $this->success('数据插入成功','/admin/lan/lan');
        }
        else{
            $this->error('数据插入失败');
        }
    }
    public function changelan(){
        $id =I('get.id');
        //dump($id);
        $stype = M('bs_type');
        $dd['bs_tid']=$id;
        $stype=$stype->where($dd)->select();
        $stype=$stype[0];
        //dump($stype);
        $stype=$this->assign('stype',$stype);
        $this->display();
    }
    public function updatelan(){
        //获取post数据
        $data=I('post.');
        //dump($data);
        $id =I('get.id');
        //dump($id);
        $stype=M('bs_type');
        $dd['bs_tid']=$id;
        dump($dd);
        $result=$stype->where($dd)->save($data);
        if ($result) {
            $this->success( '数据修改成功！','/admin/lan/lan');
        } else {
            $this->error('数据修改失败！');
        }
    }
    public function delete(){
        $id =I('get.id');
        //dump($id);
        $stype = M('bs_type');
        $dd['bs_tid']=$id;
        //dump($dd);
        if($stype -> where($dd)->delete()){
            $this->success('删除成功');
        }
        else{
            $this->error('删除失败');
        }

    }

}