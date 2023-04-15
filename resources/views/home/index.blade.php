@extends('home.template')

@section('content')
    <div class="flex flex-wrap">
        <div class="w-full text-center sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
            <a href="{{ route('website.show', ['pajero', 'brown','original']) }}">
                <img src="{{ asset('website_assets/images/img1.jpg') }}">
            </a>
        </div>
        <div class="w-full text-center sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
            <a href="{{ route('website.show', ['xpander']) }}">
                <img src="{{ asset('website_assets/images/img2.jpg') }}">
            </a>
        </div>
    </div>
@endsection
