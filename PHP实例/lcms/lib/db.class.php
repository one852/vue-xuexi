<?PHP
class db{
    public $dbhost;
    public $dbuser;
    public $passwd;
    public $dbname;
    public $dblink;
    
    function __construct($dbhost,$dbuser,$passwd,$dbname) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->passwd = $passwd;
        $this->dbname = $dbname;
        $this->conn();
        $this->query('set names utf8');
    }
    
    //链接数据库
    function conn(){
        $mysqli = new mysqli($this->dbhost,$this->dbuser,$this->passwd,$this->dbname);
        if ($mysqli->connect_errno <> 0){
            echo '数据库连接错误!';
            exit;
        }
        $this->dblink = $mysqli;
    }
    
    //执行一次查询;
    function query($sql){
        $row = $this->dblink->query($sql);
        return $row;
    }
    
    //获取一条数据;
    function get($sql){
        $row = $this->query($sql)->fetch_array();
        return $row;
    }
    
    //获取多条数据;
    function gets($sql){
        $row = $this->query($sql);
        $rows = array();
        while ($res = $row->fetch_array()) {
            $rows[] = $res;
        }
        return $rows;
    }
        
}
