<div class="cr">
		<div class="container">
			<div class="content">
				<div class="title">Поиск компании</div>
                                <?php 
                                
                                if(isset($companies)){
                                    foreach($companies as $cmp ){?>
				<div class="compani_item">
					<div class="compani_item_img">
						<img src="img/comp1.png" alt=""/>
					</div>
					<div class="comp_info">

						<div class="title_min"><?php echo $cmp['name'] ?></div>
						<div class="des_comp">
							<p>
							<?php echo $cmp['description'] ?>
							</p>
						</div>
                                                <div class="des_comp">
							<p>Город: <?php echo $cmp['city'] ?></p>
						</div>
						<div class="des_comp">
							<p>Регион: <?php echo $cmp['region'] ?></p>
						</div>
						<div class="des_comp">
							<p>Вакансии: <?php  echo $cmp['voucance']; ?></p>
						</div>
						<div class="des_comp">
							<p>Контактный номер:<?php echo $cmp['phone'] ?></p>
						</div>
						<div class="des_comp">
                                                    <p>Почта: <a href="mailto:<?php echo $cmp['email'] ?>"> <?php echo $cmp['email'] ?></a></p>
						</div>
						<div class="des_comp">
							<p>Веб-сайт: www.astanacreative.kz</p>
						</div>
					</div>
				</div>
                                <?php } }
                                 
                                ?>
				<?php $this->load->library('pagination');
                                        ?>
                            <div id="pagination"><?php echo(isset($pages)&!empty($pages)) ?$pages :" ";?>
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