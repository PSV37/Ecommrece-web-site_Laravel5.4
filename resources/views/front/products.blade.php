@extends('front.master')

@section('content')
@include('front.productJs')
<div class="greyBg">
    <div class="container">
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-12">
				<div class="breadcrumbs">
			        <ul>
			          <li><a href="#">Home</a></li>
			          <li><span class="dot">/</span> 
                     @if(count($data)=='0')
			          <b style="color: blue">{{$catuserby}}</b>
			          @else
			          <a href="{{url('products')}}/{{$catuserby}}">{{$catuserby}}</a>
			          @endif
			           </li>
			        </ul>
                </div>
                </div>
		    </div>
		    <h1 class="text-center">{{$catuserby}}</h1>
		    @if(count($data)=='0')

		    @else
		    <div class="row">
		    		<div class="col-xs-6 col-sm-3">
				    	<div class="nice-select">
							<span class="current">Shop Categories</span>
							<ul class="list">
								@foreach(App\Cat::all() as $catName)
							    <li class="option" value="{{$catName->id}}" id="cat{{$catName->id}}">{{$catName->cat_name}}</li>
							   @endforeach
							</ul>
						</div>
				    </div>
				    <div class="col-xs-6 col-sm-3">
						<select id="selectbox2">
						    <option value="">Price</option>
						    <option value="aye">Aye</option>
						    <option value="eh">Eh</option>
						    <option value="ooh">Ooh</option>
						    <option value="whoop">Whoop</option>
						</select>
				    </div>

				<div class="col-sm-6 hidden-xs">
					<div class="row">

						<div class="col-sm-4 pull-right">
							<select id="selectbox3">
							    <option value="">Sort By</option>
							    <option value="aye">Category</option>
							    <option value="eh">Products</option>
							</select>
						</div>
						<div class="styleNm">16 style(s)</div>
					</div>

				</div>
		    </div>
		    @endif
	    	<div class="row top25">
		      @if(count($data)=='0')
	            <div class="col-md-12 col-sm-offset-3" >
	       	      <h2>No Product Found Under <b style="color: red">{{$catuserby}}</b> Category</h2>
	            </div>
		      @else
		      <div id="productsData">
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
          </div>
          @endif
	    		<?php /*<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/2.jpg" alt="" /></div>
	    				<label>ADD GOLD</label>
	    				<span class="hidden-xs">Does stress keep you up at night?</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/3.jpg" alt="" /></div>
	    				<label>ADD GROWTH</label>
	    				<span class="hidden-xs">Worried about your kid’s overall well-being? </span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/4.jpg" alt="" /></div>
	    				<label>ADD IMMUNE</label>
	    				<span class="hidden-xs">Want to increase your immunity and keep your...</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/5.jpg" alt="" /></div>
	    				<label>ADD JOY</label>
	    				<span class="hidden-xs">Are you suffering from insomnia or anxiety?</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/6.jpg" alt="" /></div>
	    				<label>ADD HB (FOR FEMALE)</label>
	    				<span class="hidden-xs">Is your hemoglobin level is lower than normal?</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/1.jpg" alt="" /></div>
	    				<label>Add Energy</label>
	    				<span class="hidden-xs">Worried about your low immunity level?</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/2.jpg" alt="" /></div>
	    				<label>ADD GOLD</label>
	    				<span class="hidden-xs">Does stress keep you up at night?</span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod"><img src="{{Config::get('app.url')}}/theme/images/3.jpg" alt="" /></div>
	    				<label>ADD GROWTH</label>
	    				<span class="hidden-xs">Worried about your kid’s overall well-being? </span>
	    				<div class="addcart">
	    					<div class="price">Rs 900.00</div>
	    					<div class="cartIco hidden-xs"><a href="/"></a></div>
	    				</div>
	    			</div>
	    		</div> */?>
	    	</div>
		</div>
	</div>
</div>
@endsection
