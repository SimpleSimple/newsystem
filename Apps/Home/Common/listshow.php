<?php

/**
 *
 * @param array $news
 * @param boolean $isShort
 */
function listNews(&$news, $isShort = true){
    if (!empty($news) && is_array($news)){
        foreach ($news as $key=>$val){
            $news[$key]['dateline'] = date("Y-m-d h:i:sa", $val['dateline']);
            if(true === $isShort){
                $news[$key]['content'] = mb_substr($val['content'], 0, 20 ,"utf-8");
            }
        }
    }
}
?>