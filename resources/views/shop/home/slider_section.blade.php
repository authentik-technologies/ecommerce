<!--Start hero slider-->

@php  
    $slider = App\Models\Slider::orderBy('title', 'ASC')->get();
    $banner = App\Models\Banner::where('side_banner', 'on')->get();
@endphp

<section class="home-slider style-2 position-relative mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach ($slider as $item )
                        <div class="single-hero-slider single-animation-wrap" style="background-image:  url({{ asset($item->image) }})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40" style="color:rgb(255, 255, 255)">
                                    {{ $item->title }}
                                </h1>
                                <p class="mb-65" style="color:rgb(255, 255, 255)">{{ $item->short_title }}</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            @foreach ($banner as $item )
                @if ($item->side_banner == 'on')
                <div class="col-lg-4 d-none d-xl-block">
                    <div class="banner-img img animated animated">
                        <img src="{{ asset($item->image) }}" alt="" style="height:538px; width: 100%; background"/>
                        <div class="banner-text" >
                            <h4 style="color:rgb(255, 255, 255)">
                                {{ $item->title }}
                            </h4>
                            <a href="{{ asset($item->url) }}" class="btn btn-xs">Voir plus <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                @else
                @endif
            @endforeach
        </div>
    </div>
</section>

<!--End hero slider-->