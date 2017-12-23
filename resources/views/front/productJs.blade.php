<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script >
$(document).ready(function(){
	//get cat id
	@foreach(App\Cat::all() as $catList)
    $('#cat{{$catList->id}}').on('click',function(){
    	var cat_id = $('#cat{{$catList->id}}').val();
    	//alert(cat_id);
    	$.ajax({
    		type :'GET',
    		dataType : 'html',
    		url : "{{url('ProductDisplay')}}",
    		data : {'cat_id':cat_id},

    		success:function(response){
             // console.log(response);
             $('#productsData').html(response);
    		}
    	})
    })

	@endforeach
})	

</script>