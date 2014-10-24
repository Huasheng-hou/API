
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $header; ?>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <?php echo $sidebar?>
  </div>
  <!-- End #sidebar -->

  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->

    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>用户列表</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">Table</a></li>
          <!-- href must be unique and match the id of target div -->
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
  
          <table>
            <thead>
              <tr>
 
                <th>用户名</th>
                <th>用户权限</th>
                <th>注册时间</th>
                <th>修改</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
              <!--     <div class="bulk-actions align-left">
      
                  <div class="pagination"> 
                    <a href="#" title="First Page">&laquo; First</a>
                    <a href="#" title="Previous Page">&laquo; Previous</a> 
                    <a href="#" class="number" title="1">1</a> 
                    <a href="#" class="number" title="2">2</a> 
                    <a href="#" class="number current" title="3">3</a> 
                    <a href="#" class="number" title="4">4</a> 
                    <a href="#" title="Next Page">Next &raquo;</a>
                    <a href="#" title="Last Page">Last &raquo;</a> 
                  </div> -->
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>

            <?php foreach($user_list as $user) :?>
              <tr>

                <td><?php echo $user['username'];?></td>
                <td><?php echo $position[$user['level']];?></td>
                <td><?php echo $user['register_time'];?></td>
                <td>
                  <!-- Icons -->
<!--                   <a href="#" title="Edit">
                    <img src="<?php echo base_url()?>assets/cms/images/icons/pencil.png" alt="Edit" />
                  </a>  -->
                  <a href="<?php echo site_url('cms/user/del_user/'.$user['uid'])?>" title="Delete">
                    <img src="<?php echo base_url()?>assets/cms/images/icons/cross.png" alt="Delete" />
                  </a> 
<!--                   <a href="#" title="Edit Meta">
                    <img src="<?php echo base_url()?>assets/cms/images/icons/hammer_screwdriver.png" alt="Edit Meta" />
                  </a>  -->
                </td>
              </tr>
          <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
     
     
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <?php echo $footer; ?>   
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
