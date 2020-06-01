<?php
if($programStartDates){
    ?>
    <tr>
        <td><?= Yii::t('frontend','Start Dates') ?></td>
        <td>
            <?php

            if($programStartDates->m_1){
                echo '<div><span class="text-primary">Jan</span></div>';
            }
            if($programStartDates->m_2){
                echo '<div><span class="text-primary">Feb</span></div>';
            }
            if($programStartDates->m_3){
                echo '<div><span class="text-primary">Mar</span></div>';
            }
            if($programStartDates->m_4){
                echo '<div><span class="text-primary">Apr</span></div>';
            }
            if($programStartDates->m_5){
                echo '<div><span class="text-primary">May</span></div>';
            }
            if($programStartDates->m_6){
                echo '<div><span class="text-primary">Jun</span></div>';
            }
            if($programStartDates->m_7){
                echo '<div><span class="text-primary">Jul</span></div>';
            }
            if($programStartDates->m_8){
                echo '<div><span class="text-primary">Aug</span></div>';
            }
            if($programStartDates->m_9){
                echo '<div><span class="text-primary">Sept</span></div>';
            }
            if($programStartDates->m_10){
                echo '<div><span class="text-primary">Oct</span></div>';
            }
            if($programStartDates->m_11){
                echo '<div><span class="text-primary">Nov</span></div>';
            }
            if($programStartDates->m_12){
                echo '<div><span class="text-primary">Dec</span></div>';
            }

            ?>

        </td>
    </tr>
    <?
}
?>