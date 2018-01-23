<div class="container" style="margin-top:20px">
	<div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-heading">
        	<h3 class="panel-title">用户管理</h3>
        </div>
        <div class="panel-body">
        	
           <div class="container-fluid">
           
                <div class="col-md-11"></div>
                
                <div class="col-md-1">
                
                    <!-- Large modal -->
                    <?php if ($input->get("up") != "yes"):?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user">添加用户</button>
                    <?php endif;?>
                    
                    
                    <!-- 添加/修改用户表单 -->
                    <?php
                    if ($input->get("up") == "yes" and $input->get("id") <> NULL){
                        $yz_url = "?yz=up&id=".$input->get("id");
                        $cz_name = "修改用户";
                        $up_name = $rs_up['name'];
                        echo "<script>$(function () { $('#add_user').modal({keyboard: true})});</script>";
                    } else {
                        $yz_url = "?yz=add";
                        $cz_name = "添加用户";
                        $up_name = NULL;                        
                    }
                    ?>
                    <form action="<?php echo $yz_url?>" method="post" class="form-horizontal">                    
                    <div id="add_user" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?php echo $cz_name?></h4>
                          </div>
                          <div class="modal-body">
                            <p>                                
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户</label>
                                    <div class="col-sm-10">
                                        <input name="name" value="<?php echo $up_name?>" type="text" class="form-control" id="inputEmail3" placeholder="用户名">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                                    <div class="col-sm-10">
                                      <input name="passwd" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                  </div>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    </form>
                    
                </div>
                
                
                <div class="col-md-12" style="margin-top:20px">
                    <div class="panel panel-default">
                          <!-- Default panel contents -->
                    
                          <!-- Table -->
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#ID</th>
                                <th  class="col-md-10">用户名</th>
                                <th>操作</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($row_user as $rs_user):?>
                              <tr>
                                <th scope="row"><?php echo $rs_user['id'] ?></th>
                                <td><?php echo $rs_user['name'] ?></td>
                                <td>
                                    <a href="?up=yes&id=<?php echo $rs_user['id'] ?>"><button type="button" class="btn btn-success" data-toggle="modal">修改</button></a>
                                    <a href="?del=yes&id=<?php echo $rs_user['id'] ?>"><button type="button" class="btn btn-default" data-toggle="modal">删除</button></a>
                                </td>
                              </tr>
                              <?php endforeach;?>
                            </tbody>
                          </table>
                        </div>
                </div>
           </div> 
            
            
            
            
            <!-- /.modal 错误提示/删除提示模态框 -->   
            <?php
            if ($input->get("del") == "yes" and $input->get("id") <> NULL){
                $del_id = (int)$input->get("id");
                $mtk_name = "删除提示";
                $cwts = "是否确定删除用户?";
                $mtk_nn = "<a href=?up=del&id=".$del_id."><button type='button' class='btn btn-danger' data-toggle='modal'>删除</button></a> "
                        . "<button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>";
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
            } else {
                $mtk_name = "错误提示"; 
                $mtk_nn = "<button type='button' class='btn btn-default' data-dismiss='modal'>确认</button>";                
            }
            ?>         
            <div id="modal-cwts" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo $mtk_name?></h4>
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
                       <?php echo $mtk_nn?>
                    </div>
                </div>
              </div>
            </div>            
            <!-- /.modal 错误提示模态框END -->

            
        </div>
        </div>
    </div>
</div>