 <style type="text/css">
 /* Resets */
nav a { 
    text-decoration: none;
    color: #fff;
    display: block; }
nav a:hover { //text-decoration: underline; }
nav ul { 
    list-style: none;
    margin: 0;
    padding: 0; }
nav ul li { margin: 0; padding: 0; }

/* Top-level menu */
nav > ul > li { 
   float: left;
    position: relative; }
nav > ul > li > a { 
   padding: 10px 30px;
   border-left: 1px solid #000;
    display: block;}
nav > ul > li:first-child { margin: 0; }
nav > ul > li:first-child a { border: 0; }

/* Dropdown Menu */
nav ul li ul { 
    position: absolute;
   background: #ccc;
    width: 100%; 
    margin: 0;
    padding: 0;
    display: none; }
nav ul li ul li { 
    width: 100%; }
nav ul li ul a { padding: 10px 0; }
nav ul li:hover ul { display: block; }
 </style>
 <div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #5bb75b;">
      <div class="navbar-inner" style="background-color:#5bb75b;">
        <div class="container-fluid" style="background-color: #5bb75b;">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" style="background-color:#5bb75b;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><b>JoysonApparel 1.0</b></a>
          <div class="nav-collapse collapse" style="background-color: #5bb75b;">
            <ul class="nav pull-right">
              <li><a class="ho"><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong></a></li>
			 <li><a class="ho"> <i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d',time());
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
				</a></li>
         <li><nav>
      <ul>
          <li>
              <a href="#"><i class="icon-cog icon-large"></i> Settings </a>
              <ul style="background: #5bb75b;">
                <li><a href="#"><i class="icon-user icon-small"></i> User Accounts</a></li>
                <li><a href="#"><i class="icon-lock icon-small"></i> Privacy</a></li>
             </ul>
          </li>
      </ul>
         </nav></li>
              <li><a class="ho" href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	