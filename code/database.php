<?php
/**
 * Created by PhpStorm.
 * User: Rain
 * Date: 2017/11/29
 * Time: 18:53
 */

class database{
    public function conn_mysql(){   //连接数据库函数
        $con = mysqli_connect("localhost","root","","leave");//数据库用户名和密码
       mysqli_query($con,"set names utf8;");

//        mysql_select_db("leave", $con); //要连接的数据库名
        return $con;
    }
    public function student_ListInfo($c_name){

        $c_id = $this->get_c_id($c_name);
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT * FROM student WHERE s_c_id="'.$c_id.'"');
        $this->close_mysql($con);   //释放连接
        return $result;
    }
    public function leave_ListInfo(){

        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT * FROM leave2 ');
        $this->close_mysql($con);   //释放连接
        return $result;
    }
    public function student_CardInfo($card){

        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT * FROM student WHERE s_card="'.$card.'"');
        $this->close_mysql($con);   //释放连接
        $result = mysqli_fetch_array($result);
        return $result;
    }
    public function grade_ListInfo(){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT * FROM grade ');
        $this->close_mysql($con);   //释放连接
        return $result;
    }
    public function class_ListInfo($g_name){
        $g_id = $this->get_g_id($g_name);
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT * FROM class WHERE c_g_id="'.$g_id.'"');
        $this->close_mysql($con);   //释放连接
        return $result;
    }
    public function get_g_id($g_name){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT g_id FROM grade WHERE g_name="'.$g_name.'"'); //进行查询操作
        $row = mysqli_fetch_array($result);  //获取查询到的数组
        $this->close_mysql($con);   //释放连接
        return $row['g_id'];
    }
    public function get_c_id($c_name){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'SELECT c_id FROM class WHERE c_name="'.$c_name.'"'); //进行查询操作
        $row = mysqli_fetch_array($result);  //获取查询到的数组
        $this->close_mysql($con);   //释放连接
        return $row['c_id'];
    }
    public function student_InsertInfo($data){
        $data['s_g_id'] = $this->get_g_id($data['s_grade']);
        $data['s_c_id'] = $this->get_c_id($data['s_class']);
        $con = $this->conn_mysql();  //连接mysql
        $return = mysqli_query($con,"INSERT INTO student VALUES(null,'{$data['s_card']}','{$data['s_username']}','{$data['s_phone']}','{$data['s_addtime']}','{$data['s_grade']}','{$data['s_class']}','','{$data['s_state']}','{$data['s_c_id']}','{$data['s_g_id']}')");
//        $return = mysql_query("INSERT INTO student(s_id,s_card,s_username,s_phone,s_addtime,s_grade,s_class,s_lastleave,s_state,s_c_id,s_g_id) VALUES(null,'1','1','1','1','1','1','','1','1','1')",$con);
//        var_dump(mysql_error());die();
        $this->close_mysql($con);   //释放连接
    }
    public function leave_InsertInfo($data){
        $student = $this->student_CardInfo($data['l_s_card']);
//        echo $student['s']
//        $data['l_s_card'] = request('post','str','l_s_card','');
        $data['l_s_username'] = $student['s_username'];
        $data['l_s_grade'] = $student['s_grade'];
        $data['l_s_class'] = $student['s_class'];
        $data['l_s_phone'] = $student['s_phone'];
//        $data['l_begintime'] = request('post','str','l_begintime','');
//        $data['l_endtime'] = request('post','str','l_endtime','');
//        $data['l_day'] = $this->get_Num_Day($data['l_endtime'],$data['l_begintime']);
//        $data['l_address'] = request('post','str','l_address','');
//        $data['l_cause'] = request('post','str','l_cause','');
        $data['l_addtime'] = date("Y-m-d");
//        $data['l_state'] = 0;
//        $data['l_s_id'] = $student['s_id'];
//        $data['l_c_id'] = $this->get_g_id($student['s_class']);
//        $data['l_g_id'] = $this->get_g_id($student['s_grade']);
        $con = $this->conn_mysql();  //连接mysql
        $return = mysqli_query($con,"INSERT INTO leave2(l_id,l_s_card,l_s_username,l_s_grade,l_s_class,l_s_phone,l_begintime,l_endtime,l_addtime,l_address,l_cause) VALUES(null,'{$data['l_s_card']}','{$data['l_s_username']}','{$data['l_s_grade']}','{$data['l_s_class']}','{$data['l_s_phone']}','{$data['l_begintime']}','{$data['l_endtime']}','{$data['l_addtime']}','{$data['l_address']}','{$data['l_cause']}')",$con);
//        $return = mysql_query('INSERT INTO leave_cop(l_id,l_s_card,l_s_username,l_s_grade,l_s_class,l_s_phone,l_begintime,l_endtime,l_addtime,l_address,l_cause) VALUES(null,"11","11","11","11","11","11","11","11","11","11")');
//        var_dump(mysqli_error());
        $this->close_mysql($con);   //释放连接
    }
    public function class_InsertInfo($data){
//        var_dump($data);exit();
        $data['c_g_id'] = $this->get_g_id($data['c_grade']);
        $data['c_addtime'] = strval(date("Y-m-d"));
        $con = $this->conn_mysql();  //连接mysql
        mysqli_query($con,"INSERT INTO class VALUES (null,'{$data["c_name"]}','{$data["c_addtime"]}','{$data["c_grade"]}','{$data["c_g_id"]}')");
        $this->close_mysql($con);   //释放连接
    }
    public function grade_InsertInfo($data){
//        var_dump($data);exit();
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,"INSERT INTO grade VALUES (null ,'{$data['g_name']}','{$data['g_addtime']}')");
        $this->close_mysql($con);   //释放连接
    }
    public function student_delete($s_id){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'DELETE FROM student WHERE s_id="'.$s_id.'"');
        $this->close_mysql($con);   //释放连接
    }
    public function leave_delete($s_id){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'DELETE FROM leave2 WHERE l_id="'.$s_id.'"');
        $this->close_mysql($con);   //释放连接
    }
    public function grade_delete($s_id){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'DELETE FROM grade WHERE g_id="'.$s_id.'"');
        $this->close_mysql($con);   //释放连接
    }
    public function class_delete($s_id){
        $con = $this->conn_mysql();  //连接mysql
        $result = mysqli_query($con,'DELETE FROM class WHERE c_id="'.$s_id.'"');
        $this->close_mysql($con);   //释放连接
    }
    public function close_mysql($con){  //释放连接的函数
        mysqli_close($con);
    }

}