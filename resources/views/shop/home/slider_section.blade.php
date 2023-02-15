<!--Start hero slider-->

@php  
    $slider = App\Models\Slider::orderBy('title', 'ASC')->get();
    $banner = App\Models\Banner::where('side_banner', 'on')->get();
@endphp

<section class="home-slider position-relative mb-30">
    <div class="home-slide-cover">
        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
            @foreach ($slider as $item )
            <div class="single-hero-slider rectangle single-animation-wrap" style="background-image:  url({{ asset($item->image) }})">
                <div class="slider-content">
                    <h1 class="display-2 mb-40" style="color:rgb(255, 255, 255)">
                        {{ $item->title }}
                    </h1>
                    <p class="mb-65" style="color:rgb(255, 255, 255)">{{ $item->short_title }}</p>
                    <a href="{{ url('/boutique') }}" style="color:rgb(255, 255, 255)"><button class="btn" type="submit">Visionner nos produtis</button></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </div>
</section>

<!--End hero slider-->