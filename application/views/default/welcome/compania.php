
	<div class="cr">
		<div class="container">
			<div class="content">
                            <div class="title">Информация о компании</div>
                           
<?php if(isset($company)){ ?>
<div class="title_min"><?php echo $company['name'] ?></div>
<div class="news_item_des"><p><?php echo $company['description'] ?></p></div>
<?php } ?>
                            <div class="rezume">
                                
                            </div>
				<div class="title">Разместить данные о компании</div>
                               <div class="compani_form">
                                   <label>Фото компании</label> 
                                    <?php
                                    if($company['image'] ){
                                        ?>
                                    <img src="<?php  echo base_url() ?>/assets/img/company/<?php echo $company['image'] ?>">
                                    <?php
                                    }?>
                                    <form method="post" action="cabinet/company_edit/<?php echo $company['id_company'] ?>/image" enctype="multipart/form-data">
                                        <input type="file" name="userfile" >
                                        <button type="submit">Сохранить</button>
                                    </form>
                                </div>
				<div class="rezume">
					<form method="post" action="cabinet/company_edit/<?php echo $company['id_company'] ?>/data">
                                            
<div class="compani_form">
<label>Название компании</label> <input type="text" class="form_f " id="manname_" name="manname_" value="<?php echo $company['name'] ?>">
</div>
                                            <div class="compani_form">
<label>Контактное лицо</label> <input type="text" class="form_f " id="manname_" name="login_" value="<?php echo $company['login'] ?>">
</div>
<div class="compani_form">
<label>E-Mail</label> <input name="email_comp" id="email_comp" maxlength="200" class="form_f " type="text" size="1" value="<?php echo $company['email'] ?>" required placeholder="E-mail организации..."/>
</div>
<div class="compani_form">
<label>Контактный телефон</label> <input name="tel_comp" id="tel_comp" maxlength="200" class="form_f " type="tel" size="1" value="<?php echo $company['phone'] ?>" required placeholder="Телефон организации..."/>
</div>
<div class="compani_form">
<label>Регион</label>
<select class="form_f " id="comp_reg" >
<option>Восточный Казахстан</option>
<option>Западный Казахстан</option>
<option>Северный Казахстан</option>
<option selected>Центральный Казахстан</option>
<option>Южный Казахстан</option>
</select>
<input type="hidden" id="comp_region" name="region_" >
</div>
<div class="compani_form">
<label>Дополнительная информация</label>
<textarea name="dop_" id="" class="form_textarea " cols="30" rows="10" required placeholder="Дополнительные текст...">
<?php echo $company['description'] ?>
</textarea>
</div>
<button class="form_button ">Отправить</button>



</form>
				</div>
			</div>
			<div class="sider_bar">
				<div class="title">Новости</div>
				<div class="news_item_side_bar">
					<div class="news_item_side_bar_img">
						<a href="">
							<img src="img/news.jpg" alt=""/>
						</a>
					</div>
					<div class="news_item title">
						<a href="">Lorem Ipsum is simply dummy text</a>
					</div>
					<div class="news_item_des">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry....
						</p>
					</div>
				</div>
				<div class="news_item_side_bar">
					<div class="news_item_side_bar_img">
						<a href="">
							<img src="img/news.jpg" alt=""/>
						</a>
					</div>
					<div class="news_item title">
						<a href="">Lorem Ipsum is simply dummy text</a>
					</div>
					<div class="news_item_des">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry....
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	