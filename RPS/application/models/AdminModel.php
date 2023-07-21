<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getNurseryTuition(){
        $query = $this->db->select('*')
                            ->from('tbl_tuition')
                            ->where("(sc_SY = CONCAT(YEAR(CURDATE()), '-', YEAR(CURDATE()) + 1)
                                    OR (YEAR(CURDATE()) + 1 = YEAR(CURDATE()) AND MONTH(CURDATE()) >= 7))
                                    AND sc_level = 'Nursery'")
                            ->get();
        return $query->result();
    }
    public function getNursery2Tuition(){
        $query = $this->db->select('*')
                            ->from('tbl_tuition')
                            ->where("(sc_SY = CONCAT(YEAR(CURDATE()), '-', YEAR(CURDATE()) + 1)
                                    OR (YEAR(CURDATE()) + 1 = YEAR(CURDATE()) AND MONTH(CURDATE()) >= 7))
                                    AND sc_level = 'Nursery2'")
                            ->get();
        return $query->result();
    }
    public function getKinderTuition(){
        $query = $this->db->select('*')
                            ->from('tbl_tuition')
                            ->where("(sc_SY = CONCAT(YEAR(CURDATE()), '-', YEAR(CURDATE()) + 1)
                                    OR (YEAR(CURDATE()) + 1 = YEAR(CURDATE()) AND MONTH(CURDATE()) >= 7))
                                    AND sc_level = 'Kinder'")
                            ->get();
        return $query->result();
    }

    public function loginAdmin($username, $password){
        $this->db->WHERE('username', $username);
        $this->db->WHERE('password', $password);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }
    public function viewStudents(){
        $query = $this->db->get('tbl_studentInfo');
        return $query->result();
    }
    public function viewPayments(){
        $query = $this->db->get('tbl_payments');
        return $query->result();
        
    }
    public function getRowsById($id){
        // $query = "SELECT * FROM tbl_payments WHERE st_id = ?";
        $query = $this->db->get_where('tbl_payments', array('st_id' => $id));
        return $query->result();
        
    }

    public function countStudents(){ 
        $currentYear = date('Y');
        $nextYear = date('Y', strtotime('+1 year'));
        $query = $this->db->SELECT('*')
                            ->FROM('tbl_studentInfo')
                            ->WHERE("st_dateEnrolled BETWEEN '$currentYear-06-01' AND '$nextYear-08-31'")
                            ->get()
                            ->result(); 
        $pendingQuery = $this->db->SELECT('*')
                                ->FROM('tbl_studentInfo')
                                ->WHERE("remaining !=", 0)
                                ->get()
                                ->result();
        $fullQuery = $this->db->SELECT('*')
                            ->FROM('tbl_studentInfo')
                            ->WHERE("remaining =", 0)
                            ->get()
                            ->result();
        $result = array(
            'countStudent' => $query,
            'countPending' => $pendingQuery,
            'countFull' => $fullQuery
        );
        return $result;
    }

    // public function countPending(){
    //     $query =$this->db->where('')
    // }




}
