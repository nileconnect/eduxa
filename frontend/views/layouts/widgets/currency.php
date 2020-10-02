<?php
$currencies= \backend\models\ Currency::findAll(['status'=>1]);

$currencies = ['DZD','BHD','EGP','EUR','IQD','JOD','KWD','LYD','MAD','OMR','QAR','SAR','SDG','SYP','TND','AED','GBP','USD','YER'];

use common\helpers\MyCurrencySwitcher;
?>

<li class="head-currency-item dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= Yii::$app->session->get('_currency')?></a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <?php
        foreach ($currencies as $currency) {
            //echo '<a class="dropdown-item" href="'.MyCurrencySwitcher::createMulticurrencyReturnUrl($currency->currency_code).'">'.$currency->currency_code.'</a>';
            echo '<a class="dropdown-item" href="'.MyCurrencySwitcher::createMulticurrencyReturnUrl($currency).'">'.$currency.'</a>';
        }
        ?>
    </div>
</li>