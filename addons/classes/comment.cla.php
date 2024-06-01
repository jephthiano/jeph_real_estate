<?php
class comment{
    private $table = 'comment_table';
    private $dbconn;
	private $dbstmt;
	private $dbsql;
    private $dbnumRow;
    private $ipaddress;
    
    public $id;
    public $name;
    public $user_comment;
    public $status;
    public $regdatetime;
    public $c_id;
    
    
    public function __construct($conn = ''){
        if(!empty($conn)){
            //CREATE CONNECTION
            require_once(file_location('inc_path','connection.inc.php'));
            $this->dbconn = dbconnect($conn,'PDO');
            
            //get ipadress
            $this->ipaddress = get_ip_address();
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
    
    
    public function insert_comment(){
        if(content_data($this->table,'c_id',$this->user_comment,'c_comment',"AND c_name = '{$this->name}' AND n_id = '{$this->n_id}'")){
            return 'exist';
        }else{
            $this->dbsql = "INSERT INTO {$this->table}(c_name,c_comment,c_ipaddress,n_id)VALUES(:name,:user_comment,:ipaddress,:id)";
            $this->dbstmt = $this->dbconn->prepare($this->dbsql);
            $this->dbstmt->bindParam(':name',$this->name,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':user_comment',$this->user_comment,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':ipaddress',$this->ipaddress,PDO::PARAM_STR);
            $this->dbstmt->bindParam(':id',$this->n_id,PDO::PARAM_INT);
            if($this->dbstmt->execute()){return true;}else{return false;}
        }
    }//end of insert comment
}
?>