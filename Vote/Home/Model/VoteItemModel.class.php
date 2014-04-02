<?php

namespace Home\Model;
use Think\Model;

class VoteItemModel extends Model{
	public function getVoteItemById($voteid){
		return $this -> where('vote_id='.$voteid) -> select();
	}
}