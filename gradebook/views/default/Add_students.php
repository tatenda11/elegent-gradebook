<div class="container page-content"></br>
    <h1><a href="<?= dashboard_route() ?>" class="nav-button transform"><span></span></a>&nbsp;Add Students</h1>
    <div class='spacer'></div>
    <ul class="breadcrumbs2  primary">
        <li><a href="<?= dashboard_route() ?>"><span class="icon mif-home"></span></a></li>
        <li><a href='#'> add students</a></li>
    </ul>
    <div id='addStudentForm'><br>
        <label>First Name</label></br>
        <div class="input-control text form-input">
            <input type="text" placeholder='Student first name'  id='txt_firstName'/>
        </div>
        </br></br><label>Middle Name</label></br>
        <div class="input-control text form-input">
            <input type="text" placeholder='Student first name'  id='txt_middleName'/>
        </div>
        </br></br><label>Last Name</label></br>
        <div class="input-control text form-input">
            <input type="text" placeholder='Student first name'  id='txt_lastName'/>
        </div>
        </br></br><label>Gender</label></br>
        <div class="input-control text form-input">
            <select id='txt_sex'>
                <option>MALE</option>
                <option>FEMALE</option>
            </select>
        </div>
        </br></br><label>Date Of Birth</label></br>
        <div class="input-control text form-input" data-role="datepicker">
            <input type="text" id='txt_dateOfBirth'>
            <button class="button"><span class="mif-calendar"></span></button>
        </div>
        </br></br><label>National Id Number</label></br>
        <div class="input-control text form-input">
            <input type="text" placeholder='Student first name'  id='txt_nationalId'/>
        </div>
        </br></br><label>Birth Entry Number</label></br>
        <div class="input-control text form-input">
            <input type="text" placeholder='Student first name'  id='txt_firstName'/>
        </div>
        </br></br><label>Physical Address</label></br>
        <div class="input-control text form-input">
           <textarea id='txt_Address'></textarea>
        </div> 
        <div style='clear:both; margin-top:80px;'>
            <input type='submit' class="button primary" value='Add  Student' id='btn_addStudent'/>
        </div>
    </div>
</div>    
<div style='height:70px;'></div>