<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class ModuleManage  extends CI_Model
{

  

  public function __construct() 
  {
		
  }

    
  public function moduleUpdate($arr)
  {  

    $data=array(
     'user_level'=>$arr['user_level'],
     'module'=>$arr['module_name'],
     'action'=>$arr['action'],
     'view'=>$arr['view'],
     'delete'=>$arr['delete'],
     'update'=>$arr['update']
     ); 
     
     $this->db->where('id', $arr['id']);
     $this->db->update(PR.'module', $data);

     return 'OK';
  }
    
    
  public function dataFetch()
  {          
      $this->db->select('*');
      $this->db->order_by('module', 'asc'); 
      $newid = $this->db->get(PR.'module');
      return $newid->result();
  }   

  public function updateStatusId($id, $status)
  {          

      $this->db->where('id', $id);
      $out = $this->db->update(PR.'module', array('status' => $status));

      return $out;
  }   

  public function dataFetchById($id)
  {          
      $newid = $this->db->select('*')->get_where(PR.'module', array('id'=>$id));
      return $newid->result();
  }  

  public function moduleInsert($arr)
  {      

     $data=array(
         'user_level'=>$arr['user_level'],
         'module'=>$arr['module_name'],
         'action'=>$arr['action'],
         'view'=>$arr['view'],
         'delete'=>$arr['delete'],
         'update'=>$arr['update']
         ); 
      
      $newid = $this->db->insert(PR.'module', $data);
      return $newid;
  }


}
