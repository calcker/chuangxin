<template>
    <nav class="topbar navbar navbar-expand-sm bg-light navbar-light border-bottom">
		    <div class="container">
  			    <a class="navbar-brand" href="/">
   			  	    <img src="/images/logo.png" alt="logo">
    			      <strong>创新之城</strong>
 		 	      </a>
 		 	      <ul class="nav navbar-nav navbar-right">
				        <li>
					          <a class="notices" href="/my/notices" data-toggle="tooltip" data-placement="bottom" title="通知">
						            <i class="far fa-bell"></i>
					          </a>
				        </li>
                <li>
                	  <a class="mails" href="/mail/" data-toggle="tooltip" data-placement="bottom" title="私信">
                		    <i class="far fa-envelope"></i>
                	  </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         				        <a class="dropdown-item" href="/router#/profile"><i class="far fa-address-card"></i> 个人资料</a>
         				        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> 设置</a>
         				        <a class="dropdown-item" href="#"><i class="fas fa-home"></i> 我的主页</a>
          				      <div class="dropdown-divider"></div>
          				      <a class="dropdown-item" href="#"><i class="fas fa-power-off"></i> 退出</a>
        			      </div>
                </li>
            </ul>
 		   </div>
	  </nav>
</template>

<style type="text/css">
	.topbar .navbar-right{
		font-size: 20px;
	}

	.topbar .navbar-right li{
		width: 50px;
	}
</style>

<script>
	export default {
        mounted() {
  			$('[data-toggle="tooltip"]').tooltip();
        }
    }
</script>
