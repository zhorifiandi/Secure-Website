<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
?>
<div class="navbar navbar-default navbar-fixed-top"> 
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $base_url;?>">
                <strong> Mini Blog  </strong> 
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $base_url;?>" class="active-link">POSTS</a></li>
                <li><a href="<?php echo $base_url;?>/_admin/login">LOGIN</a></li>
            </ul>
        </div>
        
    </div>
</div>