<?php
namespace Feedback\Model;
use Think\Model;

class FeedbackModel extends Model {



    protected function _before_insert(&$data, $option) {

                   $user_id = $_SESSION['user_id'];
                   $sql = "select username,mobile from wei_member where id = $user_id;";
                   $info = $this->query($sql);
                   
                   $data['user_id'] = $user_id;
                   $data['user_name'] = $info[0]['username'];
                   $data['user_phone'] = $info[0]['mobile'];
                   $data['addtime'] = date('Y-m-d H:i:s');


        
    }


}
