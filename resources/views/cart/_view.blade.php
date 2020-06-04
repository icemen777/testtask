<tr id="line-{{ $key }}">
    @foreach ($model as $item)
        <td>
            {{ $item ?? 'Default' }}
        </td>
    @endforeach
    <td>
        <form action="{{ route('AddToCart') }}" class="" method="get" style="display: inline">
            <input name="id" value="{{ $key }}" type="hidden">
            <button type="submit" class="btn btn-info">Add</button>
        </form>
    </td>

</tr>







