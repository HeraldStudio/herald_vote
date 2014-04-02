<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
  public function index(){
  	$this -> display();
  }
  public function voteitem(){
  	$voteid = I('get.voteid');
  	$Vote = D('Vote');
  	if($voteinfo = $Vote -> getVoteById($voteid)){
  		$this -> assign('voteinfo',$voteinfo);
  	}else{
  		$this -> error('404 Error!');
  		return;
  	}
  	$this -> display();
  }
  public function vote(){
  	if(IS_POST){
  		$VoteAction = D('VoteAction');
  		echo $VoteAction -> vote();
  	}else{
  		$this -> error('502 Bad request!');
  	}
  }
}