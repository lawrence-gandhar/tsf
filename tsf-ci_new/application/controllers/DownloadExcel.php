<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadexcel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('excel');
		$this->load->model('Admin_model');
	}

    //********************************************************************/
    // INDEX
    //********************************************************************/
    public function index(){

    	$title = $this->input->get('title');

    	$this->excel->setActiveSheetIndex(0);
		
		$this->excel->getActiveSheet()->setTitle($title);

		$data = $this->getHeader($title);

		$fontStyle = [
		    'font' => [
		    	'bold'  => true,
        		'color' => array('rgb' => 'FF0000'),
		        'size' => 12
		    ]
		];

		$this->excel->getActiveSheet()
		    ->getStyle("A1:L1")
		    ->applyFromArray($fontStyle);
		
		 // read data to active sheet
		 $this->excel->getActiveSheet()->fromArray($data);
		 
		 $filename=$title.date('YmdHis').'.xls'; 
		 header('Content-Type: application/vnd.ms-excel'); 
		 
		 header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		 
		 header('Cache-Control: max-age=0');
		 
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 
		 //force to download the Excel file
		 $objWriter->save('php://output');
		        
    }

    public function getHeader($title){
    	if($title=='school list'){
    		$header[0][]='Registartion ID';
    		$header[0][]='School Name';
    		$header[0][]='Principal Name';
    		$header[0][]='Mobile no';
    		$header[0][]='School Phone No';
    		$header[0][]='Address';
    		$header[0][]='City';
    		$header[0][]='State';
    		$header[0][]='Pincode';
    		$header[0][]='Email-id';
    		$header[0][]='Registered on';

    		$_school_list = $this->Admin_model->get_school_list();
    		$i=0;
    		 foreach($_school_list as $k=>$rows){
    		 	$i++;
    		 	$header[$i][]=$rows['reg_id'];
	    		$header[$i][]=$rows['name'];
	    		$header[$i][]=$rows['pr_name'];
	    		$header[$i][]=$rows['pr_mob'];
	    		$header[$i][]=$rows['phone'];
	    		$header[$i][]=$rows['address'];
	    		$header[$i][]=$rows['city'];
	    		$header[$i][]=$rows['state'];
	    		$header[$i][]=$rows['pin'];
	    		$header[$i][]=$rows['sm_email'];
	    		$header[$i][]=$rows['reg_on'];

    		 }
    	}

    	return $header;
    }


}
?>