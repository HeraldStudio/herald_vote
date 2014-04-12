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
			$voteinfo['joinnum'] = $this -> getJoinNum($voteinfo['id']);
			$voteinfo['canvote'] = $this -> canuservote($voteinfo['id'],$voteinfo['limit']);
			return $voteinfo;
		}
		return false;
	}

	public function getVoteLimitById($voteid){
		return $this -> where('id='.$voteid) -> getField('limit');
	}

	private function getVoteItem($voteid){
		$VoteItem = D('VoteItem');
		$VoteAction = D('VoteAction');
		$voteitems = $VoteItem -> getVoteItemById($voteid);
		foreach ($voteitems as $key => $voteitem) {
			$resultcount = $VoteAction -> getVoteResult($voteid,$voteitem['id']);
			$voteitems[$key]['resultcount'] = (int)($resultcount*100);
			$voteitems[$key]['supportnum'] = $VoteAction -> getItemSupportNum($voteitem['id']);
		}
		return $voteitems;
	}

	private function getJoinNum($voteid){
		$VoteAction = D('VoteAction');
		return $VoteAction -> getVoteJoinNum($voteid);
	}

	private function getVoteState($expiredtime){
		if(strtotime($expiredtime) >= strtotime(date("Y-m-d",time()))){
			return true;
		}else{
			return false;
		}
	}

	private function canuservote($voteid,$limit){
		$VoteAction = D('VoteAction');
		return $VoteAction -> canUserVote('213111517',$voteid,$limit);
	}

	private function getVoteDisplayType($voteitem){
		$flag = 0;
		foreach ($voteitem as $value) {
			if(!empty($value['attachment'])){
				$flag++;
			}
		}
		if($flag == count($voteitem)){
			$filename = explode('.',$voteitem[0]['attachment']);
			if($filename[1] == 'mp4'){
				return 'video';
			}
			return 'picture';
		}else{
			return 'text';
		}
	}
}