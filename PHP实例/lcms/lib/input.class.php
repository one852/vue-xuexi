<?PHP
class input{    
    //处理POST提交
    function post($key){
        if (isset($_POST[$key])){
            $value = $_POST[$key];
        } else {
            $value = NULL;
        }
        return strip_tags($value);  //去除字符串中的HTML标签          
    }
    
    //处理GET提交
    function get($key){
        if (isset($_GET[$key])){
            $value = $_GET[$key];
        } else {
            $value = NULL;
        }
        return strip_tags($value);  //去除字符串中的HTML标签                   
    }
}