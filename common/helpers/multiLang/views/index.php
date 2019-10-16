<?php
/**
 * @var View $this
 */
use yii\helpers\Html;
use yii\web\View;

?>
<?php $sid = uniqid() ?>



<ul class="nav nav-tabs translateTabs" role="tablist">
	<?php foreach (Yii::$app->params['mlConfig']['languages'] as $languageCode => $languageName): ?>

		<li class="<?= (Yii::$app->language == $languageCode) ? 'active' : '' ?>">
			<a href="#<?= $sid . $languageCode ?>" role="tab" data-toggle="tab">
				<?= $languageName ?>
			</a>
		</li>
	<?php endforeach ?>

</ul>

<div class="tab-content">

	<?php foreach (Yii::$app->params['mlConfig']['languages'] as $languageCode => $languageName): ?>

		<?php
		$attribute = $this->context->attribute;

		if ( $languageCode != Yii::$app->params['mlConfig']['default_language'] )
		{
			$attribute .= '_' . $languageCode;
		}

		$activeClass = (Yii::$app->language == $languageCode) ? 'active' : '';
		?>


		<div class="tab-pane <?= $activeClass ?>" id="<?= $sid . $languageCode ?>">

			<?= $this->context->getInputField($attribute) ?>
		</div>


	<?php endforeach ?>
</div>
