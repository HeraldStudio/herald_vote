<?php
namespace Admin\Model;
use Think\Model;
class VoteItemModel extends model{
	public function createItem($vote_id){
		$item_data = I('post.vote_item');
		foreach ($item_data as $key => $item) {
			if(!empty($item[0])){
				$data[] = array('name' => $item, 'vote_id' => $vote_id);
			}
		}
		$this -> addAll($data);
	}
}