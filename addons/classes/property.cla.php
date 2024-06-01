<?php
class property{
    private $table = 'property_table';
    private $table2 = 'appointment_table';
    private $media_table = 'property_media_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    
    public $id;
    public $name;
    
    public $type;
    public $file_name;
    public $extension;
    
    private $current_admin;
    private $last_id;
    private $full_file_name;
    private $full_path;
    
    public function __construct($conn = ''){
        if(!empty($conn)){
            //CREATE CONNECTION
            require_once(file_location('inc_path','connection.inc.php'));
            $this->dbconn = dbconnect($conn,'PDO');
        }
    }
    
    public function __destruct(){
    	//CLOSES ALL CONNECTION
        if(is_resource($this->dbconn)){
            closeconnect('db', $this->dbconn);
        }
        if(is_resource($this->dbstmt)){
            closeconnect('stmt',$this->dbstmt);
        }
    }
    
    public function fix_appointment(){
        $this->dbsql = "INSERT INTO {$this->table2}(a_name,a_email,a_phnumber,a_message,a_date,a_time,p_id) VALUES(:name,:email,:phnumber,:message,:date,:time,:p_id)";
        $this->dbstmt = $this->dbconn->prepare($this->dbsql);
        $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':email',$this->email,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':phnumber',$this->phnumber,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':message',$this->message,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':date',$this->date,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':time',$this->time,PDO::PARAM_STR);
        $this->dbstmt->bindParam(':p_id',$this->p_id,PDO::PARAM_INT);
        if($this->dbstmt->execute()){return 'success';}else{return 'fail';} 
    }//end insert message
}
?>