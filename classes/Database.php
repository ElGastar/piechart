<?PHP
class Database {
 
    const DATABASE = 'databasename';
    const HOST = 'localhost';
    const DATABASE_USER = 'root';
    const DATABASE_PASSWORD = '';
    private  $sql;
    private $_mysqli;
    public  $result; 

    public function __construct()
    {
        $this->_mysqli = new mysqli(self::HOST, self::DATABASE_USER, self::DATABASE_PASSWORD, self::DATABASE);
        if ($this->_mysqli->connect_errno) {
            echo "Ошибка соедение к базе данных: (" . $this->_mysqli->connect_errno . ") " . $this->_mysqli->connect_error;
        }
        
    }

    public static function init()
    {
        static $instance = false;
        if( ! $instance ) {
            $instance = new self();
        }
        return $instance;
    }
    public function query($sql)
    {
		$this->result= $this->_mysqli->query($sql);
        return $this->result->fetch_array(MYSQLI_ASSOC);
    }
    public function getStudent($name, $sname){
       $sql="SELECT * FROM db_results WHERE child_name = '".$name."' AND child_surname ='".$sname."'" ;
       if($this->query($sql)){
           return  $this->query($sql);
       } else return false ;
    }

    public function setTable($sql){
        $result=$this->_mysqli->query($sql);
        if($result)
        return  $this->_mysqli->query($sql);
        else{echo ($this->_mysqli->error);}
        
    }

}
?>