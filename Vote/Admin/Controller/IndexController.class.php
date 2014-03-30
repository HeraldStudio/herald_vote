<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		$this -> display();
	}

	public function createVote(){
		if(IS_POST){
			$Vote = D('Vote');
			if(I('post.vote_post')){
				$upload = new \Think\Upload();

				$upload->maxSize = 3145728 ;// 设置附件上传大小
	      $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
	      $info = $upload->upload();

	      if(!$info){
	      	$this->error($upload->getError());
	      }else{
	      	$this->success('上传成功!');
	      }
			}
			
			$Vote -> createVote();
		}else{
			$this -> error('502 Bad request!');
		}
	}
}