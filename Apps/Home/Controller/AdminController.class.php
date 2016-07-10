<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller{
    //默认后台入口
    public function index(){
        $this->login();
    }

    protected function login(){

       if(empty(I("session.admin"))){
           $this->display("login");
       }else{
           $this->showMain();
       }
    }

    public function loginOut(){
        session("admin",null);
        session_destroy();

        $this->login();
    }

    public function checkLo(){
        //获取用户参数
        $username = I("post.username", "", "addslashes_modified");
        $password = I("post.password", "", "md5");

        if (empty($username) || empty($password) ){
            $this->error("密码或用户名不能为空。");
        }

        $password_loc = M("admin")->where("`username`='{$username}'")->getField("password"); //数据库里密码

        if ($password === $password_loc){
            //保持session回话
            session("admin", $username);
            $this->showMain();
        }else {
            $this->error("密码或用户名错误。");
        }

    }

    public function showNewsList(){
        //新闻列表
        $news = M("news")->field("id,title,author")->select();

        $this->assign("news", $news);
        $this->display("newslist");
    }

    protected function showMain(){
        $res = M("news")->field("COUNT(id) AS total")->select();
        $newsnum  = end($res)["total"];

        $this->assign("newsnum", $newsnum);
        $this->display("main");
    }

    //添加和修改共用一个界面
    public function newsAdd(){
        if(empty(I("post."))){
            $this->display("newsadd");
        }else {
            $Form = M("news");

            /* -----------------------自动验证和自动完成------------------------ */
            $validate = array(
                array('title','require','标题必须填写！'),
                array('author','require','作者必须填写！')
            );

            $auto = array (
                array('dateline','time',1,'function'), // 对password字段在新增的时候使md5函数处理
                array('dateline','time',2,'function') // 对password字段在更新的时候使md5函数处理
            );

            $Form -> setProperty("_auto",$auto);
            $Form -> setProperty("_validate",$validate);
            /* ----------------------------------------------------------- */

            if($Form->create()) {
                 //如果没有传入ID说明是添加
                $result =  empty(I("post.id/d")) ?
                             $Form->add() :         //添加新闻
                             $Form->save();         //更新修改过的新闻
                if($result) {
                    $this->success('数据添加成功！');
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error($Form->getError());
            }
        }
    }

    public function newsedit(){
        $id = I("get.id/d", null, "addslashes_modified");
        if (null === $id){
            $this->error("文章索引有误。");
        }

         //新闻列表
        $news = M("news")->find($id);

        //准备数据
        $this->assign("news", $news);
        //指定数据
        $this->display("newsadd");
    }

    public function newsdel(){
        $id = I("get.id/d", null, "addslashes_modified");
        if (null === $id){
            $this->error("文章索引有误。");
        }

        $res = M("news")->delete($id);

        if($res){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

}
?>