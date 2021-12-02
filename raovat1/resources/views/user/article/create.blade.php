@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {{-- Muốn upload thì cái form phải có enctype="multipart/form-data" --}}
<form action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST" > 
    @csrf
        <div class="form-group">
            <label for="title">Title:</label>   
            <input type="text" class="form-control" name="title">
        </div>
        {{--Chèn Components CategorySelector.vue --}}
        <category-selector></category-selector>
        {{-- Tin đăng Vip --}}
        <div>
            <label for="vip">{{ __('Loai Tin') }}</label>
            <br />
            <select name="is_vip" id="">
                <option value="0">Thuong</option>
                <option value="1">Vip</option>
            </select>
        </div>
        <br>
        {{--Chèn Components LocationSelector.vue --}}
        <location-selector></location-selector>
        <div class="form-group">
            <label for="title">Valid date:</label>   
            {{-- Lấy ra thời điểm hiện tại + với 1 ngày -> rồi sao đó lấy cái ngày --}}
            <input type="date" class="form-control" name="valid_date" min="{{ \Carbon\Carbon::now()->addDay(1)->toDateString()}}">
        </div>
         <br>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" class="form-control" rows="20"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
@endsection
