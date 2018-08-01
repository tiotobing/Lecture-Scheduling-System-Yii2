<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

              <!-- ########    UNTUK   GAMBAR   ######## -->

              <?php
                  if(Yii::$app->user->identity->role === 1) {

                ?>
                    <img src="<?= $directoryAsset ?>/img/ITdel.png" class="img-circle"
                         alt="User Image"/>


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


            </div>
            <div class="pull-left info">

                <p>
                  <?php
                    echo (isset(Yii::$app->user->identity->username) ? Yii::$app->user->identity->username : 'GUEST' );
                  ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->



        <!-- Access Control ################################################ -->

        <?php
            if (Yii::$app->user->identity->role === 1 ) {
        ?>

          <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],


                  //  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],

                    ['label' => 'Jadwal', 'icon' => 'book', 'url' => ['/jadwal']],

                    ['label' => 'Create Jadwal', 'icon' => 'plus', 'url' => ['/create-jadwal']],

                    // 'visible' => Yii::$app->user->identity->username = 'baak'],
                    ['label' => 'Daftar User', 'icon' => 'group', 'url' => ['/user']],

                    // ['label' => 'Request Izin', 'icon' => 'plus-square', 'url' => ['/request/create']],

                    ['label' => 'Ubah Jadwal', 'icon' => 'gears', 'url' => ['/jadwal']],

                    ['label' => 'Ruangan', 'icon' => 'home', 'url' => ['/ruangan']],

                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],



                ],
            ]
        )

        ?>





        <?php

            }


            else if (Yii::$app->user->identity->role === 2)


            {


        ?>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

                    ['label' => 'Menu', 'options' => ['class' => 'header']],

                    ['label' => 'Jadwal', 'icon' => 'book', 'url' => ['/jadwal']],

                    ['label' => 'Request Izin', 'icon' => 'plus-square', 'url' => ['/request/create']],

                    ['label' => 'Ruangan', 'icon' => 'home', 'url' => ['/ruangan']],


                ],
            ]
        ) ?>

    <?php
        }

        else

        {

    ?>



          <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],

                    ['label' => 'Jadwal', 'icon' => 'book', 'url' => ['/jadwal']],

                    ['label' => 'Ruangan', 'icon' => 'home', 'url' => ['/ruangan']],

                ],
            ]
        )

        ?>

    <?php

        }

    ?>

    </section>

</aside>
