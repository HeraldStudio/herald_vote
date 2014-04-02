<?php

namespace Home\Model;
use Think\Model;

class VoteActionModel extends Model{
	public function vote(){
		$data['vote_id'] = I('post.vote_id');
		//$data['vote_item_id'] = I('post.item_id');
		echo 'ss';
		// $data['user_id'] = '213111517';
		// if(!$this->create()){
		// 	exit($this->getError());
		// }else{
		// 	$this->add($data);
		// 	return "success";
		// }
	}
}