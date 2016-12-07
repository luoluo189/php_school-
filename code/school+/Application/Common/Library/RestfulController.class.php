<?php
namespace Common\Library;


use Think\Controller;
use Think\Upload;

abstract class RestfulController extends Controller {
    // 当前待操作的数据表名称
    protected $_tableName = '';
    // 数据表操作对象
    protected $_db;

    protected function _initialize() {

        // 权限校验
        //获取表名
        $controllerName = CONTROLLER_NAME;
        if(!$this->_tableName){
            $this->_tableName = lcfirst($controllerName);
        }
        // 创建自定义模型类
        $this->_db = D($this->_tableName);
    }

    public function index() {
        $this->assign('results', $this->_db->select());
        $this->display();
    }

    public function create() {
        $this->display();
    }

    public function store() {
        // 获取POST数据
        $data = I('post.');
        //上传文件
        $upload = new Upload();
        //2.设置参数
        //设置文件保存目录
        $upload->rootPath='./Public';
        $upload->savePath = '/uploads/';
        //3.上传文件操作（上传后的处理）
        $info = $upload->upload();
        //4.上传后处理
        if($info){
            dump($info);exit;
            //针对多文件
            foreach($info as $key => $value){

                //获取文件保存目录g
                $saveFileName = $info['image']['savepath'].$info['image']['savename'];
                //把图片路径写入doto中
                $data['image'] = $saveFileName;
            }
        }else{
            $this->error('文件上传失败！');
            exit;
        }
        // 插入到数据表中

        $result = $this->_db->add($data);
        // 善后处理
        if ($result) {
            $this->success($this->_tableName . '表数据插入成功！', '/' . MODULE_NAME . '/');
        } else {
            $this->error($this->_tableName . '表数据插入失败！');
        }
    }

    public function show() {
        // 获取GET参数
        $id = I('id');
        // 获取数据并显示视图
        $this->assign('row', $this->_db->find($id));
        $this->display();
    }

    public function edit() {
        $this->display();
    }

    public function update() {

    }

    public function destroy() {

    }
}