<?php
namespace Admin\Model;
use Think\Model;
class VoteItemModel extends model{
	public function createItem($vote_id){
		$item_name = I('post.vote_item_name');
		$item_attach = I('post.vote_item_attach');
		$item_description = I('post.vote_item_description');
		if(!empty($item_name)){
			foreach ($item_name as $key => $item) {
				if(!empty($item)){
					$data[] = array('name' => $item,'attachment' => $item_attach[$key] , 'description' => $item_description[$key] ,'vote_id' => $vote_id);
				}
			}
			$this -> addAll($data);
		}else{
			return "itemempty";
		}
		
		
	}

	public function deleteItem($voteid){
		$this->where('vote_id='.$voteid)->delete();
	}
}