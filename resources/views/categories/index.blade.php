<?php
/**
 * @var \App\Models\Category[] $categories
 */
?>
@extends('layouts.app', ['h' => 'header2'])

@section('title', 'Все отзывы о компаниях, услугах, товарах и фильмах | iRate')
@section('description', 'Читайте свежие отзывы реальных людей на портале iRate. Оставьте отзыв о личном опыте.')

@section('content')
<!-- Breadcrumb Area-->
<div class="breadcrumb--area bg-img bg-overlay--gray jarallax" style="background-image: url('/img/custom-img/categories.jpg');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb-title">{{ __('Reviews') }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('All categories') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reviews Area-->
<section class="reviews-area section-padding-120">
    <div class="container">
        <ul id="nav_accordion" class="nav flex-column">
            @foreach($categories as $category)
            <li class="accordion-item">
                <a class="accordion-button collapsed"
                    data-toggle="collapse"
                    data-target="#menu-item-{{ $category->id }}"
                    href="#">{{ $category->title }}<i class="bi small bi-caret-down-fill"></i>
                </a>
                <ul id="menu-item-{{ $category->id }}" class="submenu collapse">
                    @foreach($category->children as $child)
                    <li>
                        <a class="nav-link" href="{{ route('reviews.product', ['category1' => $category->slug, 'category2' => $child->slug]) }}">
                            {{ $child->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- Features Area-->
<div class="saasbox-tab-area section-padding-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="section-heading text-center"><i class="lni-crown"></i>
                    <h2>{{ __('Actual now') }}</h2>
                    <h3>{{ __('Find interesting places nearby') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab--area">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">{{ __('Restaurants') }}</a></li>
                        <li class="nav-item"><a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">{{ __('Taxi') }}</a></li>
                        <li class="nav-item"><a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">{{ __('Entertainment') }}</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab Pane-->
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-md-6 col-xxl-5">
                                    <div class="tab--text mt-5">
                                        <h6>{{ __('Restaurants') }}</h6>
                                        <h2>Субботица Садовая</h2>
                                        <p>Название придумано специально для нового заведения: почти на границе Сербии и Венгрии есть такой город, но у него только одно «б»; второе добавили, чтобы было похоже на русское слово «суббота». В ресторане 66 посадочных мест, из них 18 — в отдельном зале, где, как правило, весело отмечают что-то большие балканские мужчины.</p>
                                        <span class="d-block mt-4 mb-1">{{ __('Satisfied clients') }}: 90%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="tab-thumb mt-5"><img src="/img/custom-img/Subbotitsa.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Pane-->
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-md-6 col-xxl-5">
                                    <div class="tab--text mt-5">
                                        <h6>{{ __('Taxi') }}</h6>
                                        <h2>ТаксиЛэнд</h2>
                                        <p>Служба заказов такси «Такси Лэнд» обеспечивает население города Москвы и Подмосковья по недорогим и разумным ценам услугами качественных пассажирских перевозок. Такси в нашей компании можно заказать круглосуточно и заранее оставить заказ на подачу машины с гарантией исполнения.</p>
                                        <span class="d-block mt-4 mb-1">{{ __('Satisfied clients') }}: 90%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="tab-thumb mt-5"><img src="/img/custom-img/Taksilend.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Pane-->
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-md-6 col-xxl-5">
                                    <div class="tab--text mt-5">
                                        <h6>{{ __('Entertainment') }}</h6>
                                        <h2>Леонид Агутин</h2>
                                        <p>Леонид Агутин на отечественной эстраде — фигура, без сомнений, позитивная. Автор и исполнитель многих собственных песен, Агутин всегда отличался интимной, непафосной любовной лирикой, приятными латиноамериканскими ритмами в аранжировках, а также умением обходиться без фонограммы на живых выступлениях и телеэфирах.</p>
                                        <span class="d-block mt-4 mb-1">{{ __('Satisfied clients') }}: 90%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="tab-thumb mt-5"><img src="img/custom-img/Leonid.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
