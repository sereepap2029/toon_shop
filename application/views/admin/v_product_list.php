<?
$ci =& get_instance();
?>
<script src="<?echo site_url();?>js/jquery.matchHeight.js"></script>
<script src="<?echo site_url();?>js/angular.min.js"></script>
<script src="<?echo site_url();?>js/angular/core.js"></script>
<script src="<?echo site_url();?>js/angular/product_list.js"></script>

<style type="text/css">
</style>
<div class="container-fluid" ng-app="productapp">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Product list</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<? echo site_url('admin/product/product_add')?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                        
                                      </div> 
                                      <div style="float:right">
                                         Search: <input ng-model="query.product_name">
                                      </div>     
                                      <div style="float:right;width:300px">
                                         Category: <select id="parent_category" ng-model="query.combine_cat">
                                                      <option value="">All</option>                                                
                                                      <?
                                                      foreach ($category as $key => $value) {
                                                        ?>
                                                        <option value="__<?=$value->id?>"><?=$value->name?></option> 
                                                          <?
                                                          foreach ($value->sub_cat as $key2 => $value2) {
                                                            ?>
                                                            <option value="<?=$value2->id."__".$value->id?>">&nbsp;&nbsp;&nbsp;<?=$value2->name?></option> 
                                                            <?
                                                          }
                                                        }
                                                      ?>
                                                    </select>
                                      </div>                                     
                                   </div>
                                   <div ng-controller="productlistctrl">
                                      <div class="product-item" ng-repeat="(key, value) in product_list | filter:query track by value.product_id" ng-switch on="value.in_stock" equal-height>
                                          <img src="<?echo site_url("media/product_photo");?>/{{value.product_id}}/{{value.photo[0].filename}}">
                                          <label class="product-name">{{value.product_name}}</label>
                                          <p>
                                            ราคา : {{value.real_price}}<br>
                                            ลดราคา : {{value.sale_price}}<br>
                                            <font ng-switch-when="y">มีของ</font><font ng-switch-when="n">ไม่มีของ</font><br>
                                          </p>
                                          <a href="<?echo site_url("admin/product/product_edit");?>/{{value.product_id}}" class="btn btn-success"><i class="icon-pencil icon-white"></i></a>
                                          <a href="javascript:;" id="{{value.product_id}}" class="btn btn-danger del_p"><i class="icon-remove icon-white"></i></a>
                                      </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script type="text/javascript">
        $(function() {
          $(".datepicker").datepicker({
              changeMonth: true,
              changeYear: true
          });
          $('.datetimepicker').datetimepicker();
          $(".chzn-select").chosen({
              width: "75%"
          });
          $(document).on('click', ".del_p", function(){
            cue_ele=$(this);
            if (confirm("แน่ใจ๋")) {
                $.ajax({
                    method: "POST",
                    url: "<?php echo site_url("admin/product/del_product"); ?>",
                    data: {
                        "id": cue_ele.attr("id"),
                    }
                })
                .done(function(data) {
                    cue_ele.parent().fadeOut(500,function(){
                      $(this).remove();
                    });
                });
              }
          });
        });
        </script>