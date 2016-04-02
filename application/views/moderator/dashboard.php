<div class="uk-grid uk-grid-collapse top-navigation">
    <div class="uk-width-2-10 top-navigation-brand">
      <?php if($this->load->library("session")){ echo $this->session->userdata('modername'); }else {?> 
      Панель управления <?php } ?>
    </div>
    <div class="uk-width-5-10 top-navigation-right">
    </div>
    <div class="uk-width-2-10 top-navigation-right">
        <div id="digital_watch" style="font-size: 42px; margin-top: -8px"></div>
        <div id="date_time" style="font-size: 12px; margin-top: -35px"></div>
    </div>
    <div class="uk-width-1-10 top-navigation-right">
        <a href="/moderator/authmod/logout" title="<?php echo $this->lang->line('logout_title') ?>">
            <?php echo $this->lang->line('logout_button') ?>
        </a>
    </div>
</div>

<div class="uk-grid uk-grid-collapse">
    <div class="uk-width-2-10">
        <div class="uk-panel uk-panel-box side-navigation">

            <h3 class="uk-panel-title">Навигация</h3>

            <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                <li class="uk-active"><a href="/moderator">Главная страница</a></li>

                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-navicon"></i> Управление сайтом</a>
                    <ul class="uk-nav-sub">
                        <li><a href="/moderator/moderboard/setting"><i class="uk-icon-cog"></i> Общие настройки</a></li>
<!--                        <li><a href="#"><i class="uk-icon-skyatlas"></i> Резервное копирование</a></li>-->
                    </ul>
                </li>

<!--                <li><a href="#"><i class="uk-icon-bar-chart"></i> Статистика</a></li>-->

                <li class="uk-nav-header">Студенты</li>
               
                <li class="uk-nav-divider"></li>
                 <li><a href="/moderator/components/student">Все</a></li>
                <li><a href="#">Трудоустроены</a></li>
                <li><a href="#">Нетрудоустроены</a></li>
            </ul>

        </div>
    </div>
    
    <div class="uk-width-7-10">
        <?php echo  (isset($component)) ? $component: "" ; ?>
    </div>
    <div class="uk-width-1-10"></div>
</div>
