<?php

class UserController{

public function usersList(){
	$userModel = new UserModel();
	$list = $userModel->UsersList(1,1,"id");
	echo json_encode($list);
}


}