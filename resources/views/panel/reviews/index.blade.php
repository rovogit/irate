<?php

/**
 * @var Review[] $mod_reviews
 * @var Review[] $reviews
 */

use App\Models\Review;
?>
@extends('layouts.panel')

@section('title')Отзывы@endsection
@section('description')Отзывы@endsection

@section('content')
    @if($mod_reviews->isNotEmpty())
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Отзывы на модерации</h3>
                    <div class="nk-block-des text-soft">
                        <p>Всего {{ $mod_reviews->count() }} {{ trans_choice('dic.review', $mod_reviews->count()) }}</p>
                    </div>
                </div>
            </div>
        </div>
        @include('panel.reviews.table', ['reviews' => $mod_reviews])
    @endif

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Все отзывы</h3>
                <div class="nk-block-des text-soft">
                    <p>Всего {{ $reviews->total() }} {{ trans_choice('dic.review', $reviews->total()) }}</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right"><em class="icon ni ni-search"></em></div>
                                    <input
                                            class="form-control panel-search"
                                            data-search-target="#search-reviews"
                                            data-search-url="{{ route('panel.search.review') }}"
                                            type="text"
                                            placeholder="Поиск"
                                    >
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="search-reviews">
        @include('panel.reviews.table', ['reviews' => $reviews])
        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="g">
                    {{ $reviews->onEachSide(2)->links('panel.partials.paginate') }}
                </div>
            </div>
        </div>

    </div>

@endsection

@push('script')
    <script src="/js/panel/search.js"></script>
@endpush