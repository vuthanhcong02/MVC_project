<?php
$currentUrl = basename($_SERVER['REQUEST_URI']);
?>
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">

    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
      <i class="fa fa-remove fa-fw"></i> Close Menu
    </a>

    <a href="index.php?controller=admin&action=index" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == 'index.php?controller=admin&action=index') echo 'w3-blue'; ?>">
      <i class="fa fa-users fa-fw"></i> Overview
    </a>

    <a href="index.php?controller=adminproduct&action=index" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == 'index.php?controller=adminproduct&action=index') echo 'w3-blue'; ?>">
      <i class="fa fa-eye fa-fw"></i> Product
    </a>

    <a href="index.php?controller=admincategory&action=index" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == 'index.php?controller=admincategory&action=index') echo 'w3-blue'; ?>">
      <i class="fa fa-users fa-fw"></i> Category
    </a>

    <a href="index.php?controller=adminorder&action=index" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == 'index.php?controller=adminorder&action=index') echo 'w3-blue'; ?>">
      <i class="fa fa-shopping-basket fa-fw"></i> Orders
    </a>

    <a href="index.php?controller=adminaccount&action=index" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == 'index.php?controller=adminaccount&action=index') echo 'w3-blue'; ?>">
      <i class="fa fa-users fa-fw"></i> Users
    </a>

    <a href="#" class="w3-bar-item w3-button w3-padding <?php if ($currentUrl == '#') echo 'w3-blue'; ?>">
      <i class="fa fa-bell fa-fw"></i> News
    </a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i> Log out</a>
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>