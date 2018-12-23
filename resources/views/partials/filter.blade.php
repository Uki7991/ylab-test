<div class="col-12 mb-4">
    <a class="text-dark mx-2" href="{{ route('home', ['sort' => !$sort, 'field' => 'id']) }}">Id <img src="{{ $field === 'id' ? $sort ? asset('images/sort_desc.png') : asset('images/sort_asc.png') : asset('images/sort_both.png') }}" alt=""></a>
    <a class="text-dark mx-2" href="{{ route('home', ['sort' => !$sort, 'field' => 'name']) }}">Name <img src="{{ $field === 'name' ? $sort ? asset('images/sort_desc.png') : asset('images/sort_asc.png') : asset('images/sort_both.png') }}" alt=""></a>
    <a class="text-dark mx-2" href="{{ route('home', ['sort' => !$sort, 'field' => 'status_id']) }}">Status <img src="{{ $field === 'status_id' ? $sort ? asset('images/sort_desc.png') : asset('images/sort_asc.png') : asset('images/sort_both.png') }}" alt=""></a>
</div>