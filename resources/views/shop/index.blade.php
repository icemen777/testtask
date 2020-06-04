@extends('layout')

@section('title')
    {{ $title }}
@endsection



@section('header')

@endsection



@section('sidebar')

@endsection



@section('content')

    <div class="top_area mb-3 row">
        <div class="col-2">
            <form action="{{ route('products') }}" class="" method="get">
                <input type="hidden" name="sorting" value="title">
                <button type="submit" class="btn btn-success">Sort by title</button>
            </form>
        </div>
        <div class="col-2">
            <form action="{{ route('products') }}" class="" method="get">
                <input type="hidden" name="sorting" value="price">
                <button type="submit" class="btn btn-success">Sort by price</button>
            </form>
        </div>


    </div>

    @if (count($models))
        <table class="table">
            @php
                $line = $models[0]->toArray();
            @endphp
            <thead>
            <tr>
                @foreach ($line as $k => $n)
                    @if ($k == 'updated_at')
                        @continue
                    @endif
                    <th scope="col">
                        {{ $k }}
                    </th>
                @endforeach
                <th></th>
                <th></th>
            </tr>
            </thead>

            @foreach ($models as $model)

                @include('shop._view', ['model' => $model])

            @endforeach

        </table>

        @if( method_exists($models,'links') )
            <div class="justify-content-center row">
                <div class="col-5">
                    @if(isset($sorting))
                        {{ $models->appends(['sorting'=>$sorting])->links() }}
                    @else
                        {{ $models->links() }}
                    @endif
                </div>
            </div>
        @endif


    @else
        <h2>No data for display</h2>
    @endif

@endsection

@section('footer_js')
    <script src="{{ asset('js/add_item_to_cart.js') }}"></script>
@endsection