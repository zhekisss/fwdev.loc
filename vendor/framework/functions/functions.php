<?php
$scripts = $this->script;
function putScripts(){
    global $scripts;
    $scripts = empty($scripts) ?: $scripts ;
    ob_start();
    if (is_array($scripts)){
        foreach($scripts as $script){
            echo $script;
        }
        return ob_get_clean();
    }
    return '';
}