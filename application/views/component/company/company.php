<div class="uk-container" style="background-color: #ffffff;margin-top: 20px;">
    <div class="uk-grid" style="height: 60px; background-color: #535C69; color: #ffffff; margin-right: -35px">
        <div class="uk-width-1-1">
            <div style="margin-top: 14px; margin-left: -15px; color: #fff">
                <h3 style="color: white">Общее число компаний <?php echo count($company) ?></h3>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <h3>Все компании</h3>
            <?php echo $this->session->flashdata('status'); ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <?php if($company): ?>
                <ul class="uk-list">
                <?php foreach($company as $image): ?>
                    
                        <?php echo $image['name'] ?>
                       
                        [<a href="#" data-uk-modal="{target:'#modal<?php echo $image['id_company'] ?>'}">удалить</a>]
                    
                    <div id="modal<?php echo $image['id_company'] ?>" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <button type="button" class="uk-modal-close uk-close"></button>
                            <div class="uk-modal-header">
                                <h2>Удалить новость?</h2>
                            </div>
                            <p>Новость будет удалена</p>
                            <div class="uk-modal-footer uk-text-right">
                                <button type="button" class="uk-button uk-modal-close">Отмена</button>
                                <a class="uk-button uk-button-primary" href="/admin/components/company/company_delete/<?php echo $image['id_company'] ?>/delete">Удалить</a>
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



