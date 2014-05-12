<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		$loginuserinfo = currentUser();
		if(!$loginuserinfo){
			$this -> error('登录后才可以访问！');
			return;
		}
		$userid = $loginuserinfo[0];
		$this -> getICreateVote($userid);
		$this -> assign('loginuserinfo',$loginuserinfo);
		$this -> display();
	}
	public function myjoin(){
		$loginuserinfo = currentUser();
		if(!$loginuserinfo){
			$this -> error('登录后才可以访问！');
			return;
		}
		$userid = $loginuserinfo[0];
		$this -> getIJoinVote($userid);
		$this -> assign('loginuserinfo',$loginuserinfo);
		$this -> display();
	}

	public function publish(){
		$loginuserinfo = currentUser();
		if(!$loginuserinfo){
			$this -> error('登录后才可以访问！');
			return;
		}
		$userid = $loginuserinfo[0];
		$this -> assign('loginuserinfo',$loginuserinfo);
		$this -> display();
	}

	public function createVote(){
		if(IS_POST){
			$Vote = D('Vote');
			$Vote -> createVote();
			header("Location: http://herald.seu.edu.cn/herald_vote/index.php/admin/index/index.html");
		}else{
			$this -> error('502 Bad request!');
		}
	}

	public function addVotePost(){
		$upload = new \Think\Upload();
	    $upload->maxSize = 3145728 ;
	    $upload->autoSub = false;
	    $upload->exts = array('jpg', 'gif', 'png', 'jpeg','mp4');// 设置附件上传类型
	    $upload->savePath = '/';

	    $ret = array(); 
	    $info   =   $upload->uploadOne($_FILES['vote_post']);
	    if(!$info) {
	    		array_push($ret, $upload->getError());
	    }else{
	    }
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

	private function getICreateVote($userid){
		$Vote = D('Vote');
		$IcreateVote = $Vote -> getVoteByUserId($userid);
		$this -> assign('voteinfo',$IcreateVote);
	}

	private function getIJoinVote($userid){
		$Vote = D('Vote');
		$IJoinVote = $Vote -> getUserJoinById($userid);
		$this -> assign('voteinfo',$IJoinVote);
	}
}