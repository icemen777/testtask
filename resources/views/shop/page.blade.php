<?php /** @var App\Product $model */ ?>
@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('js')
    <script src="{{ asset('js/buy_to_basket.js') }}" defer></script>
@endsection


@section('header')

    <div id="basketarea" style="margin-left: auto; margin-right: 50px;">
        @widget('basket')
    </div>

@endsection

@section('content')

    @php //dd($model); @endphp
    <!-- masonry
    ================================================== -->
    <section>

        <div><h2>{{ $model->title }}</h2></div>

        <div class="row">
            <div class="carousel-inner" style="background-color: #3d4852; width: 200px;">
                <div>
                    <img src="{{ $model->image }}" alt="slide" class="d-block" width="100%"/>
                </div>
            </div>
            <div class="col">
                <div class="description"><p>{{ $model->description }}</p></div>
            </div>
        </div>
        <div><h2>Price: {{ $model->price }}</h2></div>

            <div class="row">
                <div class="col-2">
                    <form action="{{ route('AddToCart') }}" method="post" class="add_cart_form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <button type="submit" class="btn btn-info">Add</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('DelInCart') }}" method="post" class="del_cart_form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <button type="submit" class="btn btn-danger">Del</button>
                    </form>
                </div>
            </div>

    </section> <!-- end bricks -->
    <hr/>
@endsection

@section('footer_js')
    <script src="{{ asset('js/add_item_to_cart.js') }}"></script>
@endsection