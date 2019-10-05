University Manager
<br/>
<?php

if($University){
        echo "<a href='/university/manager-view'>".$University->title ."</a>";
}else{

    echo "<h2>No Universities Assigned Yet</h2>";
}
?>