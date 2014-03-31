<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		$this -> display();
	}

	public function createVote(){
		if(IS_POST){
			$Vote = D('Vote');
			$Vote -> createVote();
		}else{
			$this -> error('502 Bad request!');
		}
	}
}