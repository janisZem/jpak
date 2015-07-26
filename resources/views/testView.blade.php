<?php
//print_r($users);

foreach ($users as $user) {
    echo $user->name . ' ';
    ?> 
    <?php echo $user->surnmae . ' ';
    ?>   
    <a href="{{URL::to("delete/$user->id")}}">Delete</a> <br><?php
}