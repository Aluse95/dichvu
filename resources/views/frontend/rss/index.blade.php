@extends('frontend.layouts.default')

@php
    $menus = App\Models\Menu::all();
    $main_menu = $menus->first(function ($item, $key) {
        return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
    });
@endphp

<style>
    .wrap-img {
        fill: #fff;
        padding: 2px;
        width: 20px;
        height: 20px;
        margin-top: -3px;
        margin-left: 10px;
        border-radius: 1px;
        background-color: #ee802f;
    }
    li {
        border-bottom: 1px solid #ddd;
    }
</style>

<div class="container px-5">
    <h2 class="title-page mt-5">RSS</h2>
    <strong>Khái niệm RSS</strong>
    <p class="mt-3">RSS ( viết tắt từ Really Simple Syndication ) là một tiêu chuẩn định dạng tài liệu dựa trên XML 
        nhằm giúp người sử dụng dễ dàng cập nhật và tra cứu thông tin một cách nhanh chóng và thuận tiện 
        nhất bằng cách tóm lược thông tin vào trong một đoạn dữ liệu ngắn gọn, hợp chuẩn.
    </p>
    <p>
        Dữ liệu này được các chương trình đọc tin chuyên biệt ( gọi là News reader) phân tích và hiển thị 
        trên máy tính của người sử dụng. Trên trình đọc tin này, người sử dụng có thể thấy những tin chính 
        mới nhất, tiêu đề, tóm tắt và cả đường link để xem toàn bộ tin.
    </p>
    <strong>Kênh do Dichvuthietkewebsite cung cấp</strong>

    <div class="row">
        <div class="col-6">
            <ul class="list-unstyled mt-4">
                <li>
                    <a class="d-flex justify-content-between" href="{{ route('frontend.rss.detail', ['alias'=> 'tin-moi-nhat.rss']) }}">
                        Tin mới nhất
                        <span class="d-flex">
                            RSS
                            <div class="wrap-img">
                                <img class="img-fluid" src="{{ asset('themes/frontend/f4web/images/rss.png')}}" alt="">
                            </div>
                        </span>
                    </a>
                </li>
                <li class="mt-3">
                    <a class="d-flex justify-content-between" href="{{ route('frontend.rss.detail', ['alias'=> 'tin-xem-nhieu.rss']) }}">
                        Tin xem nhiều
                        <span class="d-flex">
                            RSS
                            <div class="wrap-img">
                                <img class="img-fluid" src="{{ asset('themes/frontend/f4web/images/rss.png')}}" alt="">
                            </div>
                        </span>
                    </a>
                </li>
                @isset($menus)
                    @foreach ($menus as $item)
                        @if ($item->parent_id == $main_menu->id)
                            <li class="mt-3">
                                <a class="d-flex justify-content-between" href="{{ route('frontend.rss.detail', ['alias'=> $item->url_link.'.rss']) }}">
                                    {{ $item->name}}
                                    <span class="d-flex">
                                        RSS
                                        <div class="wrap-img">
                                            <img class="img-fluid" src="{{ asset('themes/frontend/f4web/images/rss.png')}}" alt="">
                                        </div>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>

</div>


