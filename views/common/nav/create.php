<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var yii\web\View $this
 * @var yii\web\Controller $context
 */
use yii\helpers\Html;

$context = $this->context;
?>
<div class="text-center">
    <?= $this->render('/common/nav/base') ?>
    <span class="dropdown">
        <?= Html::a(ucfirst($context->action->id), '#', [
            'id' => 'menu-action',
            'class' => 'dropdown-toggle dropdown-hover label label-default',
            'data-toggle' => 'dropdown',
        ]) ?>
        <ul class="dropdown-menu">
            <li><a href="<?= url(['admin']) ?>">Admin</a></li>
        </ul>
    </span><!-- /.dropdown -->
</div>
<p class="clearfix"></p>
