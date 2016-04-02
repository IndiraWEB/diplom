<div class="uk-container" style="background-color: #ffffff;margin-top: 20px;">
    <div class="uk-grid" style="height: 60px; background-color: #535C69; color: #ffffff; margin-right: -35px">
        <div class="uk-width-1-1">
            <div style="margin-top: 14px; margin-left: -15px; color: #fff">
                <h3 style="color: white"> Студент(ка) - <?php echo $stud_content['name'] ?></h3>
            </div>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
           
            <?php echo $this->session->flashdata('status'); ?>
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1" style="">
           
            <table class="features-table">
               
                <tr>
                    <td>
                        <?php echo $stud_content['family'] ?>
                    </td>
                    <td>
                        <?php echo $stud_content['name'] ?>
                    </td>
                    <td>
                        <?php echo $stud_content['fathername'] ?>
                    </td>
                    
                    <td>
                        [<a href="#" data-uk-modal="{target:'#modal<?php echo $stud_content['id_student'] ?>'}">удалить</a>]
                        </td> </tr> 
                <tr>
                    <td>Специальность</td><td><?php echo $stud_content['spec'] ?></td>
                </tr>
                <tr>
                    <td>Дата рождения</td><td><?php echo $stud_content['burn'] ?></td>
                </tr><tr>
                    <td>Специальность</td><td><?php echo $stud_content['spec'] ?></td>
                </tr>
                
                    <div id="modal<?php echo $stud_content['id_student'] ?>" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <button type="button" class="uk-modal-close uk-close"></button>
                            <div class="uk-modal-header">
                                <h2>Удалить студента?</h2>
                            </div>
                            <p>Новость будет удалена</p>
                            <div class="uk-modal-footer uk-text-right">
                                <button type="button" class="uk-button uk-modal-close">Отмена</button>
                                <a class="uk-button uk-button-primary" href="/moderator/components/student/edit/<?php echo $image['id_student'] ?>/delete">Удалить</a>
                            </div>
                        </div>
        </div>
             
            </table>
           
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-1-1">
            
            <?php echo (isset($pages))? $pages:""; ?>
        </div>
    </div>
</div>



