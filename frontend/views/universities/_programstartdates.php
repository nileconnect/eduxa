<?php
if($programStartDates){
    ?>
    <tr>
        <td><?= Yii::t('frontend','Start Date') ?></td>
        <td>
            <?php

            if($programStartDates->m_1){
                echo '<div><span class="text-primary"> '. (Yii::$app->language=='ar'? 'يناير':'Jan' ).'</span></div>';
            }
            if($programStartDates->m_2){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'فبراير':'Feb' ).'</span></div>';
            }
            if($programStartDates->m_3){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'مارس':'Mar' ).'</span></div>';
            }
            if($programStartDates->m_4){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'ابريل':'Apr' ).'</span></div>';
            }
            if($programStartDates->m_5){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'مايو':'May' ).'</span></div>';
            }
            if($programStartDates->m_6){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'يونيه':'Jun' ).'</span></div>';
            }
            if($programStartDates->m_7){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'يوليو':'Jul' ).'</span></div>';
            }
            if($programStartDates->m_8){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'أعسطس':'Aug' ).'</span></div>';
            }
            if($programStartDates->m_9){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'سبتمبر':'Sept' ).'</span></div>';
            }
            if($programStartDates->m_10){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'اكتوبر':'Oct' ).'</span></div>';
            }
            if($programStartDates->m_11){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'نوفمبر':'Nov' ).'</span></div>';
            }
            if($programStartDates->m_12){
                echo '<div><span class="text-primary">'. (Yii::$app->language=='ar'? 'ديسمبر    ':'Dec' ).'</span></div>';
            }

            ?>

        </td>
    </tr>
    <?
}
?>