<?php
class Outlet_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				//$this->load->model('mail_model');
        }
		


public function get_outlet($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get_where('outlets',array('status'=>'approved'));
                return $query->result_array();
        }
        $query = $this->db->get_where('outlets', array('id' => $id));
        return $query->row_array();
}

public function get_partnership_requests()
{
        $query = $this->db->get_where('outlets', "status='pending' OR status='denied'");
        return $query->result_array();
}

/* Get the list of states */
public function get_state()
{
               $values="";
 
                $query = $this->db->get('states');
                $res =$query->result_array();

		foreach($res as $r){
		$values.=$r['state_id'].":".$r['name']."|";
		}
		echo $values;
}

/* Get the list of states */
public function get_lga($id)
{
       $values="";
       if($id){
                $query = $this->db->get_where('locals', array('state_id' => $id));
                $res=$query->result_array();
				

		foreach($res as $r){
		$values.=$r['local_name']."|";
		}
	}
		echo $values;
}


public function add_outlet()
{
    $this->load->helper('url');
    unset($_POST['add_outlet']);
	$data=array();
	$sql="CREATE TABLE outlets (id INT(10) AUTO_INCREMENT,";
	foreach($_POST as $key=>$value){
	$sql.=$key." VARCHAR(255), ";
	if($key=="product_category")
	$value=implode(",",$value);
    $data[$key]=$value;
	}
	$sql.=" date_added VARCHAR (100), PRIMARY KEY (ID) );";
	//var_dump($this->db->query($sql)); exit;
	
	
    $query = $this->db->get_where('outlets', array('name'=>$_POST['name']));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	$query = $this->db->get('outlets');
	$fetched = $query->row_array();
	$pass = substr(sha1((count($fetched)+1)."out_pass"),0,10);
	$data['temp_password']=$pass;
	$data['password']=sha1($pass);
	
    return $this->db->insert('outlets', $data);
}

public function save_outlet()
{
    $this->load->helper('url');
	$id=$this->input->post('id');
    unset($_POST['save_outlet']);
	//if(!isset($_POST['file']) && $_POST['file']=="")
	//unset($_POST['file']);
	
	$data=array();
	foreach($_POST as $key=>$value){
	if($key=="product_category")
	$value=implode(",",$value);
    $data[$key]=$value;
	}
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	
	
	$this->db->where('id', $this->input->post('id'));
    return $this->db->update('outlets', $data);
}

public function email_exist($email){
        $query = $this->db->get_where('outlets', array('email' => $email));
        $result=$query->row_array();
		if(!empty($result))
		return true;
		return false;
}

function approve_outlet(){
$data=array('status'=>'approved');
	$this->db->where('id', $this->input->post('id'));
    return $this->db->update('outlets', $data);
}

function reject_outlet(){
$data=array('status'=>'denied');
	$this->db->where('id', $this->input->post('id'));
    return $this->db->update('outlets', $data);
}

public function delete_outlet($id)
{
	
	 $query = $this->db->get_where('outlets', array('id' => $id));
     $data = $query->row_array();
	 //@unlink("outlet_files/".$data["file"]);
	 $this->db->where('id', $id);
     return $this->db->delete('outlets');
}

}