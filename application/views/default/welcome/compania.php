
	<div class="cr">
		<div class="container">
			<div class="content">
				<div class="title">Разместить данные о компании</div>
				<div class="rezume">
					<form>
						<input  name="name1"  maxlength="200" class="form_f comp_f" type="text" size="1"  required placeholder="Название организации..."/>
						<select class="form_f  comp_f" >
							<option>Регион</option>
							<option>Астана</option>
						</select>
						<textarea name="" id="" class="form_textarea comp_f" cols="30" rows="10" required placeholder="Дополнительные текст..."></textarea>
							<button class="form_button comp_f ">Отправить</button>
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
	<footer>
		<div class="cr">
			<div class="footer">
				<div class="logo">
					<a href="">
						<img src="img/logo.png" alt=""/>
					</a>
				</div>
				<div class="footer_menu">
					<ul class="f_menu">
						<li>
							<a href="">Главная</a>
						</li>
						<li>
							<a >Выпускники</a>
							<ul class="sub_menu_footer">
								<li>
									<a href="">Бакалавр</a>
								</li>
								<li>
									<a href="">Магистр</a>
								</li>
								<li>
									<a href="">Доктор</a>
								</li>
							</ul>
						</li>
						<li>

							<a href="">Компании</a>
						</li>
						<li>
							<a href="">Контакты</a>
						</li>
					</ul>
				</div>
				<div class="footer_addres">
					<p>
						© С.Сейфуллин атындағы Қазақ агротехникалық университеті, 2015
					</p>
					<p>
						Қазақстан Республикасы, 010000, Астана қ-сы, Жеңіс даңғылы, 62
					</p>
					<p>Тел.: (8-7172) 317-547, факс: (8-7172) 316-072</p>
					<p>e-mail: agun.katu@gmail.com</p>
				</div>
			</div>
		</div>
	</footer>
	<div id="enter" class="modal_div">
		<!-- скрытый див с уникальным id = modal1 -->
		<span class="modal_close"></span>
		<span class="title_z">Войти</span>
		<form method="POST" name="form1" action="form.php" >
			<input  name="name1" id="name" maxlength="200" class="modal_f" type="text" size="1"  required placeholder="Имя..."/>
			<input   name="phone1" id="user_phone" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="Пароль..."/>
			<button type="submit" name="submit1" class="form_button" >Войти</button>
		</form>
	</div>
	<div id="overlay"></div>
	<div id="registr" class="modal_div">
		<!-- скрытый див с уникальным id = modal1 -->
		<span class="modal_close"></span>
		<span class="title_z">Регистрация</span>
		<form method="POST" name="form1" action="form.php" >
			<input  name="name1" id="name" maxlength="200" class="modal_f" type="text" size="1"  required placeholder="Логин..."/>
			<input   name="phone1" id="user_phone" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="mail..."/>
			<input  name="name1" id="name" maxlength="200" class="modal_f" type="text" size="1"  required placeholder="Пароль..."/>
			<input   name="phone1" id="user_phone" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="Пароль..."/>
			<button type="submit" name="submit1" >Обратный Звонок</button>
		</form>
	</div>
	<div id="overlay"></div>
</body>