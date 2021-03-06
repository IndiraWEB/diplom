<div class="uk-container" style="background-color: #ffffff;margin-top: 20px;">
    <div class="uk-grid" style="height: 60px; background-color: #535C69; color: #ffffff; margin-right: -35px">
        <div class="uk-width-1-1">
            <div style="margin-top: 14px; margin-left: -15px; color: #fff">
                <a href="/admin/components/news/add_news" class="" style="color: #fff !important">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-square-o fa-stack-2x"></i>
                      <i class="fa fa-plus fa-stack-1x"></i>
                    </span>создать
                </a>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <h3>Новости</h3>
            <?php echo $this->session->flashdata('status'); ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <?php if($news): ?>
                <ul class="uk-list">
                <?php foreach($news as $image): ?>
                    <li>
                        <?php echo $image['news_name'] ?>
                        [<a href="/admin/components/news/news_edit/<?php echo $image['news_id'] ?>">редактировать</a>]
                        [<a href="#" data-uk-modal="{target:'#modal<?php echo $image['news_id'] ?>'}">удалить</a>]
                    </li>
                    <div id="modal<?php echo $image['news_id'] ?>" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <button type="button" class="uk-modal-close uk-close"></button>
                            <div class="uk-modal-header">
                                <h2>Удалить новость?</h2>
                            </div>
                            <p>Новость будет удалена</p>
                            <div class="uk-modal-footer uk-text-right">
                                <button type="button" class="uk-button uk-modal-close">Отмена</button>
                                <a class="uk-button uk-button-primary" href="/admin/components/news/news_edit/<?php echo $image['news_id'] ?>/delete">Удалить</a>
                            </div>
                        </div>
        </div>
                <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1"></div>
    </div>
</div>



