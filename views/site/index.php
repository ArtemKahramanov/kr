<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
//echo '<pre>';
//var_dump($rows);die;
?>


<div class="site-index">

    <div class="jumbotron">
        <h1>Учет электрических приборов и  оборудования для организации компьютерных сетей</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Оборудование в наличии</h2>

                <p>На странице представленна талица содержащая перечень оборудования, которое имеется в наличии.</p>

                <p><a class="btn btn-default" href="/site/oborydovanie">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Списанное оборудование</h2>

                <p>На странице представленна талица содержащая перечень оборудования, которое является списанным, а так же номер организатора.</p>

                <p><a class="btn btn-default" href="/site/retired">Перейти</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Заказы<br> оборудования</h2>

                <p>На странице представленна талица содержащая перечень оборудования, которое необходимо заказать, а так же номер организатора.</p>

                <p><a class="btn btn-default" href="/site/orders">Перейти</a></p>
            </div>
        </div>

    </div>
</div>
