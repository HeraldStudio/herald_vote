<?php

namespace Home\Model;
use Think\Model;

class VoteActionModel extends Model{
	public function vote(){
		$voteid = I('post.vote_id');
		$voteiteminfos = I('post.item_info');

		if(!$this -> canvote($voteid, count($voteiteminfos))){
			return json_encode(array('type'=>'danger', 'content' => '您的总投票数超过了投票设定的数目，无法提交数据，请重新选择!'));
		}
		if(!$this -> addData($voteid, $voteiteminfos)){
			return json_encode(array('type'=>'danger', 'content' => '抱歉，先声服务器貌似除了点问题，我们正在玩命修复中!'));
		}else{
			$canvote = $this -> canvote($voteid, count($voteiteminfos));
			$lastresult = $this -> getLastResult($voteid);
			$lastsupportnum = $this -> getLastSupportNum($voteid);
			return json_encode(array('type'=>'success', 'content' => '投票成功，感谢您的参与！','canvote' => $canvote, 'lastresult' => $lastresult, 'lastsupportnum' => $lastsupportnum));
		}
	}

	private function canvote($voteid,$votingitmecount){
		$votedcount = $this -> getVotedCount('213111517',$voteid);
		$Vote = D('Vote');
		$limit = $Vote -> getVoteLimitById($voteid);
		if($votedcount + $votingitmecount > $limit){
			return false;
		}
		return true;
	}

	private function getVotedCount($userid,$voteid){
		return $this -> where('user_id='.$userid.' AND vote_id='.$voteid) -> count();
	}

	public function getVoteJoinNum($voteid){
		return $this -> where('vote_id='.$voteid) -> count();
	}

	public function getItemSupportNum($itemid){
		return $this -> where('vote_item_id='.$itemid) -> count();
	}

	public function getVoteResult($voteid,$itemid){
		$votesumcount = $this -> where('vote_id='.$voteid) -> count();
		$itemsuncount = $this -> where('vote_item_id='.$itemid) -> count();
		return $itemsuncount/$votesumcount;
	}

	public function getLastResult($voteid){
		$VoteItem = D('VoteItem');
		$iteminfos = $VoteItem -> getVoteItemById($voteid);
		foreach ($iteminfos as $key => $iteminfo) {
			$lastarray[$iteminfo['id']] = $this -> getVoteResult($voteid,$iteminfo['id']);
		}
		return $lastarray;
	}

	public function getLastSupportNum($voteid){
		$VoteItem = D('VoteItem');
		$iteminfos = $VoteItem -> getVoteItemById($voteid);
		foreach ($iteminfos as $key => $iteminfo) {
			$lastarray[$iteminfo['id']] = $this -> getItemSupportNum($iteminfo['id']);
		}
		return $lastarray;
	}

	public function canUserVote($userid,$voteid,$limit){
		$uservotenum = $this -> where('user_id='.$userid.' AND vote_id='.$voteid) -> count();
		if($uservotenum < $limit){
			return true;
		}
		return false;
	}

	// private function isDataValidity(){
	// 	if(empty($this -> voteid) || empty($this -> voteiteminfos)){
	// 		return false;
	// 	}
	// 	return true;
	// }

	private function isVoteInLimit($voteiteminfos,$limit){
		if(count($voteiteminfos) + $this -> getUserVoteNum() > $limit){
			return false;
		}
		return true;
	}

	private function addData($voteid,$voteiteminfos){
		foreach ($voteiteminfos as $voteiteminfo) {
			$datalist[] = array('user_id' => '213111517', 'vote_id' => $voteid, 'vote_item_id' => $voteiteminfo);
		}
		if(!$this -> create()){
			return false;
		}else{
			$this->addAll($datalist);
			return true;
		}
	}

	// private function getUserVoteNum(){
	// 	$userid = '213111517';
	// 	return $uservotenum = 
	// }
}