<?php
namespace app\admin\logic;

use think\Controller;
use app\common\model\Article;


class ArticleLogic extends Controller
{
    //
	public function getList()
	{

		return  Article::paginate();


	}



	//获取详情
	public function getInfo($id)
	{
		
		return Article::get($id);

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
		 $article->status   =  isset($post['status'])?'1':'0';

		 if($article->save()) {

		 	return api(200,'操作成功');
		 }

		 return api(500,'操作失败');
		
	}



	//修改数据
	public function   update()
	{
		 $article  =  Article::get($post['id']);

		 $article->title    =  $post['title'];
		 $article->content  =  $post['content'];
		 $article->cover_id =  $post['cover_id'];
		 $article->desc     =  $post['desc'];
		 $article->cate_id  =  $post['cate_id'];
		 $article->status   =  isset($post['status'])?'1':'0';


		 if($article->save()) {

		 	return api(200,'操作成功');
		 }

		 return api(500,'操作失败');
	}


	//删除数据
	public function   delete()
	{

	}

	//数据状态
	public function  status()
	{



	}


}
