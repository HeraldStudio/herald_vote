<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

  public function index(){
    $Vote = D('Vote');
    $voteinfo = $Vote -> getLastVote();
    $this -> header();
    $this -> assign('voteinfo',$voteinfo);
  	$this -> display();
  }
  public function voteitem(){
  	$voteid = I('get.voteid');
  	$Vote = D('Vote');
    $this -> header();
  	if($voteinfo = $Vote -> getVoteById($voteid)){
  		$this -> assign('voteinfo',$voteinfo);
  	}else{
  		$this -> error('404 Error!');
  		return;
  	}
    $morevote = $Vote -> getLastVote();
    $this -> assign('morevote',$morevote);
  	$this -> display();
  }
  public function niuren(){
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
  public function logout(){
    if(IS_POST){
      if(!empty($_COOKIE['HERALD_USER_SESSION_ID'])){
        $ch = curl_init();
          $postdata ="cookie=".$_COOKIE['HERALD_USER_SESSION_ID'];
          curl_setopt($ch, CURLOPT_URL, 'http://herald.seu.edu.cn/useraccount/logout.php');
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
          $responseword = curl_exec($ch);
          curl_close($ch);
        echo "退出成功";
        return;
      }else{
        echo "未知错误";
        return;
      }
    }else{
      echo "非法请求";
    }
  }

  private function header(){
    $loginuserinfo = currentUser();
    $this -> assign('loginuserinfo',$loginuserinfo);
  }
}