
@php  
$banner = App\Models\Banner::orderBy('title', 'ASC')->get();
@endphp

<!--Start banners-->
<section class="banners mb-25">
    <div class="container">
        <div class="row">
            @foreach ( $banner as $item )
            @if ($item->side_banner == NULL)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ asset($item->image) }}" alt="plancher de qualité" style="width:480px; height:320px;"/>
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
<!--End banners-->