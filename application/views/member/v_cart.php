<?
$ci =& get_instance();
?>
<div class="container-fluid">
            <div class="row-fluid">                
                <div class="span12" id="content">
                <div class="span3">
                  <?
                  $ci->load->view('member/v_side_bar');
                  ?>
                </div>
                <div class="span9">
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">ตะกร้าสินค้า</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">  
                                   <?
                                   if (count($address_list)>0) {
                                     ?>
                                     <a href="javascript:submit_form();"><button class="btn btn-success">สั่งซื้อ </button></a>
                                     <?
                                   }else{
                                    ?>
                                    <font style="color:red">คุณยังไม่ได้เพิ่ม ที่อยู่ในการจัดส่ง กรุณาเพิ่มที่อยู่ในการจัดส่ง</font>
                                    <a href="<? echo site_url('member/address_add')?>"><button class="btn btn-success">เพิ่มที่อยู่ <i class="icon-plus icon-white"></i></button></a>                             
                                    <?
                                   }
                                   ?>
                                    
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                              <th>ชื่อสินค้า</th>
                                              <th>ราคา</th>
                                              <th>จำนวน</th>
                                              <th>ราคารวม</th>
                                              <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?
                                           $all_total=0;
                                            foreach ($cart_item as $key => $value) {
                                              $all_total+=(int)$value->detail->sale_price*(int)$value->qty;
                                             ?>
                                             <tr id="d_c_<?echo $value->id;?>">
                                                  <td><img width="150" src="<?echo site_url("media/product_photo/".$value->detail->product_id."/".$value->detail->photo[0]->filename);?>"><? echo $value->detail->product_name; ?></td>
                                                  <td><? echo $value->detail->sale_price; ?></td>
                                                  <td><input type="text" class="qty" data-price="<?=(int)$value->detail->sale_price?>" data-id="<?echo $value->id;?>" value="<? echo htmlspecialchars($value->qty); ?>"></td>
                                                  <td class="totalp" id="t_c_<?echo $value->id;?>"><? echo (int)$value->detail->sale_price*(int)$value->qty; ?></td>
                                                  <td>                                                                                           
                                                    <a href="javascript:del_item('<?echo $value->id;?>');" class="btn btn-danger btn-xs"><i class="icon-remove icon-white"></i></a>                                                    
                                                  </td>
                                              </tr>
                                             <?
                                            }
                                            ?>            
                                            <tr>
                                              <td></td>
                                              <td></td>
                                              <td>Total</td>
                                              <td id="all_total"><?=$all_total?></td>
                                              <td></td>
                                            </tr>                                                             
                                        </tbody>
                                    </table>
                                    <div class="span12 no-margin-left">
                                    <?
                                    if (count($address_list)>0) {
                                    ?>
                                    <form id="sub_form" method="post" action="<? echo site_url('member/make_order')?>">
                                      <div class="control-group">
                                                  <label class="control-label" for="focusedInput">ที่อยู่ในการจัดส่ง</label>
                                                  <div class="controls">
                                                    <select class="focused chzn-select" id="province" type="text" name="province">
                                                     <?
                                                     foreach ($address_list as $key => $value) {
                                                       ?>
                                                       <option value="<?=htmlspecialchars($value->address." ".$value->province." ".$value->zip_code)?>">
                                                         <?=htmlspecialchars($value->address." ".$value->province." ".$value->zip_code)?>
                                                       </option>
                                                       <?
                                                     }
                                                     ?>
                                                    </select>
                                                    
                                                  </div>
                                                </div> 
                                      </form>                
                                      <a href="javascript:submit_form();"><button class="btn btn-success">สั่งซื้อ </button></a>
                                      <?
                                    }else{
                                    ?>
                                    <font style="color:red">คุณยังไม่ได้เพิ่ม ที่อยู่ในการจัดส่ง กรุณาเพิ่มที่อยู่ในการจัดส่ง</font>
                                    <a href="<? echo site_url('member/address_add')?>"><button class="btn btn-success">เพิ่มที่อยู่ <i class="icon-plus icon-white"></i></button></a>                             
                                    <?
                                   }
                                   ?>
                                    </div>
                                    <div class="span12 no-margin-left" style="height:400px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/.fluid-container-->
        <script type="text/javascript">
        function submit_form(){
          var f_form=document.getElementById('sub_form');
          f_form.submit();
        }
         function del_item(id){
          $.ajax({
              method: "POST",
              url:'<?=site_url("member/delitem_cart")?>',
              async :true,
              data: {
                  "item_id":id,
              }
          })
          .done(function(data) {
              if (data['flag']=="OK") {
                $("#d_c_"+id).fadeOut(1000,function(){
                      $(this).remove();
                    });
              }else{
                alert(data['flag']);
              }
              
           });
        }
        $(document).on('change', ".qty", function(){
          var cur_ele=$(this);
          $.ajax({
              method: "POST",
              url:'<?=site_url("member/update_qty")?>',
              async :true,
              data: {
                  "item_id":cur_ele.attr("data-id"),
                  "qty":cur_ele.val(),
              }
          })
          .done(function(data) {
              if (data['flag']=="OK") {
                t_price=parseInt(cur_ele.val())*parseInt(cur_ele.attr("data-price"));
                $("#t_c_"+cur_ele.attr("data-id")).html(t_price);
                sum_total();
              }else{
                alert(data['flag']);
              }
              
           });
        });
        function sum_total(){
          var num=$(".totalp").length;
          var total=0;
          for (var i = 0; i < num; i++) {
            total+=parseInt($(".totalp").eq(i).html());
          };
          $("#all_total").html(total);
        }
        $(function() {
          $(".chzn-select").chosen({
             width: "75%"
          });
        });
        </script>