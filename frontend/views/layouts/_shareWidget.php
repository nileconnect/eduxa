<ul class="flaoted-socials">
<!--    <li><a href="#"><i class="fas fa-phone"></i></a></li>-->
<!--    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>-->
<!--    <li><a href="#"><i class="fab fa-twitter"></i></a></li>-->
<!--    <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
<!--    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>-->
    <?php
    if(  Yii::$app->keyStorage->get('phone') ) echo '<li><a href="tel:'.Yii::$app->keyStorage->get('phone').'"><i class="fas fa-phone"></i></a></li>';

    if(  Yii::$app->keyStorage->get('facebook') ) echo '<li><a  target="_blank"  href="'.Yii::$app->keyStorage->get('facebook').'"><i class="fab fa-facebook-f"></i></a></li>';
    if(  Yii::$app->keyStorage->get('twitter') ) echo '<li><a target="_blank"  href="'.Yii::$app->keyStorage->get('twitter').'"> <i class="fab fa-twitter"></a></i> </li></li>';
    if(  Yii::$app->keyStorage->get('instagram') ) echo '<li><a target="_blank"  href="'.Yii::$app->keyStorage->get('instagram').'"><i class="fab fa-instagram"></i></a></li>';
    if(  Yii::$app->keyStorage->get('linkedin') ) echo '<li><a target="_blank"  href="'.Yii::$app->keyStorage->get('linkedin').'"><i class="fab fa-linkedin-in"></i></a></li>';

    ?>



<!--    <li><a href=""><i class="fas fa-share-alt"></i></a></li>-->
</ul>