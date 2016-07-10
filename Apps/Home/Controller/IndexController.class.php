<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->showList();
    }

    //显示新闻列表
    public function showList(){
        $news = M("news")->select();

        load("@.listshow");
        listNews($news);

        $this->assign("news",$news);

        $this->display("Index:showList");
    }

    //显示新闻详情
    public function showDetail(){
        $id = I("get.id/d", null, "addslashes_modified");

        if (null === $id || !is_numeric($id)){
            $this->error("文章索引有误。");
        }

        $news = array(M("news")->find($id));

        load("@.listshow");
        listNews($news, false);

        $this->assign("news",$news);

        $this->display("Index:showList");

    }
}