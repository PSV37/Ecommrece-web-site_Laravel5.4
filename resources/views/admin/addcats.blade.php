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
    var cat_name = $("#cat_name").val();
    var token = $("#token").val();
    //alert(cat_id);
    $.ajax({
      type: "post",
      data: "cat_name=" + cat_name + "&_token=" + token ,
      url: "<?php echo url('/admin/saveCategory') ?>",
      success:function(data){
        $("#msg").html("Category has been Created");
        $("#msg").fadeOut(2000);
       //console.log(data);
      }
    });
  });
  var auto_refresh = setInterval(
    function(){
      $('#category').load('<?php echo url('admin/cats');?>').fadeIn("slow");
    },100);
});
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">

                            <div class="content">
                            <h2>Add Category</h2>
                            <p id="msg" class="alert alert-success"></p>

                          <input type="hidden" value="{{csrf_token()}}" id="token"/>

                       <!-- <label>Categories</label>
                       
                       <select id="cat_id" class="form-control">
                         <option value="">please select a category</option>
                         <option value="cat">Cat</option>
                         <option value="dog">Dog</option>
                       
                       </select> -->
                          <br>
                              <label>Category Name</label>
                              <input type="text" id="cat_name" class="form-control"/>
                              <br>

                                <input type="submit" class="btn btn-success btn-fill" value="Create" id="btn"/>


                              <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                          <table  class="table table-hover table-striped" >
                            <tr >
                          <td colspan="5" align="right"><b>Total: {{App\Cat::count()}}</b></td>
                            </tr>
                            <tr style="border-bottom:1px solid #ccc;">
                              <th style="padding:10px">Category Name</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                          </table>
                            <div class="content"
                             style="height:400px; overflow-y:scroll">

                                <div id="category">
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