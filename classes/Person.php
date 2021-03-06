<?PHP

class Person{
    public $gid;
    public $child_name;
    public $child_surname;
    public $scool_id;
    public $classnum;
    public $data;
    public $array =[];


    public function __construct($result){
        if(!$result){
            $this->child_name = 'Не существующий ' ;
        $this->child_surname = 'пользователь';
        }else{ $this->int1 =$result;
            $this->gid = $result['gid'] ;
            $this->child_name = $result['child_name'] ;
            $this->child_surname = $result['child_surname'] ;
            $this->scool_id = $result['scool_id'] ;
            $this->classnum = $result['classnum'] ;}
       
       
       
       
    }

    public function arr()
    {
        $arrray=[];
            for($i=1; $i<6;$i++)
            {
                    $array[] = 
                    [ 
                        "label" =>"Урповень $i",
                        "y" => $this->int1[$i]
                    ];

            }
            return $array;
        
    }
public function __toString(){
    return $this->child_name ." ".$this->child_surname;
}
}

?>