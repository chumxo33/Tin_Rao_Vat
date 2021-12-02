@extends('layouts.app')
{{-- Hiển thị danh sách các bài viết --}}
@section('content')
<div>
    <form action=" {{ route('homePage') }}" method="GET">
        {{-- Có các filter theo chuyên mục, khu vực --}}
            <category-selector></category-selector>
            {{-- Hiển thị khu vực tành phố --}}
            <location-selector></location-selector>
        <button type="submit">Loc</button>
    </form>
    {{-- Hiển thị các tin đăng mới nhất đến cũ nhất --}}
    @foreach ($articles as $article )
        <div>
            <h3>{{ $article->title }} 
                {{-- Hiển thị tin đăng vip --}}
                @if($article->is_vip)
                    <span style="color:red">VIP</span>
                @endif
                <br>
                {{ $article->content }}
            </h3>
        </div>
    @endforeach
</div>
@endsection