<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <figure><img src="<?= $countryObj->flag ?>" width="350px" height="276px" alt="" class="img-responsive"></figure>
            </div>
            <div class="col-sm-8">
                <h2 class="text-primary"><?= $countryObj->title ?></h2>
                <div class="mtlg text-large">
                    <?= $countryObj->intro ?>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="section">
    <div class="container">
        <h2 class="title title-black title-sm"><?= Yii::t('frontend' , 'Why study in')?> <?= $countryObj->title ?>
        <?php if(isset($_SESSION['_language']) and $_SESSION['_language'] == 'ar'):?>
            ؟
        <?php else:?>
            ?
        <?php endif;?>
        
        </h2>

        <div class="ptlg pblg prlg pllg bg-white b-all text-large">
            <?= $countryObj->details ?>
        </div>
    </div>
</section>

<?php if($faqs){?>
<section class="section">
    <div class="container">

        <h2 class="title title-sm title-black"><?= Yii::t('frontend' , 'Frequently asked questions')?></h2>

        <div class="accordion" id="accordionExample">
        <?php
        $i=1;
        foreach ($faqs as $faq) {
            ?>
            <div class="card">
                <div class="card-header" id="heading<?=$i?>">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
                           <?= $faq->question?>?
                        </button>
                    </h2>
                </div>

                <div id="collapse<?=$i?>" class="collapse" aria-labelledby="heading<?=$i?>" data-parent="#accordionExample">
                    <div class="card-body text-large">
                        <?= $faq->answer?>
                    </div>
                </div>
            </div>
            <?
            $i++;
        }
        ?>

        </div>

    </div>
</section>
<?php } ?>