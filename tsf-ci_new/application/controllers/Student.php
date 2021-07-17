<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct(); 
		 $this->load->model('student_model');
		 $this->load->helper('user_question_helper');
	}


    //********************************************************************/
    // INDEX
    //********************************************************************/

    public function index(){
        if(check_logged_on()){
        	$list['data'] = $this->student_model->get_quiz_list();
			$loginid=$_SESSION['login_id'];
			$list['useremail']=$loginid;
            $this->load->view('Student/index',$list);
        }
    }
    public function question_paper(){
            $eid=$this->input->get('eid');
            $sn=@$this->input->get('n');
            $total=@$this->input->get('t');
            $tr = $this->student_model->get_question_sheet($eid,$sn,$total);
            //echo'<pre>';print_r($tr);echo'<pre>';
            $list['data']=$tr;
            $list['time']=$this->student_model->get_time($eid);
            $this->load->view('Student/question_sheet',$list);  
    }
    public function check_question(){

      $eid=@$this->input->post('eid');
      $qid=@$this->input->post('qid');

      $loginid=$_SESSION['login_id'];

      $c=0;
      $w=0;
      $marks=0;
      $tot = 0;
      
      foreach($qid as $ki=>$r){
       $tot++;
       $qry="select * from questions where id='".$r."'";
        $qrst =$this->db->query($qry);
        $ques =$qrst->result_array();
        foreach($ques as $key=>$ques){
            

            $this->db->select('*');
            $this->db->from('options');
            $this->db->where('is_correct','1');
            $this->db->where('eid',$eid);
            $this->db->where('qid',$r);
            $rest = $this->db->get();
            $rt = $rest->result_array();
           // print_r($rt);
            foreach($rt as $k1=>$ansr){
                 $aid = "ans$r";
                 $ans = $_POST[$aid];
                 $ansid= $ansr['id'];

                 if($ans[0]==$ansid){
                    $c=$c+1;
                    $marks=$marks+$ques['correct_marks'];
                 }else
                 {
                    $w=$w+1;
                 }
                   
            }
        }

      }

       $date = date('Y-m-d H:i:s');
                   $data = array(
                    'email'=>$loginid,
                    'eid'=>$eid,
                    'score'=>$marks,
                    'level'=>$tot,
                    'sahi'=>$c,
                    'wrong'=>$w,
                    'date'=>$date
                );
                   //print_r($data);

       $qrs = $this->db->insert('history',$data);
       $rt = $this->db->query("SELECT * FROM rank WHERE email='$loginid'");
       $numrow = $rt->num_rows();           
                   $drank = array(
                    'email'=>$loginid,
                    'score'=>$marks,
                    'time'=>$date
                   );
       if($numrow==0){
        $this->db->insert('rank',$drank);
       } 
       else
       {
       	$this->db->where('email', $loginid);
        $this->db->update('rank', $drank);

       }            
       redirect(base_url().'/student/result?eid='.$eid); 
    }
    public function result(){
        $eid=$this->input->get('eid');
        $list['data'] = $this->student_model->getr_result($eid);
        $list['rank'] = $this->student_model->get_rank();
        //echo'<pre>';print_r($list['rank']);
        $this->load->view('Student/result',$list);
    }

}
?>	
