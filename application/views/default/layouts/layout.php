<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<base href="<?php echo base_url()?>" >
<title>Трудоустройств выпускников</title>
<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="assets/js/app.js" type="text/javascript"></script>
 <script src="assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
 <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/mail_validation.js" type="text/javascript"></script>
<?php echo (isset($js)? $js : "") ?>

<script type="text/javascript" src="assets/js/jquery.fancybox.pack.js?v=2.1.5"></script>





</head>
<body>
    <header>
		<div class="top_line">
			<div class="cr">

				<div class="enter_registr">
                                    <?php
                                    $this->load->library("session");
                                    
                                    if(!$this->session->userdata("login")) { ?>
					<a href="#enter" id="ex_in" class="open_modal">Войти</a>
                                    <?php }
                                    else {
                                        echo '<a href="'.base_url().'welcome/logout/'.$this->session->userdata("status").'" id="ex_in" class=" ">Выйти</a>';
                                    }?>
					<span>|</span>
                                        <?php if($this->session->userdata('id_company')) {
                                            echo "<a href='welcome/company/".$this->session->userdata('id_company')."'>Личный кабинет</a>";
                                        }elseif($this->session->userdata('id_student')){
                                              echo "<a href='welcome/resume/".$this->session->userdata('id_student')."'>Личный кабинет</a>";
                                        }else{?>
					<a href="#registr" class="open_modal">Регистрация</a>
                                        <?php } ?> 
				</div>
			</div>
		</div>
		<div class="head">
			<div class="cr">
				<div class="logo">
					<a href="">
						<img src="assets/img/logo.png" alt=""/>
					</a>
				</div>
				<div class="head_right">
					<div class="slogan">
						С.Сейфуллин атындағы
						<br>Қазақ агротехникалық университеті</div>
					<div class="head_slog">Трудоустроиства студентов КазАТУ</div>
					<div class="nav">
						<div class="menu">
							<ul class="nav_menu">
								<li>
									<a href="<?php echo base_url() ?>">Главная</a>
								</li>
								<li>
									<a href="">О проекте</a>
								</li>
								<li>
									<a >Выпускники</a>
									<ul class="sub_menu">
										<li>
											<a href="welcome/search/B/1">Бакалавр</a>
										</li>
										<li>
											<a href="welcome/search/M/1">Магистр</a>
										</li>
										<li>
											<a href="welcome/search/D/1">Доктор</a>
										</li>
									</ul>
								</li>
								<li>

									<a href="welcome/search_company/1">Компании</a>
								</li>
								<li>
									<a href="welcome/contacts">Контакты</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="big_photo">
					<div class="add_bg">
<!--                                            class="add summary"-->
						<a
                                                    <?php if($this->session->userdata("id_student")) { echo 'href="welcome/resume/'.$this->session->userdata("id_student").'" class=" add summary"'; }else { echo "href='#enter' class='open_modal add summary'";} ?> >Разместить резюме</a>
						<a <?php if($this->session->userdata("id_company")) { echo 'href="welcome/company/'.$this->session->userdata("id_company").'" class=" add summary"'; }else { echo "href='#enter' class='open_modal add summary'";} ?>>Добавить компанию</a>
					</div>
				</div>
			</div>
		</div>
	</header>
<?php if(isset($content)){ echo $content; } ?>
<footer>
        <div class="cr">
                <div class="footer">
                        <div class="logo">
                                <a href="">
                                        <img src="assets/img/logo.png" alt=""/>
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
                                <p>© С.Сейфуллин атындағы Қазақ агротехникалық университеті, 2015</p>
                                <p>Қазақстан Республикасы, 010000, Астана қ-сы, Жеңіс даңғылы, 62</p>
                                <p>Тел.: (8-7172) 317-547, факс: (8-7172) 316-072</p>
                                <p>e-mail: agun.katu@gmail.com </p>
                        </div>
                </div>
        </div>
</footer>
<div id="enter" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
<span class="modal_close"></span>
<span class="title_z">Войти</span>
<form method="POST" name="form1"  id="formLog" >
                <input  name="name_" id="username" maxlength="200" class="modal_f" type="text" size="1"  required placeholder="Логин..."/>
                <input   name="pass_" id="user_phone" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="Пароль..."/>
                <select id="logwho" class="modal_f" placeholder="Кто вы?" >
                    <option selected >Студент</option>
                    <option>Работодатель</option>
                </select>
                 <input type="hidden" name="log_status_" id="log_status">
                <button type="submit" name="submit1" class="form_button" >Войти</button>
        </form>
<div id="res" >

</div>
</div>
<div id="overlay"></div>
<div id="registr" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
<span class="modal_close"></span>
<span class="title_z">Регистрация</span>
<form method="POST" id="validForm" action="" name="form1" >
                <input  name="username_" id="name" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="Логин..."/>
                <input   name="email_" id="email" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="mail..."/>
                <input  name="pass1" id="pass1" maxlength="200" class="modal_f" type="text" size="1"  required placeholder="Пароль..."/>
                <input   name="pass2" id="pass2" maxlength="200" class="modal_f " type="text" size="1"  required placeholder="повторите пароль..."/>
                <select id="selwho" class="modal_f" placeholder="Кто вы?" >

                    <option selected >Студент</option>
                    <option>Работодатель</option>
                </select>
                <input type="hidden" name="status_" id="status">
                <button type="submit" name="submit1" class="form_button" >Отправить</button>
        </form>
<div id="result" >

</div>
</div>
<div id="overlay"></div>
</body>
</html>