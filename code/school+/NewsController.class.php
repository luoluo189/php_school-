<?php
/**
 * Created by PhpStorm.
 * User: 高小力
 * Date: 2016/9/13
 * Time: 10:11
 */

namespace Admin\Controller;


use Common\Controller\RestfulController;

class NewsController extends RestfulController
{
    protected $_tableName="news";
    /*public function index(){
        $this->assign('news',M('news')->select());
        $this->display();
    }*/
    public function index(){
        $newsTable=M('news');
        //1.获取author_id=3记录总条数
        $count=$newsTable->where('author_id=3')->count();
        //2.设置（获取）每一页显示的个数
        $pageSize=3;
        //3.创建分页对象
        $page=new \Think\Page($count,$pageSize);
        //4.分页查询
        $results=$newsTable->where('author_id=3')->limit($page->firstRow.','.$page->listRows)->select();
        //5.输出查询结果
        $this->assign('news',$results);
        //6.输出分页码
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $this->assign('pages',$page->show());
        //7.显示视图文件
        $this->display();
    }

}