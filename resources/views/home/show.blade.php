@extends('home.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('website_assets/css/jquery.fancybox.css') }}">
@endsection

@section('content')
    <div class="absolute shadow pin-l mt-12 w-24 bg-grey-lighter h-auto pt-4 pb-4 md:rounded-r-xl px-0">
        @foreach ($colors as $col)
            <a href="{{ route('website.show', ['car' => $car, 'color' => $col, 'varian' => $variant]) }}">
                <div
                    class="shadow-md mx-auto {{ !$loop->last ? 'mb-3' : '' }} {{ $col == 'grey' ? 'bg-' . $col . '-1' : 'bg-' . $col }} w-16 h-16 rounded-full {{ $col == $color ? 'border-4 border-red-dark' : '' }}">
                </div>
            </a>
        @endforeach
    </div>
    <div class="absolute shadow pin-r mt-12 w-32 bg-black-1 h-auto pt-4 pb-4 rounded-l-1 px-0">
        @foreach ($variants as $var)
            <a href="{{ route('website.show', ['car' => $car, 'color' => $color, 'varian' => $var]) }}"
                class="text-center no-underline">
                <div
                    class="shadow-md mx-auto {{ !$loop->last ? 'mb-3' : '' }} w-24 h-10 rounded-full font-bold text-sm pt-3 {{ $var == $variant ? 'bg-red-dark text-white' : 'bg-grey-lightest text-black' }}">
                    {{ ucfirst($var) }}
                    {{-- {{ str()->headline($var) }} --}}
                </div>
            </a>
        @endforeach
        @foreach ($extra_images as $extra)
            @if ($loop->first)
                <a data-fancybox="extra_img" data-caption="{{ $extra['title'] }}" data-thumb="{{ $extra['src'] }}"
                    href="{{ $extra['src'] }}" class="text-center no-underline cursor-pointer">
                    <div
                        class="shadow-md mx-auto mt-3 w-24 h-10 rounded-full font-bold text-sm pt-3 bg-grey-lightest text-black focus:outline-none">
                        Extra</div>
                </a>
            @else
                <a data-fancybox="extra_img" data-caption="{{ $extra['title'] }}" data-thumb="{{ $extra['src'] }}"
                    href="{{ $extra['src'] }}" style="display:none"></a>
            @endif
        @endforeach
    </div>
    <div class="threesixty-wrapper">
        <div class="threesixty"
            data-path="{{ asset('website_assets/images/cars/' . $car . '/' . $color . '/' . $variant . '/{index}.jpg') }}"
            data-count="24">
            <div id="loader">
                <img src="{{ asset('website_assets/images/raw_logo.png') }}" class="mx-auto mitsubishi">
            </div>
        </div>
    </div>
    @if (count($variants_detail[$variant]) > 0)
        <div class="absolute pin-r pin-b w-48" id="infoBlock">
            <div class="bg-black-1 rounded-tl-lg text-white text-center py-2 px-4 font-bold">
                {{ $variants_price[$variant] }}</div>
            <div class="bg-black text-white mx-auto shadow px-2 py-2" id="listInfo">
                <ul class="list-reset text-center">
                    @foreach ($variants_detail[$variant] as $v_detail)
                        <li class="text-sm py-1">{{ $v_detail }}</li>
                    @endforeach
                </ul>
            </div>
            <button class="text-sm w-full bg-red-dark text-white py-2 px-4 md:rounded-bl-lg focus:outline-none font-bold"
                id="toggleInfo">Hide</button>
        </div>
    @endif
    <a href="{{ route('website.show', [$car_switch['url'], $car_switch['color']]) }}" class="no-underline text-white">
        <div class="absolute pin-t pin-r text-white mt-5 mr-5" id="switchBlock">
            Switch to <strong>{{ $car_switch['text'] }}</strong>
        </div>
    </a>
    <div class="-mt-12"></div>
@endsection

@section('script')
    <script src="{{ asset('website_assets/js/jquery.threesixty.js') }}"></script>
    <script src="{{ asset('website_assets/js/jquery.fancybox.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-fancybox="extra_img"]').fancybox({
                transitionEffect: "zoom-in-out",
                buttons: [
                    "close"
                ],
                thumbs: {
                    autoStart: true,
                    axis: "x"
                },
                arrows: false,
                infobar: false,
                afterLoad: function(instance, slide) {
                    $('.fancybox-thumbs-x').prev().css({
                        "right": "0",
                        "bottom": "95px"
                    });
                }
            });

            var $threeSixty = $('.threesixty');

            $threeSixty.threeSixty({
                dragDirection: 'horizontal',
                draggable: true,
                buffer: 30,
                useKeys: true
            });

            // $('#loader').bind('destroyed', function() {
            //   $('#infoBlock').show();
            //   $('#switchBlock').show();
            //
            //   for (var i = 0; i < 21; i++) {
            //     $threeSixty.prevFrame();
            //   }
            //
            //   setTimeout(function() {
            //     var e = jQuery.Event("keydown");
            //     e.which = 39;
            //     e.keyCode = 39;
            //     $(".threesixty-wrapper").trigger(e);
            //   }, 1);
            // });

            $("#toggleInfo").click(function() {
                var text = $('#toggleInfo').text();

                if (text == 'Show') {
                    $('#toggleInfo').text('Hide');
                }

                $("#listInfo").slideToggle("slow", function() {
                    if (text == 'Hide') {
                        $('#toggleInfo').text('Show');
                    }
                });
            });
        });
    </script>
@endsection
