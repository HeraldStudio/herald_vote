<?php
namespace Home\Model;
use Think\Model;

class VoteModel extends Model{
	public function getVoteById($voteid){
		$voteinfo = $this -> where('id='.$voteid) -> find();
		if(!empty($voteinfo)){
			$voteinfo['voteitem'] = $this -> getVoteItem($voteinfo['id']);
			$voteinfo['state'] = $this -> getVoteState($voteinfo['expired_time']);
			$voteinfo['displaytype'] = $this -> getVoteDisplayType($voteinfo['voteitem']);
			return $voteinfo;
		}
		return false;
	}

	private function getVoteItem($voteid){
		$VoteItem = D('VoteItem');
		return $VoteItem -> getVoteItemById($voteid);
	}

	private function getVoteState($expiredtime){
		if(strtotime($expiredtime) >= strtotime(date("Y-m-d",time()))){
			return true;
		}else{
			return false;
		}
	}

	private function getVoteDisplayType($voteitem){
		$flag = 0;
		foreach ($voteitem as $value) {
			if(!empty($value['attachment'])){
				$flag++;
			}
		}
		if($flag == count($voteitem)){
			return 'picture';
		}else{
			return 'text';
		}
	}
}