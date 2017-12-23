@foreach($data as $p)
       <div class="col-xs-6 col-sm-4">
         <div class="itemBox">
			<div class="prod">
				<img src="{{url('productimages')}}/{{$p->pro_img}}" alt=""  height="270px"/>
			</div>
			<label>{{$p->pro_name}}</label>
			<span class="hidden-xs">Code: {{$p->pro_code}}</span>
    <br>
  <span class="hidden-xs">{{$p->pro_info}}</span>
			<div class="addcart">
				<div class="price">Rs {{$p->pro_price}}</div>
				<div class="cartIco hidden-xs"><a href="/"><img src="{{asset('img/cart.png')}}"/> </a></div>
			</div>
		</div>
	</div>
@endforeach