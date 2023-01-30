<?php
use App\Models\Group;
function getAllGroup(){
    $Group= new Group;
    return $Group->getGroup();
}
?>
