<?php 
   $this->load->library('pagination');
$cnt = 0;
foreach ( $text as $row){
    $cnt++;
  echo ($cnt % 3 == 1) ? '<div class="row margin-top">' : '';
  
?>

<div class=" col-md-4 " >
    <div class="panel panel-default">
   <div class="panel-body">
                   <?php if(!empty($row['img_full_path'])) { ?>
        <a href="<?php echo base_url() ?>news/content/<?php echo $row['news_id'] ?>"><img src="<?php echo $row['img_full_path'];  ?>" style="max-width: 350px" alt="" class="img-thumbnail col-md-12" ></a>
                   <?php } ?>
                    <div class="caption">
                        <h3><a href="<?php echo base_url() ?>news/content/<?php echo $row['news_id'] ?>"><?php echo $row['news_title'] ?></a></h3>
                        <p><?php echo $row['news_preloader']?></p>
                        <p><a href="<?php echo base_url() ?>news/content/<?php echo $row['news_id'] ?>" class="btn btn-ar btn-primary col-md-12" style="font-weight: bold" role="button">Перейти к просмотру</a></p>
                      </div>
   </div></div>
                    </div>

    
<?php   echo ($cnt % 3 == 0) ? '</div>' : ''; 
 }  
 
 ?>


