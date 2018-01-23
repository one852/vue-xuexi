<div class="container" style=" margin-top:200px">
	<div class="col-md-3"></div>
	<div class="col-md-6">
        <div class="panel panel-default">
        	<div class="panel-heading">
        	<h3 class="panel-title">登陆后台管理</h3>
        </div>
        <div class="panel-body">
        	
            
            <form action="?yz=login" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">用户</label>
                <div class="col-sm-10">
                  <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="用户名">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                  <input name="passwd" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form>
            
            <!-- /.modal 错误提示模态框 -->            
            <div id="modal-cwts" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">错误提示</h4>
                  </div>
                  <div class="modal-body">
                    <p>
					<?php
					if (isset($cwts)){
					echo $cwts;}
					?>
                    </p>
                  </div>
                  <div class="modal-footer">
                     <button type='button' class='btn btn-default' data-dismiss='modal'>确认</button>
                  </div>
                </div>
              </div>
            </div>                
            <!-- /.modal 错误提示模态框END -->

            
        </div>
        </div>
    </div>
	<div class="col-md-3"></div>
</div>