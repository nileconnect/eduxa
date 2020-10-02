<?php
if($programStartDates){
    ?>
    <tr>
        <td><?= Yii::t('frontend','Start Date') ?></td>
        <td>
            <?php

            if($programStartDates->m_1){
                echo '<span class="text-primary"> '. (Yii::$app->language=='ar'? 'يناير':'Jan' ).'</span>,';
            }
            if($programStartDates->m_2){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'فبراير':'Feb' ).'</span>,';
            }
            if($programStartDates->m_3){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'مارس':'Mar' ).'</span>,';
            }
            if($programStartDates->m_4){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'ابريل':'Apr' ).'</span>,';
            }
            if($programStartDates->m_5){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'مايو':'May' ).'</span>,';
            }
            if($programStartDates->m_6){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'يونيه':'Jun' ).'</span>,';
            }
            if($programStartDates->m_7){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'يوليو':'Jul' ).'</span>,';
            }
            if($programStartDates->m_8){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'أعسطس':'Aug' ).'</span>,';
            }
            if($programStartDates->m_9){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'سبتمبر':'Sept' ).'</span>,';
            }
            if($programStartDates->m_10){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'اكتوبر':'Oct' ).'</span>,';
            }
            if($programStartDates->m_11){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'نوفمبر':'Nov' ).'</span>,';
            }
            if($programStartDates->m_12){
                echo '<span class="text-primary">'. (Yii::$app->language=='ar'? 'ديسمبر    ':'Dec' ).'</span>';
            }

            ?>

        </td>
    </tr>
    <?
}
?>