@extends('admin.master')
@section('title', 'Admin')

@section('content')
<script>
$(document).ready(function(){
  $("#msg").hide();
  //alert("working");
  $("#btn").click(function(){
    $("#msg").show();
    //var cat_id = $("#cat_id").val()
    var pro_name = $("#pro_name").val();
    var pro_code = $("#pro_code").val();
    var pro_price = $("#pro_price").val();
    var cat_id = $("#cat_id").val();
    var pro_info = $("#pro_info").val();
    var token = $("#token").val();
    //alert(cat_id);
    $.ajax({
      type: "post",
      data: "pro_name=" + pro_name + "&pro_code=" + pro_code + "&pro_price=" + pro_price + "&_token=" + token + "&pro_info=" + pro_info + "&cat_id="+ cat_id,
      url: "<?php echo url('/admin/saveProduct') ?>",
      success:function(data){
        $("#msg").html("Product has been inserted");
        $("#msg").fadeOut(2000);
       //console.log(data);
      }
    });
  });
  var auto_refresh = setInterval(
    function(){
      $('#products').load('<?php echo url('admin/products');?>').fadeIn("slow");
    },100);
});
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="content">
                            <h2>Add Product</h2>
                            <p id="msg" class="alert alert-success"></p>

                          <input type="hidden" value="{{csrf_token()}}" id="token"/>

                             <label>Categories</label>                    
                                <select id="cat_id" class="form-control">
                                    <option value="">please select a category</option>
                                    @foreach(App\Cat::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                   @endforeach
                                </select> 
                          <br>
                              <label>Product Name</label>
                              <input type="text" id="pro_name" class="form-control"/>
                              <br>

                              <label>Product Code</label>
                              <input type="text" id="pro_code" class="form-control"/>
                              <br>

                              <label>Product Price</label>
                              <input type="text" id="pro_price" class="form-control"/>
                              <br>

                              <label>Product Info</label>
                              <textarea id="pro_info" class="form-control" placeholder="Write About Product...." rows="5" style=" height: 92px;width: 101%;"></textarea><br>

                                <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>


                              <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                          <table  class="table table-hover table-striped" >
                            <tr >
                          <td colspan="6" align="right"><b>Total: {{App\Product::count()}}</b></td>
                            </tr>
                            <tr style="border-bottom:1px solid #ccc;">
                              <th style="padding:10px">Product Name</th>
                              <th style="padding:10px">Product Code</th>
                              <th style="padding:10px">Price</th>
                                <th style="padding:10px">Catgeory</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                          </table>
                            <div class="content"
                             style="height:400px; overflow-y:scroll">

                                <div id="products">
                                  <img src="{{url('img/load.gif')}}"
                                  style="width:50%; text-align:center;height: 250px">
                                </div>

                                <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


@endsection