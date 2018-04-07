<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\widgets\Nav;

echo Nav::widget([
    'items' => [
        '<li class="header">MENU</li>',

        // ======= ADMINISTRATOR =======

        [
            'label' => ficon('lock', '<span>Administração</span>'),
            'url' => ['/user/admin'],
            'visible' => Yii::$app->user->can("admin")
        ],

        // ======= SUPERVISOR =======
        
        [
            'label' => ficon('signal', '<span>Painel</span>'),
            'url' => ['/site/index'],
            'visible' => Yii::$app->user->identity->role_id == 2,
        ],
        [
            'label' => ficon('home', '<span>Organizações</span>'),
            'url' => ['/organization/index'],
            'visible' => Yii::$app->user->identity->role_id == 2,
        ],
        [
            'label' => ficon('users', '<span>Equipe</span>'),
            'url' => ['/user/index'],
            'visible' => Yii::$app->user->identity->role_id == 2,
        ],
        [
            'label' => ficon('list', '<span>Ações</span>'),
            'url' => ['/action/index'],
            'visible' => Yii::$app->user->identity->role_id == 2,
        ],
        
        // ======= BASIC =======

        [
            'label' => ficon('signal', '<span>Meu Painel</span>'),
            'url' => ['/action/index'],
            'visible' => Yii::$app->user->identity->role_id == 3,
        ],
        [
            'label' => ficon('list', '<span>Minhas Ações</span>'),
            'url' => ['/action/index'],
            'visible' => Yii::$app->user->identity->role_id == 3,
        ],
        

        '<li class="header">SISTEMA</li>',
        [
            'label' => ficon('star', '<span>Sobre</span>'),
            'url' => ['/site/about']
        ],
        [
            'label' => ficon('star', '<span>Ajuda</span>'),
            'url' => ['/site/about']
        ],

        Yii::$app->user->isGuest ? (
            [
                'label' => ficon('sign-in', '<span>Login</span>'),
                'url' => ['/site/login']
            ]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
            . Html::submitButton(
                ficon('sign-out', '<span>Logout (' . Yii::$app->user->identity->username . ')</span>'),
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
