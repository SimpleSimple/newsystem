<?php
//对输入验证（对特定字符加反斜线）
function addslashes_modified($str){
    return (!get_magic_quotes_runtime()) ? addslashes($str) : $str ;
}
?>