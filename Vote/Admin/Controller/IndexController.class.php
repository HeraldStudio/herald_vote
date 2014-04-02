<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		$userid = I('get.userid');
		if(empty($userid)){
			$this -> error('登录后才可以访问！');
			return;
		}
		$this -> getUserVotes();
		$this -> display();
	}

	public function createVote(){
		if(IS_POST){
			$Vote = D('Vote');
			$Vote -> createVote();
			// $this -> display('index');
		}else{
			$this -> error('502 Bad request!');
		}
	}

	public function addVotePost(){
		$upload = new \Think\Upload();
    $upload->maxSize = 3145728 ;
    $upload->autoSub = false;
    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->savePath = '/';

    $ret = array(); 
    $info   =   $upload->uploadOne($_FILES['vote_post']);
    if(!$info) {
    		array_push($ret, $upload->getError());
    }else{
    }
    \Think\Log::write($info['savename']);
    echo $info['savename'];
	}

	public function deleteVote(){
		if(IS_POST){
			$Vote = D('Vote');
			$Vote -> deleteVote();
			echo "success";
		}else{
			$this -> error('502 Bad request!');
		}
	}

	private function getUserVotes(){
		$Vote = D('Vote');
		$uservote = $Vote -> getVoteByUserId();
		$this -> assign('uservote',$uservote);
	}
}