<div class="cr">
		<div class="container">
			<div class="content">
				<div class="title">Какая та новость</div>
				<div class="news_container">
				<?php if(isset($allnews)) {
                                    foreach ($allnews as $text ) {?>
				<li class="news_first_lvl">
					<div class="news_item_side_bar_img">
						<a href="welcome/news/<?php echo $text['news_id'] ?>">
							<img src="<?php echo $text['img_full_path'] ?>" alt=""/>
						</a>
					</div>
					<div class="news_item title">
                                            <a href="welcome/news/<?php echo $text['news_id'] ?>"><?php echo $text['news_title'] ?></a>
					</div>
					<div class="news_item_des">
						<p>
							<?php echo $text['news_preloader'] ?>
						</p>
					</div>
				</li>
                                <?php } } ?>
				<li class="news_first_lvl">
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
				</li>
				<li class="news_first_lvl">
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
				</li>
				<li class="news_first_lvl">
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
				</li>
				</ul>

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