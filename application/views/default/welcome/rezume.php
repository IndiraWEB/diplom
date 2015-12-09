<?php $this->load->helper('form');

?>
	<div class="cr">
		<div class="container">
                    <div class="content">
				<div class="title">Личные данные</div>
				<div class="rezume">
					<?php
                                        if($student){
                                            echo"<table class='form_f'>";
                                            echo"<tbody>";
                                            echo "<tr><td>Имя </td><td>".$student['name']."</td><td>Фамилия </td><td>".$student['family']."</td><td>Отчество</td><td>".$student['fathername']."</td></tr>";
                                            echo "<tr><td>E-mail </td><td> <a href='mailto:".$student['email']."'>".$student['email']."</a></td><td>Дата рождения</td><td>".$student['burn']."</td><td></td><td></td></tr>";
                                            echo "<tr></tr>";
                                            echo "<tr></tr>";
                                            echo"</tbody>";
                                            echo"</table>";
                                        }
                                        ?>
				</div>
			</div>
                    
                    <?php 
                    if($this->session->userdata("id_student")){
                    if($student['id_student']===$this->session->userdata("id_student") ){ ?>
			<div class="content">
				<div class="title">Разместить резюме</div>
				<div class="rezume">
<!--                                    action="welcome/change/student"-->
					<form id="formResume" method="post" >
						<input  name="fam_" id="FrFam" maxlength="200" class="form_f" type="text" size="1" value="<?php echo $student['family'] ?>"  placeholder="Фамилия..."/>
						<input  name="name_"  id="FrName" maxlength="200" class="form_f" type="text" size="1"  value="<?php echo $student['name'] ?>"  placeholder="Имя..."/>
						<input  name="fathname_"  id="FmFathname" maxlength="200" class="form_f" type="text" size="1"  value="<?php echo $student['fathername'] ?>"  placeholder="Отчество..."/>
                                                <input type="date" id="FrDate" placeholder="мм/дд/гггг" value="<?php echo $student['burn'] ?>" class="form_f ">
						<select class="form_f" id="FrRegion" >
							
							<option>Восточный Казахстан</option>
                                                        <option>Западный Казахстан</option>
                                                        <option>Северный Казахстан</option>
                                                        <option selected>Центральный Казахстан</option>
                                                        <option>Южный Казахстан</option>
						</select>
                                                <input type="hidden" id="Region" name="region" >
						<select class="form_f" id="FmProf" >
							<option>Профессия</option>
							<option>КСиПО</option>
						</select>
                                                <input type="hidden" id="Prof" name="prof" >
                                                <select class="form_f" id="lvl">
                                                    <option value="M">Магистр</option>
                                                    <option value="B">Студент</option>
                                                    <option value="D">Доктор</option>
                                                </select>
                                                <input type="hidden" id="level" name="lvl">
						<textarea name="" id="FrOpyt" class="form_textarea" cols="30" rows="10"  placeholder="Опыт работы..."></textarea>
						<textarea name="" id="FrNav" class="form_textarea" cols="30" rows="10"  placeholder="Дополнительные навыки..."></textarea>
                                                
                                                <br/>
                                                <br>
                                                <button type="submit" class="form_button ">Отправить</button>
					</form>
				</div>
			</div>
                    <?php  }
                    }?>
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
	