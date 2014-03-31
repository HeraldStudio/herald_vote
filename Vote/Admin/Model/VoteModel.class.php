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
		// $currentuser = currentUser();
		// if($currentuser){
			$data['topic'] = I('post.topic');
			$data['user_id'] = '213111517';//$currentuser[0];
			$data['description'] = I('post.description');
			if( I('post.vote_type') == 1){
				$data['type'] = I('post.vote_type');
				$data['limit'] = "1";
			}elseif( I('post.vote_type') == 2 ){
				$data['type'] = I('post.vote_type');
				$data['limit'] = I('post.vote_limit_number');
			}

			$data['create_time'] = date('Y-m-d');
			//echo $time = I('post.expired_time');
			$data['expired_time'] = I('post.expired_time');//date('Y-m-d',strtotime($time));
			if(!$this -> create()){
				exit($this->getError());
			}else{
				$vote_id = $this -> add($data);
				if($vote_id){
					$VoteItem = D('VoteItem');
					$VoteItem -> createItem($vote_id);
				}
			}
			
		// }else{
		// 	echo '未登录!';
		// }
	}
}