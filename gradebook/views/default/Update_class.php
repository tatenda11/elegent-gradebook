<style>
   @media only screen and (min-width: 120px) and (max-width: 600px){
       .input-control,label{
           float:none;
           clear:both;
           display: block;
           margin-bottom:10px;
       }
   }
</style>
<div class="container page-content"></br>
    <h1><a href="<?= dashboard_route() ?>" class="nav-button transform"><span></span></a>&nbsp;Update Class (<?=  $class['className']   ?>)</h1>
    <div class='spacer'></div>
    <ul class="breadcrumbs2  primary">
        <li><a href="<?= dashboard_route() ?>"><span class="icon mif-home"></span></a></li>
        <li><a href='#'> Update Class</a></li>
    </ul>
    <div id='addClassForm'><br>
        <?php if(isset($responseArray)):  ?>
            <?php if($responseArray['error'] == true ): ?>
                <div class="panel alert">
                    <div class="heading">
                        <span class="title"><?= $responseArray['Message'] ?></span>
                    </div>
                </div>
                <div class='clear'></div>
            <?php elseif($responseArray['error'] == false ): ?>
                <div class="panel">
                    <div class="heading">
                        <span class="title"><?= $responseArray['Message'] ?></span>
                    </div>
                </div>
                <div class='clear'></div>
            <?php endif;?>
        <?php endif;?>
        <?php echo form_open('Manage_classes/update_class/');?>
            <div class="input-control text ">
                <label>Class syllabus</label></br>
                <select name='txt_syllabusId'>
                    <?php foreach($syllabuses as $syllabus):?>
                        <option value='<?=  $syllabus['syllabusId'] ?>' ><?=  $syllabus['syllabusName'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            &nbsp;&nbsp;
            <div class="input-control text ">
                <label>Class Grade/Form</label></br>
                <select name='txt_classGrade'>
                    <option>Grade</option>
                    <option>Form</option>
                </select>
            </div>
            <div class="input-control text ">
                </br><select  name='txt_grade'>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                </select>
            </div> 
            <div class='clear'></div>
            <label>Class name</label></br>
            <div class="input-control text ">
                <input type="text" placeholder='Class name'  name='txt_classname'/>
            </div>
            <div style='clear:both; margin-top:30px;'>
                <button type='submit' class="button large-button primary"  name='btn_addClass'>Add Class</button>
            </div>
        </form>
    </div>
</div>    
<div style='height:70px;'></div>