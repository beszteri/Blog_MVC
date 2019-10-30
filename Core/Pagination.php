<?php

class Pagination{

    function Paginate($values,$per_page, $page){
    $total_values = count($values);

/*     if(isset($_GET['page'])){
    $current_page = $_GET['page'];
    }else{
    $current_page = 1;
    } */

    $counts = ceil($total_values / $per_page);
    $param1 = ($page - 1) * $per_page;
    $this->data = array_slice($values,$param1,$per_page);

    for($x=1; $x<= $counts; $x++){
    $numbers[] = $x;
    }
    return $numbers;
    }
    function fetchResult(){
    $resultsValues = $this->data;
    return $resultsValues;
    }
}
