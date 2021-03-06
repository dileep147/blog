<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <?php $this->load->view('partials/home/common/header'); ?>
</head>
<body>
<!--navbar-->
<?php
    $this->load->view('partials/home/common/navbar');
?>
<!--end navbar-->
<div class="container-costom">
    <div class="row-costom">
        <div class="left-box">
            <?php $this->load->view('partials/home/common/postbar'); ?>
            <div class="left-box">
            <?php $this->load->view('partials/home/common/categoriesbar'); ?>
        </div>
        </div>

        <div class="middle-box">
            <?php
                if($page_body === "root"){
                    $this->load->view('partials/home/body/root');
                }else if($page_body === 'create_post'){
                    $this->load->view('partials/home/body/create_post');
                }else if($page_body === 'view_post'){
                    $this->load->view('partials/home/body/view_post');
                }else if($page_body === 'view_aLl_post'){
                    $this->load->view('partials/home/body/view_all_post');
                }else if($page_body === 'profile_view'){
                    $this->load->view('partials/home/body/profile_view');
                }else if($page_body === 'edit_post'){
                     $this->load->view('partials/home/body/edit_post');
                }else if($page_body === 'view_alert'){
                     $this->load->view('partials/home/body/view_alert');
                }else if($page_body === 'view_pending_post'){
                     $this->load->view('partials/home/body/view_pending_post');
                }else if($page_body === 'profile_view_edit'){
                     $this->load->view('page/home/profile_view_edit');
                }else if($page_body === 'errors'){
                    $this->load->view('partials/home/body/errors');
                }
            ?>
        </div>

        <div class="right-box">
            <?php $this->load->view('partials/home/common/newsbar'); ?>
            
        </div>
        
    </div>
</div>
</body>
</html>