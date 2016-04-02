<?php $this->load->helper('form'); ?>
	<div class="cr">
		<div class="container">
                    
                    <div class="content">
				<div class="title">Личные данные</div>
				<div class="rezume">
                                    <input type="hidden" id="id_stud" value ="<?php echo $student['id_student'] ?>">
                                 <?php
                                 if((!$this->session->userdata('id_student'))&($this->session->userdata('id_student')!==$student['id_student'])){
                                 ?>   <button class="button" id="invite" >Прегласить на практику</button> <?php } ?>
					<br/>
                                        <hr/>
                                            <?php
                                        if($student){

echo " <div class='student'>"."<span>".'Имя:'."</span>" .$student['name']."</div>";
echo " <div class='student'>"."<span>".'Фамилия:'."</span>" .$student['family']."</div>";
echo " <div class='student'>"."<span>".'Отчество:'."</span>" .$student['fathername']."</div>";
echo " <div class='student'>"."<span>".'Дата рождения:'."</span>" .$student['burn']."</div>";
echo "<div class='student'>"."<span>".'Е-mail:'."</span>" ." <a href='mailto:".$student['email']."'> " .$student['email']."</a>"."</div>";
echo " <div class='student'>"."<span>".'Опыт работы:'."</span>" .$student['dop_nav']."</div>";
echo " <div class='student'>"."<span>".'Опыт работы:'."</span>" .$student['dop_nav']."</div>";
echo " <div class='student'>"."<span>".'Дополнительные навыки:'."</span>" .$student['opyt']."</div>";

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
<form id="formResume" action="cabinet/student_change/<?php echo $student['id_student'] ?>" method="post" >
<input  name="fam_" id="FrFam" maxlength="200" class="form_f" type="text" size="1" value="<?php echo $student['family'] ?>"  placeholder="Фамилия..."/>
<input  name="name_"  id="FrName" maxlength="200" class="form_f" type="text" size="1"  value="<?php echo $student['name'] ?>"  placeholder="Имя..."/>
<input  name="fathname_"  id="FmFathname" maxlength="200" class="form_f" type="text" size="1"  value="<?php echo $student['fathername'] ?>"  placeholder="Отчество..."/>
<input name ="burn_" type="date" id="FrDate" placeholder="мм/дд/гггг" value="<?php echo $student['burn'] ?>" class="form_f ">
<select class="form_f" id="FrRegion" >

    <option>Восточный Казахстан</option>
    <option>Западный Казахстан</option>
    <option>Северный Казахстан</option>
    <option selected>Центральный Казахстан</option>
    <option>Южный Казахстан</option>
</select>
<input type="hidden" id="Region" name="region_" >
<select class="form_f" id="FmProf" >
   <option>Выберите факультет</option>
  <!--   <option value="1">КСиПО</option>
    <option value="3">Экономический</option>
    <option value="2">Архитектурный</option>
    <option value="8">Агрономический</option>
    <option value="7">Энергетический</option>
    <option value="4">ВиТЖ</option>
    <option value="5">Землеустройства</option> -->
</select>
<input type="hidden" id="Prof" name="fac_" value="<?php echo $student['fc_code'] ?>" >
<select class="form_f" id="lvl">
<!--
<option value="070300">Информационные системы</option>

<option value="012000">Профессиональное обучение</option>

<option value="070400">Вычислительная техника и
программное обеспечение</option>
-->
</select>
<input type="hidden" id="level" name="spec_name_">
<select class="form_f" id="stepen">
<option value="5B">бакалавр</option>

<option value="6M">магистр</option>

<option value="6D">доктор</option>
</select>
<input type="hidden" id="mag" name="stepen_">

<textarea name="experience" id="FrOpyt" class="form_textarea" cols="30" rows="10"  placeholder="Опыт работы...">
    <?php echo  $student['opyt'] ?>
</textarea>
<textarea name="add_skills" id="FrNav" class="form_textarea" cols="30" rows="10"  placeholder="Дополнительные навыки...">
    <?php echo $student['dop_nav'] ?>
</textarea>

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
                        <img src="assets/img/news.jpg" alt=""/>
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
                                <img src="assets/img/news.jpg" alt=""/>
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
	