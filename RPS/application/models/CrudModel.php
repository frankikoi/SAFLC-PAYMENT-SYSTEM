<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    // STUDENTS.PHP
    public function enroll($data)
    {
        return $this->db->insert('tbl_studentInfo',$data);
    }
    public function payments($data)
    {
        return $this->db->insert('tbl_payments',$data);
    }

    public function getMaxId() {
        $this->db->select_max('id');
        $query = $this->db->get('tbl_studentInfo');
        $result = $query->row();
        return $result->id;
    }
    
    public function updateRemaining($st_id, $balance){
        $this->db->set('remaining', $balance);
        $this->db->where('st_id', $st_id);
        $this->db->update('tbl_studentInfo');        
    }
    // END of STUDENTS.PHP
    


}
