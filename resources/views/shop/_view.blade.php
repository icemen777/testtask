<?php /** @var App\Product $model */ ?>
@php //dump($model); @endphp

<tr>
    @foreach ($model->toArray() as $key => $item)
        @if ($key == 'title')
            <td><a href="{{ route('productPage', [$model->id]) }}">{{ $model->title }}</a></td>
        @elseif ($key =='image')
            <td>image</td>
        @elseif ($key == 'created_at')
            <td>{{ $model->created_at->format('Y:M:d') }}</td>
        @elseif ($key == 'updated_at')
            @continue
        @else
            <td>{{ $item }}</td>
        @endif
    @endforeach
    <td>
        <form action="{{ route('AddToCart') }}" method="post" class="add_cart_form">
            @csrf
            <input type="hidden" name="id" value="{{ $model->id }}">
            <button type="submit" class="btn btn-info">Add
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                      style="display: none"></span>
                <span class="sr-only">Loading...</span>
            </button>
        </form>
    </td>
    <td>
        <form action="{{ route('DelInCart') }}" method="post" class="del_cart_form">
            @csrf
            <input type="hidden" name="id" value="{{ $model->id }}">
            <button type="submit" class="btn btn-danger">Del
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                      style="display: none"></span>
                <span class="sr-only">Loading...</span>
            </button>
        </form>
    </td>
</tr>