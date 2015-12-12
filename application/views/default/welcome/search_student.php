
	<div class="cr">
		<div class="container">
			<div class="content">
				<div class="title">Поиск студентов</div>
                                <?php
                                $this->load->helper('url');
                                $show = false; 
                                switch ($this->uri->segment(3)){
                                    case "B":
                                        $show = true;
                                        break;
                                     
                                    case "M":
                                        $show = true;
                                        break;
                                    case "D":
                                        $show = true;
                                        break;
                                }
                                if($show = false ){ ?>
				<div class="search_student">
					<form action="welcome/search/1" method="post">
						<select id="selfac" class="form_f  search_prof" >
							<option>Выберите факультет</option>
							<option value="1">КСиПО</option>
                                                        <option value="3">Экономический</option>
                                                        <option value="2">Архитектурный</option>
                                                        <option value="8">Агрономический</option>
                                                        <option value="7">Энергетический</option>
                                                        <option value="4">ВиТЖ</option>
                                                        <option value="5">Землеустройства</option>
                                                        
						</select>
                                            <input type="hidden" id="fac" name= "fac_id" >
						<select id="reg" class="form_f search_prof_region  " >
							<option>Восточный Казахстан</option>
                                                        <option>Западный Казахстан</option>
                                                        <option>Северный Казахстан</option>
                                                        <option selected>Центральный Казахстан</option>
                                                        <option>Южный Казахстан</option>
						</select>
                                            <input type="hidden" id="region" name= "region" >
						<div class="search_checkbox">
							<input type="checkbox" name="opyt" >Опыт работы</div>
						<div class="search_checkbox">
							<input type="checkbox"name="dop_nav" >Дополнительные навыки</div>
						<button class="search_button">Пойск</button>
					</form>
				</div>
                                <?php } ?>
				<ul class="search_stundet_item_container">
                                    <?php  
                                     if($infa) {
                                        foreach ($infa  as $student ){
                                            ?>
                                   <li class="search_student_item">
					<div class="student_name">
						<a href="welcome/resume/<?php echo $student['id_student'] ?>">
			<?php echo $student['family']." ".$student['fathername']." ".$student['name'] ?>

						</a>
					</div>
					<div class="student_prof">
						Специальность: Вычислительная 
техника и программное 
обеспечение
					</div>
					<div class="student_city">Город: Астана</div>
				</li>
                                    <?php
                                        }
                                    } ?>
				
				</ul>
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