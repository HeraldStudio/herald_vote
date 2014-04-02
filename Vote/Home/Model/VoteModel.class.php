<?php
namespace Home\Model;
use Think\Model;

class VoteModel extends Model{
	public function getVoteById($voteid){
		$voteinfo = $this -> where('id='.$voteid) -> find();
		if(!empty($voteinfo)){
			return $voteinfo;
		}
		return false;
	}
}