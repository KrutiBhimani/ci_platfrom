<div class="col-lg-8 col-md-8 col-sm-12 col-12 p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" style='bottom:2%;'>
            @foreach ($banners as $banner)
                @php
                    $slide = $banner->sort_order - 1;
                @endphp
                @if ($banner->sort_order == 1)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $slide }}" class="active border-top-0 border-bottom-0"
                        aria-current="true" aria-label="Slide {{ $banner->sort_order }}"
                        style="border-radius:15px;width:8px;height: 8px;"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $slide }}" aria-label="Slide {{ $banner->sort_order }}"
                        class="border-top-0 border-bottom-0" style="border-radius:15px;width:8px;height: 8px;"></button>
                @endif
            @endforeach
        </div>
        <div class="carousel-inner height100per">
            @foreach ($banners as $banner)
                @if ($banner->sort_order == 1)
                    <div class="carousel-item height100per active">
                    @else
                        <div class="carousel-item height100per">
                @endif
                <img src="/storage/uplodes/{{ $banner->image }}" class="d-block w-100 h-100" alt="...">
                <div class="carousel-caption" style="text-align:start; bottom:10%">
                    <p class="Sed-ut-perspiciatis-unde-omnis-iste-natus-voluptatem mb-3">
                        {{ strip_tags($banner->title) }}</p>
                    <p class="Lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do m-0">{{ $banner->text }}</p>
                </div>
        </div>
        @endforeach
    </div>
</div>
</div>
