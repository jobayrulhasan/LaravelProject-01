<!-- ***** Chefs Area Starts ***** -->
<section class="section" id="chefs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Our Chefs</h6>
                    <h2>We offer the best ingredients for you</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($data2 as $item)
            <div class="col-lg-3">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <img src="chefimage/{{$item->image}}" style="width: 200px; height:200px">
                    </div>
                    <div class="down-content">
                        <h4>{{$item->name}}</h4>
                        <span>{{$item->speciality}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ***** Chefs Area Ends ***** -->