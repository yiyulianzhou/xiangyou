<?php
/**
 * 增加日志
 * @param $log
 * @param bool $name
 */

function addlog($log, $name = false)
{
    $Model = M('admin_log');
    if (!$name) {
        session_start();
        $id = session('id');
        if ($uid) {
            $user = M('admin')->field('name')->where(array('id' => $id))->find();
            $data['name'] = $user['name'];
        } else {
            $data['name'] = '';
        }
    } else {
        $data['name'] = $name;
    }
    $data['t'] = time();
    $data['ip'] = $_SERVER["REMOTE_ADDR"];
    $data['log'] = $log;
    $Model->data($data)->add();
}


/**
 *
 * 获取用户信息
 *
 **/
function member($uid, $field = false)
{
    $model = M('admin_member');
    if ($field) {
        return $model->field($field)->where(array('uid' => $uid))->find();
    } else {
        return $model->where(array('uid' => $uid))->find();
    }
}
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}

function formatTime($timer) {
    $diff = $_SERVER['REQUEST_TIME'] - $timer;
    $day = floor($diff / 86400);
    $free = $diff % 86400;
    if($day > 0) {
        if($day>365){
            return floor($day/365)."年前";
        }
        if($day>30){
            return floor($day / 30)."月前";
        }
        if($day>7){
            return floor($day / 7)."月前";
        }
        return $day."天前";
    }else{
        if($free>0){
            $hour = floor($free / 3600);
            $free = $free % 3600;
            if($hour>0){
                return $hour."小时前";
            }else{
                if($free>0){
                    $min = floor($free / 60);
                    $free = $free % 60;
                    if($min>0){
                        return $min."分钟前";
                    }else{
                        if($free>0){
                            return $free."秒前";
                        }else{
                            return '刚刚';
                        }
                    }
                }else{
                    return '刚刚';
                }
            }
        }else{
            return '刚刚';
        }
    }
}
function GetMounths($y="2017",$m){
        return array("start"=>strtotime("$y-$m-1"),"end"=>strtotime("$y-$m-".date("t",strtotime("$y-$m-1"))),"long"=>date("t",strtotime("$y-$m-1")));
    }
function PlusArray($data=0,$array=array()){
    if(!is_numeric($data)){
        return false;
    }
    foreach ($array as $key => $value) {
        $result+=$value;
    }
    return $result;
}
