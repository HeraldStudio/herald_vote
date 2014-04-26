<?php
namespace Admin\Model;
use Think\Model;

class VoteActionModel extends Model{
	public function getUserJoinVote($userid){
		return $this -> where('user_id='.$userid) -> distinct(true) -> field('vote_id') -> select();
	}
}