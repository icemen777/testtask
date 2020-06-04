@extends('layout')

@section('title', 'Cart')


@section('sidebar')
    <h2>Your Cart</h2>
@endsection

@section('content')

    @php //dump($models) @endphp

    <!--
    ================================================== -->
    <section>
        @if (isset($models['products']))
            <table class="table  table-striped">
                <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Action</th>
                </thead>
                @foreach ($models['products'] as $key => $model)

                    @include('cart._view', ['model' => $model, 'key' => $key])

                @endforeach
                <tr>
                    <td>Summa</td>
                    <td>{{ $models['summa'] }} r.</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        @else
            <p>Your Cart is empty</p>
        @endif

    </section> <!-- end bricks -->

@endsection
