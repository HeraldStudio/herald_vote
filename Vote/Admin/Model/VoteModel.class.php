<?php
namespace Admin\Model;
use Think\Model;
class VoteModel extends Model{
	protected $_validate = array(
		// array('user_id','currentUser','未登录!','0','function'),
		array('topic','require','请填写投票主题!'),
		array('expired_time','require','请填写过期时间!'),
		array('type','require','请选择类型!'),
		array('limit','require','请填写限投票数!'),

	);

	// protected $_auto = array(
	// 	array('create_time','time',1,'fucntion'),
	// );

	public function createVote(){
		$currentuser = currentUser();
		if($currentuser){
			$data['topic'] = I('post.topic');
			$data['user_id'] = $currentuser[0];
			$data['description'] = I('post.description');
			if( I('post.vote_type') == 1){
				$data['type'] = I('post.vote_type');
				$data['limit'] = "1";
			}elseif( I('post.vote_type') == 2 ){
				$data['type'] = I('post.vote_type');
				$data['limit'] = I('post.vote_limit_number');
			}
			$data['image'] = I('post.vote_image');
			$data['create_time'] = date('Y-m-d');
			$data['expired_time'] = I('post.expired_time');
			if(!$this -> create()){
				exit($this->getError());
			}else{
				$vote_id = $this -> add($data);
				if($vote_id){
					$VoteItem = D('VoteItem');
					$VoteItem -> createItem($vote_id);
				}
			}
		}else{
			echo '未登录!';
		}
	}

	public function deleteVote(){
		$currentuser = currentUser();
		if($currentuser){
			$voteid = I('post.vote_id');
			$this->where('id='.$voteid)->limit('1')->delete();
			$VoteItem = D('VoteItem');
			$VoteItem -> deleteItem($voteid);
		}else{
			echo '未登录!';
		}
	}

	public function getVoteByUserId(){
		$userid = I('get.userid');
		$uservotes = $this -> where('user_id='.$userid) -> order('create_time') -> select();
		return $this -> getVoteState($uservotes);
	}

	public function getUserJoinById(){
		$userid = I('get.userid');
		$VoteAction = D('VoteAction');
		$userJoinVotes = $VoteAction -> getUserJoinVote($userid);
		$voteinfo = array();
		foreach ($userJoinVotes as $key => $userJoinVote) {
			array_push($voteinfo, $this -> getVoteById($userJoinVote['vote_id']));
		}
		return $this -> getVoteState($voteinfo);
	}

	public function getVoteState($voteinfo){
		foreach($voteinfo as $key => $uservote){
			if(strtotime($uservote['expired_time']) >= strtotime(date("Y-m-d",time()))){
				$voteinfo[$key]['state'] = "正在进行";
			}else{
				$voteinfo[$key]['state'] = "已结束";
			}
		}
		return $voteinfo;
	}

	public function getVoteById($voteid){
		return $this -> where('id='.$voteid) -> find();
	}
}