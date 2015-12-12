
	<div class="cr">
		<div class="container">
			<div class="content">
                            <div class="title">Информация о компании</div>
                            <?php if(isset($company)){ ?>
                            <table>
                                <tr><td colspan="2" align="center"><?php echo $company['name'] ?></td></tr>
                                <tr> <td></td><td ><?php echo $company['description'] ?></td></tr>
                            </table>
                            <?php } ?>
                            <div class="rezume">
                                
                            </div>
				<div class="title">Разместить данные о компании</div>
				<div class="rezume">
					<form>
                                            <table><tr><td colspan="2" align="center">
                                            <div class=""><label>Данные контактного лица</label></div>
                                                    </td>
                                            </tr>
                                            <tr><td>Фамилия</td> <td><input type="text" class="form_f comp_f" id="fam" name="fam_"></td>
                                            
                                            </tr>
                                            <tr><td><label>Имя</label></td><td> <input type="text" class="form_f comp_f" id="manname_" name="manname_"></td></tr>
                                           
                                             <tr><td>Отчество</td><td><input type="text" class="form_f comp_f" id="fath" name="fath_"></td></tr>
                                            
                                            
                                             <tr><td>E-Mail</td><td><input  name="email_comp" id="email_comp" maxlength="200" class="form_f comp_f" type="text" size="1" value="<?php echo $company['email'] ?>"  required placeholder="E-mail организации..."/></td></tr>
                                             <tr><td>Контактный телефон</td><td><input  name="tel_comp"  id="tel_comp" maxlength="200" class="form_f comp_f" type="text" size="1" value="<?php echo $company['phone'] ?>" required placeholder="Телефон организации..."/></td></tr>

                                            <tr><td>Регион</td><td><select class="form_f  comp_f" id="comp_reg" >
							<option>Восточный Казахстан</option>
                                                        <option>Западный Казахстан</option>
                                                        <option>Северный Казахстан</option>
                                                        <option selected>Центральный Казахстан</option>
                                                        <option>Южный Казахстан</option>
						</select>
                                                    </td>
                                                </tr>
                                                <input type="hidden" id="comp_region">
                                                <tr><td>Дополнительная информация</td>
                                                    <td>
                                                <textarea name="" id="" class="form_textarea comp_f" cols="30" rows="10" required placeholder="Дополнительные текст...">
                                                    <?php  echo $company['description'] ?>
                                                </textarea>
                                                        </td>
                                                </tr>
                                                <tr><td colspan="2">
						<button class="form_button comp_f ">Отправить</button>
                                                    </td>
                                                </tr>
                                            </table>
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
	