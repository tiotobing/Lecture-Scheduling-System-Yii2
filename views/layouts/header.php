<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('  <span class="logo-mini">' . 'SJK' .'</span>' . '
                  <span class="logo-lg">' .'SIJAKUN' .'</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <!-- ########################   Untuk Notifikasi  #################### -->


                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-danger">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have Request</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">



                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/avatar04.png" class="img-circle"
                                                 alt="user image"/>
                                        </div>
                                        <h4>
                                            Kisno Shinoda
                                            <small><i class="fa fa-clock-o"></i>
                                              1 days</small>
                                        </h4>
                                        <p>Saya Izin Keluar Kampus</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="http://localhost/pabi/project_pabi/basic/web/index.php?r=request">See All</a></li>
                    </ul>
                </li>


                <!-- ########################   Untuk Notifikasi  #################### -->


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!--  <img src="<?= $directoryAsset ?>/img/ITdel.png" class="user-image" alt="User Image"/> -->
                        <span class="hidden-xs"> <?php echo (isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : 'GUEST' );?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                          <?php
                              if (Yii::$app->user->identity->id_role === 1 ) {
                          ?>

                            <img src="<?= $directoryAsset ?>/img/ITDel.png" class="img-circle"
                                 alt="User Image"/>

                            <p>
                        <?php
                        }
                        else
                        {
                        ?>
                        <img src="<?= $directoryAsset ?>/img/avatar04.png" class="img-circle"
                             alt="User Image"/>

                        <?php
                        }
                        ?>
                                <?php
                                  echo (isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : 'GUEST' );
                                ?>


                            </p>
                        </li>


                        <!-- Menu Body
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Keluar',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
