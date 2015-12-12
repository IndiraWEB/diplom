<?php $this->load->helper('form'); ?>
<div class="uk-container" style="background-color: #ffffff; margin-top: 20px;">
    <div class="uk-grid" style="height: 60px; background-color: #535C69; color: #ffffff; margin-right: -35px">
        <div class="uk-width-1-1">
            <div style="margin-top: 14px; margin-left: -15px; color: #fff">

            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
            <h3><?php echo $news_name['news_name'] ?> :: редактирование</h3>
            <?php echo $this->session->flashdata('status'); ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">            
            <?php if($this->config->item('multi_language_enable') === true AND count($this->config->item('multi_language')) > 0): ?>
            <p>
                Необходимо выбрать язык для редактирования
            </p>
            <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#my-id', animation: 'fade'}">
      <?php $languages = $this->config->item('multi_language'); ?>
      <?php foreach ($languages as $key => $value): ?>
      <li <?php echo ($key == lang_id()) ? 'class="uk-active"' : ''; ?>><a href=""><?php echo $key ?></a></li>
      <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <!-- This is the container of the content items -->
            <ul id="my-id" class="uk-switcher">
        <?php if($this->config->item('multi_language_enable') === true AND count($this->config->item('multi_language')) > 0): ?>
        <?php $languages = $this->config->item('multi_language'); ?>
        <?php foreach ($languages as $key => $value): ?>
        <li <?php echo ($key == lang_id()) ? 'class="uk-active"' : ''; ?>>
                    <form class="uk-form" action="/admin/components/news/<?php echo $img_id ?>/save" method="post">
                        <div class="uk-form-row">
                            <input type="text" class="uk-width-1-2" name="img_mark_<?php echo $key ?>" value="<?php echo $img_content[$key]['img_mark'] ?>" placeholder="Введите заголовок страницы">
                        </div>
                        <div class="uk-form-row">
                            
                            <input type="text" class="uk-width-1-2" name="img_model_<?php echo $key ?>" value="<?php echo $img_content[$key]['img_model'] ?>" placeholder="Введите заголовок страницы">
                        </div>
                       
                     
                             
                   
                        <div class="uk-form-row">
                               <input type="text" class="uk-width-1-2" name="img_color_<?php echo $key ?>" value="<?php echo $img_content[$key]['img_color'] ?>" placeholder="Введите заголовок страницы">
                        </div>
                        <div class="uk-form-row">
                            <input type="hidden" class="uk-width-1-2" name="img_content_id" value="<?php echo $img_content[$key]['img_content_id'] ?>">
                            <input type="hidden" class="uk-width-1-2" name="img_lang" value="<?php echo $key ?>">
                            <input type="hidden" class="uk-width-1-2" name="img_id" value="<?php echo $img_id ?>">
                        </div>
                        <div class="uk-form-row">
                            <input type="submit" class="uk-button" value="сохранить">
                        </div>
                    </form>
                </li>
                <?php endforeach; ?>
                <?php else: ?>
                
                <li class="uk-active">
                    <h3>Картинка для новости</h3>
                    <form class="us-form" action="/admin/components/news/news_edit/<?php echo $news_id ?>/saveimg" method="post" enctype="multipart/form-data">
                       <div class="uk-form-row">
                            <div style='background-color: #ffaeae ' > <p>Если вы не выберите картинку и сохраните изменения то в базу попадет пустое значение и возникнет ошибка<br/>
                                Желательно вставлять примерно одинаковые по размеру картинки</p></div>
                            <?php  
                           echo form_upload(array( 'name'=>'img_full_path_'));?>
                            <img src="<?php echo $news_content[lang_id()]['img_full_path'] ;?>" >
                            <div class="uk-form-row">
                            <input type="hidden" class="uk-width-1-2" name="news_content_id" value="<?php echo $news_content[lang_id()]['news_content_id'] ?>">
                            <input type="hidden" class="uk-width-1-2" name="img_lang" value="<?php echo lang_id() ?>">
                            <input type="hidden" class="uk-width-1-2" name="news_id" value="<?php echo $news_id ?>">
                        </div>
                           <input type="submit" value="сохранить изображение">
                        </div> 
                    </form>
                    <form class="uk-form" action="/admin/components/news/news_edit/<?php echo $news_id ?>/save" method="post" enctype="multipart/form-data">
                       
                        
                        <br/>
                        <label>Заголовок для новости</label>
                        <div class="uk-form-row">
                            <input type="text" class="uk-width-1-2" name="news_title_<?php echo lang_id() ?>" value="<?php echo $news_content[lang_id()]['news_title'] ?>" placeholder="Введите заголовок нововсти ">
                        </div>
                       <br/>
                        <label>Краткий текст или предзаголовок</label>
                        <div class="uk-form-row">
                            
                            <textarea name="news_preloader_<?php echo lang_id() ?>"  placeholder="краткрий текст из новости">
                           <?php echo $news_content[lang_id()]['news_preloader'] ?>
                            </textarea>
                        </div> 
                       <br/>
                        <label>Текст</label>
                         <script src="<?php echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>
                        <div class="uk-form-row">
                            
                            <textarea name="news_text_<?php echo lang_id() ?>" ><?php echo $news_content[lang_id()]['news_text'] ?></textarea>
                        </div> 
                        
                        <div class="uk-form-row">
                            <input type="hidden" class="uk-width-1-2" name="news_content_id" value="<?php echo $news_content[lang_id()]['news_content_id'] ?>">
                            <input type="hidden" class="uk-width-1-2" name="img_lang" value="<?php echo lang_id() ?>">
                            <input type="hidden" class="uk-width-1-2" name="news_id" value="<?php echo $news_id ?>">
                        </div>
                        <div class="uk-form-row">
                            <input type="submit" class="uk-button" value="сохранить">
                        </div>
                    </form>
                </li>
                <?php endif; ?>
            </ul>
            
        </div>
    </div>

    <div class="uk-grid">
        <div class="uk-width-1-1"></div>
    </div>
</div>
<script>
    <?php if($this->config->item('multi_language_enable') === true AND count($this->config->item('multi_language')) > 0): ?>
        <?php $languages = $this->config->item('multi_language'); ?>
        <?php foreach ($languages as $key => $value): ?>
            CKEDITOR.replace( 'news_text_<?php echo $key; ?>' );
        <?php endforeach; ?>
    <?php else: ?>
        CKEDITOR.replace( 'news_text_<?php echo lang_id(); ?>' );
    <?php endif; ?>

</script>