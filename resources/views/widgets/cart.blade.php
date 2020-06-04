<div class="alert alert-primary" id="basketblock">
    <div class="row">
        @if (isset($model['summa']))
            <div class="col">
                <h3>Cart</h3>
                <p>Summa:{{ $model['summa'] }}</p>
            </div>
            <div class="col">
                <p><a href="{{ route('ClearCart') }}" class="badge badge-primary">Clear Your Cart</a></p>
                <p><a href="{{ route('home') }}" class="badge badge-success" style="font-size: 120%;">Make Order</a></p>
            </div>
        @else

            <h3>Cart&nbsp;</h3>
            <div>
                <span>&nbsp;</span>cart<br>is empty
            </div>

        @endif
    </div>
</div>
