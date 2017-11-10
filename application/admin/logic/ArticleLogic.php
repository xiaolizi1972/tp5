<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Article;
use app\admin\logic\BaseLogic;


class ArticleLogic extends BaseLogic
{
   

    protected  $model;

    public function  _initialize()
    {

        $this->model  = new Article;

    }



	//添加数据
	public function   create($post)
	{
		 $article   =   new Article();

		 $article->title    =  $post['title'];
		 $article->content  =  $post['content'];
		 $article->cover_id =  $post['cover_id'];
		 $article->desc     =  $post['desc'];
		 $article->cate_id  =  $post['cate_id'];
		 $article->keywords =  $post['keywords'];
		 $article->status   =  isset($post['status'])?'1':'0';

		 if($article->save()) {

		 	return api(200,'操作成功');
		 }

		 return api(500,'操作失败');
		
	}



	//修改数据
	public function   update($post)
	{
		 $article  =  Article::get($post['id']);

		 $article->title    =  $post['title'];
		 $article->content  =  $post['content'];
		 $article->cover_id =  $post['cover_id'];
		 $article->desc     =  $post['desc'];
		 $article->cate_id  =  $post['cate_id'];
		 $article->keywords =  $post['keywords'];
		 $article->status   =  isset($post['status'])?'1':'0';


		 if($article->save()) {

		 	return api(200,'操作成功');
		 }

		 return api(500,'操作失败');
	}





}
