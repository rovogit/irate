<?php
/**
 * @var Article[] $articles
 */
use App\Models\Article;

?>
@extends('layouts.panel')

@section('title')Статьи@endsection
@section('description')Статьи@endsection

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Статьи</h3>
                <div class="nk-block-des text-soft">
                    <p>Всего {{ $articles->total() }} {{ trans_choice('dic.articles', $articles->total()) }}</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right"><em class="icon ni ni-search"></em></div>
                                    <input
                                            class="form-control panel-search"
                                            data-search-target="#search-articles"
                                            data-search-url="{{ route('panel.search.articles') }}"
                                            type="text"
                                            placeholder="Поиск"
                                    >
                                </div>
                            </li>
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('panel.blog.articles.create') }}" class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em><span>Добавить статью</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="search-articles">

        @include('panel.blog.articles.table', compact('articles'))

        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="g">
                    {{ $articles->onEachSide(2)->links('panel.partials.paginate') }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="/js/panel/search.js"></script>
@endpush
