<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\logic\ArticleLogic;

class Article extends Controller
{

    protected $article;

    public function __construct(ArticleLogic $article)
    {
        parent::__construct();
        $this->article =  $article;

    }


    //文章列表
    public function index()
    {

        return view();
    }



    //添加页
    public function create()
    {
        return  view();
    }



    //保存数据
    public function save()
    {
        return $this->article->create(input('post.'));
    }


    //编辑页
    public function edit($id)
    {

        $article  =  $this->article->getInfo($id);
        return view('edit',['article'=>$article]);
    }



    //修改数据
    public function update(Request $request, $id)
    {
        return  $this->article->update(input('post.'));
    }



    // 删除数据
    public function delete($id)
    {
        return $this->article->delete($id);
    }




    //修改状态
    public function status()
    {
        return $this->article->status();
    }


}
