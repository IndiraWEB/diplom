<?php

?>
<div class="uk-container" style="background-color: #ffffff;margin-top: 20px;">

<div class="uk-grid" style="height: 60px; background-color: #535C69; color: #ffffff; margin-right: -35px">
        <div class="uk-width-1-1">
            <div style="margin-top: 14px; margin-left: -15px; color: #fff">

            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <h3>Создать новость</h3>
            <?php echo $this->session->flashdata('status'); ?>
        </div>
    </div>
   <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <form class="uk-form" action="/admin/components/news/add_news/create" method="post" enctype="multipart/form-data">
                <div class="uk-form-row">
                      <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                
                </div>
                <div class="uk-form-row">
                    <input type="text" name="news_name" class="form-control" >
                  
                </div>
                
                <div class="uk-form-row">
                    <input type="submit" class="uk-button" name="download" value="создать">
                </div>
            </form>
        </div>
    </div>

    <div class="uk-grid">
        <div class="uk-width-1-1"></div>
    </div>


</div>