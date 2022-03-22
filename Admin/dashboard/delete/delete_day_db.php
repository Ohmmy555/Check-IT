<?php 

function Calday($deleteday){
        $now = strtotime("now");
        $delete = strtotime($deleteday);
        $diff = $now-$delete;
        $secs_in_day = 60*60*24;
        $totalday = floor($diff/$secs_in_day);
        return $totalday;
    }?>