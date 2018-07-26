<div class="app-bar">
    <a class="app-bar-element" href="...">Home</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li><a href="">Home</a></li>
        <li>
            <a href="" class="dropdown-toggle">Products</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">Windows 10</a></li>
                <li><a href="">Spartan</a></li>
                <li><a href="">Outlook</a></li>
                <li><a href="">Office 2015</a></li>
                <li class="divider"></li>
                <li><a href="" class="dropdown-toggle">Other Products</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Internet Explorer 10</a></li>
                        <li><a href="">Skype</a></li>
                        <li><a href="">Surface</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="">Support</a></li>
        <li><a href="">Help</a></li>
    </ul>
</div>
<div class="container page-content theme-base"></br></br>
    <h1 class='font-heading theme-inverse header-text'><a href="#"><span></span></a>&nbsp;Admin User Dashboard</h1>
    <div class='spacer'></div>
    <h3 class="fg-blue text-light margin5">Students <span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
    
    <div class="tile-group no-margin no-padding" style="width: 100%;">
        <a href='#' class="tile-wide bg-blue theme-inverse" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-base label-text">Manage Students</span>
            </div>
        </a>
        <a href='<?=  base_url('Manage_students/addStudent')  ?>' class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Add Student</span>
            </div>
        </a>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Class lists</span>
            </div>
        </div>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Import Batch</span>
            </div>
        </div>   
    </div>
    <div class='spacer'></div>
    <h3 class="fg-blue text-light margin5">Classes <span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
    <div class="tile-group no-margin no-padding" style="width: 100%;">
        <div class="tile-wide bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Manage classes</span>
            </div>
        </div>
        <a href='<?=  base_url('Manage_classes/add_new_class')  ?>' class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Add class</span>
            </div>
        </a>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Import Batch</span>
            </div>
        </div>
    </div></br>
    <div class='spacer'></div>
    <h3 class="fg-blue text-light margin5">System Admin <span class="mif-chevron-right mif-2x" style="vertical-align: top !important;"></span></h3>
    <div class="tile-group no-margin no-padding" style="width: 100%;">
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Institution details</span>
            </div>
        </div>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Run term end</span>
            </div>
        </div>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Manage Users</span>
            </div>
        </div>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Backup and Restore</span>
            </div>
        </div>
        <div class="tile bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">My account</span>
            </div>
        </div>
        <div class="tile-wide bg-blue theme-base" data-role="tile">
            <div class="tile-content">
                <span class="tile-label theme-inverse label-text">Inbox</span>
            </div>
        </div>
    </div>
</div>


        