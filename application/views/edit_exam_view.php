<?php
    $data['title'] = "Edit Exam";
    $this->load->view('header/style_demo_header', $data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>
<body id="top">
    <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
                <h1><a href="index.html">Course Management System</a></h1>
                <p>Teacher Panel of <b><?php echo " ".$info->Name.""; ?></b>
                    <br>
                    <?php echo anchor('course/logout', 'Log Out'); ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li class="active"><a href="<?php echo base_url().'index.php/teacher_home/index';?>">Back</a></li>

            </ul>
            <div  class="clear"></div>
        </div>
    </div>
<script type="text/javascript" charset="utf-8">
    $(function(){
        $("#edit_exam_form").validate({
            rules:{
                Duration:{
                        number:true,
                        min: 1,
                        required:true,
                        maxlength: 10},
                 Location:{
                        required:true,
                        maxlength:20},
                 Date:{
                        required:true
                 }
                },                
            message:{
                Duration:{
                    maxlength: "At most 10 digit"
                }
            }
        });
    });

    $(document).ready(function(){
        $("#edit_exam_button").click(function(){
                    if($("#edit_exam_form").valid()){
                        $("#edit_exam_form").submit();
                    }

            });
    });
</script>
    <div class="wrapper row4">
        <div id="container" class="clear">
            <h2>Exam information</h2>
            <?php
                $this->db->where('CourseNo',$courseno);
                $this->db->where('Sec',$sec);
                $this->db->where('ID',$id);
                $query=$this->db->get('exam');
                $record=array();
                if($query->num_rows()>0){
                    $record=$query->row();
                }
            ?>

            <?php echo form_open('teacher_home/edit_exam2/'.$courseno.'/'.$id,'id="edit_exam_form"'); ?>
            
            <table style="width:50%">
                
                <tbody>
            <tr>
                <td>Courseno:</td>
                <td><input type="text" name="courseno" value="<?php echo $courseno;?>" readonly="true"/></td>
            </tr>
            <tr>
                <td>Section:</td>
                <td><input type="text" name="Sec" value="<?php echo $sec;?>" readonly="true"/></td>
            </tr>
            <tr>
                <td>Exam Type:</td>
                <td><input type="text" name="Type" value="<?php echo $record->etypename;?>" readonly="true"/></td>
            </tr>
            <tr>
                <td>Exam No:</td>
                <td><input type="text" name="Topic" value="<?php echo $record->Topic;?>" readonly="true"/></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input type="text" name="Duration" maxlength="30" value="<?php echo $record->Duration;?>"/></td>
            </tr>
            <tr>
                <td>Location:</td>
                <td><input type="text" name="Location" maxlength="30" value="<?php echo $record->Location?>"/></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="text" name="Date" id="datepicker"><?php echo $record->eDate;?></td>
            </tr>
            
            <tr>
                <td>Time:</td>
                <td>
                <?php
                $options=array();
                for($i=1;$i<=12;$i++){
                    if($i<10)$t='0'.$i;
                    else $t=$i;
                    $options[$t]=$t;
                }
                echo form_dropdown('hour',$options);

                $options=array();
                for($i=0;$i<=59;$i++){
                    if($i<10)$t='0'.$i;
                    else $t=$i;
                    $options[$t]=$t;
                }
                echo form_dropdown('minute',$options);

                $options=array('AM'=>'am','PM'=>'pm');
                echo form_dropdown('meridian', $options);
                echo $record->eTime;
                ?>
                </td>
            </tr>                        
            </tbody>
            </table>
            <p>Syllabus:</p>
            <div>
                <textarea name="Syllabus" rows="10" cols="60"><?php echo $record->Syllabus;?></textarea>
            </div>
            <?php if($task=='edit'):?>
            <input type="button" id="edit_exam_button" value="Edit">
            <?php endif;?>
            <?php echo form_close();?>
            <?php echo br(3);?>
            <?php if($task=='edit'):?>
            <?php echo form_open('teacher_home/delete_scheduled_exam');?>
            <input type="hidden" name="delete_courseno" value="<?php echo $courseno;?>"/>
            <input type="hidden" name="delete_sec" value="<?php echo $sec;?>"/>
            <input type="hidden" name="delete_id" value="<?php echo $id;?>"/>
            <input type="submit" value="Delete this Exam" onclick=" return check()"/>
            <?php echo form_close();?>
            <?php endif;?>
            
        </div>
    </div>
    

    <?php $this->load->view('footer/footer'); ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  