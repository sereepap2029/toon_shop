<?
$ci =& get_instance();
?>
<style type="text/css">
.row-fluid .no-margin-left{margin-left: 0px;}
.block{
  border: none;
}
</style>
<script src="<?echo site_url();?>js/angular.min.js"></script>
<script src="<?echo site_url();?>js/angular/core.js"></script>
<script src="<?echo site_url();?>js/jquery.matchHeight.js"></script>
<script type="text/javascript">
  var productapp = angular.module('productapp', []);
productapp.directive('equalHeight', function() {
  return function(scope, element, attrs) {
    if (scope.$last){
      //$(".product-item").equalHeights();
      $(".product-item").matchHeight({
              byRow: false,
              property: 'height',
              target: null,
              remove: false
          });
    }
  };
});
productapp.controller('productlistctrl', function ($scope,$http) {
  $scope.product_list= {};
  $.ajax({
        method: "POST",
        url:site_url("shop/ang_get_product_list"),
        async :false,
        data: {
            "main_cat":"<?=$main_cat?>",
            "sub_cat":"<?=$sub_cat?>",
        }
    })
    .done(function(data) {
        $scope.product_list=data['products'];
        
     });
    console.log($scope.product_list);
    $scope.get_product = function(main_cat,sub_cat) {
      $http.post(site_url("shop/ang_get_product_list"), {
            "main_cat":main_cat,
              "sub_cat":sub_cat,
        }).
        success(function(data, status, headers) {
           $scope.product_list=data['products'];
        }).
        error(function(data, status, headers) {
            alert(headers);
        });
    }
});
</script>
<div class="container-fluid" ng-app="productapp">
            <div class="row-fluid">                
                <div class="span12" id="content">

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block" ng-controller="productlistctrl">
                            <div class="span4 shop-side no-margin-left">
                              <ul class="shop-category">
                              <li class="shop-main-cat">
                                      <a href="javascript:;" ng-click="get_product('all','all')">ทั้งหมด</a>
                                </li>
                                <?
                                foreach ($category as $key => $value) {
                                  ?>
                                    <li class="shop-main-cat">
                                      <a href="javascript:;" ng-click="get_product('<?=$value->id?>','all')"><?=$value->name?></a>
                                      <?
                                      if (count($value->sub_cat)>0) {
                                        ?>
                                        <a href="javascript:;" class="toggle_show_sub icon-chevron-right"></a>
                                        <ul class="shop-subcategory hide">        
                                        <?
                                        foreach ($value->sub_cat as $sub_key => $sub_value) {
                                          ?>
                                          <li class="shop-sub-cat">
                                            <a href="javascript:;" ng-click="get_product('<?=$value->id?>','<?=$sub_value->id?>')"><?=$sub_value->name?></a>
                                          </li>

                                          <?
                                        }
                                        ?>
                                        </ul>
                                        <?
                                      }
                                      ?>       
                                    </li>
                                  <?
                                }
                                ?>
                                
                              </ul>
                            </div>
                            <div class="span8 shop-item-list no-margin-left">
                              <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         
                                        
                                      </div> 
                                      <div style="float:right">
                                         Search: <input ng-model="query.product_name">
                                      </div>                                       
                                   </div>
                                   <div>
                                      <div class="product-item" ng-repeat="(key, value) in product_list | filter:query track by value.product_id" ng-switch on="value.in_stock" equal-height>
                                          <img src="<?echo site_url("media/product_photo");?>/{{value.product_id}}/{{value.photo[0].filename}}">
                                          <label class="product-name">{{value.product_name}}</label>
                                          <p>
                                            ราคา : {{value.real_price}}<br>
                                            ลดราคา : {{value.sale_price}}<br>
                                            <font ng-switch-when="y">มีของ</font><font ng-switch-when="n">ไม่มีของ</font><br>
                                          </p>
                                          <a href="<?echo site_url("shop/product_detail");?>/{{value.product_id}}" class="btn btn-success"><i class="icon-list-alt icon-white"></i></a>                                          
                                      </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
        </div>
        <!--/.fluid-container-->
        <script type="text/javascript">
        $(document).on('click', ".toggle_show_sub", function(){
          //$( ".toggle_show_sub" ).removeClass("icon-chevron-down");
          //$( ".toggle_show_sub" ).addClass("icon-chevron-right");
          var stat=$(this).hasClass( "icon-chevron-right" );
          if (stat) {
            $(this).removeClass("icon-chevron-right");
            $(this).addClass("icon-chevron-down");
            $(this).parent().children(".shop-subcategory").slideDown();
          }else{
            $(this).removeClass("icon-chevron-down");
            $(this).addClass("icon-chevron-right");
            $(this).parent().children(".shop-subcategory").slideUp();
          }
        });
        $(function() {
          $(".datepicker").datepicker({
              changeMonth: true,
              changeYear: true
          });
          $('.datetimepicker').datetimepicker();
          $(".chzn-select").chosen({
              width: "75%"
          });
          
        });
        </script>

                                          

            