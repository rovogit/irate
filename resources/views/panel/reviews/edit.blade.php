<?php

/**
 * @var Review $review
 */

use App\Models\Review;
?>
@extends('layouts.panel')

@section('title')Отзыв: {{ $review->product->title }}@endsection
@section('description')Отзыв: {{ $review->product->title }}@endsection

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Отзыв о {{ $review->product->title }}</h3>
            </div>
        </div>
    </div>

    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-3 col-lg-4">
                <div class="card card-bordered product-card">
                    <div class="product-thumb">
                        <a href="{{ route('panel.products.edit', $review->product) }}">
                            <img class="card-img-top" src="{{ $review->product->img }}" alt="">
                        </a>
                    </div>
                    <div class="card-inner text-center">
                        <ul class="product-tags">
                            <li>{{ $review->product->category->title }}</li>
                        </ul>
                        <h5 class="product-title"><a href="{{ route('panel.products.edit', $review->product) }}">{{ $review->product->title }}</a></h5>
                        <div class="product-rating justify-content-center">
                            <ul class="rating">
                                @foreach($stars = range(1,5) as $star)
                                    @if($review->product->rating >= $star)
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                    @elseif($review->product->rating >= ($star - 0.5))
                                        <li><em class="icon ni ni-star-half-fill"></em></li>
                                    @elseif($review->product->rating >= ($star - 0.9))
                                        <li><em class="icon ni ni-star-half"></em></li>
                                    @else
                                        <li><em class="icon ni ni-star text-soft"></em></li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="amount">
                                {{ $review->product->rating }}
                                ({{ $review->product->reviews_count }}
                                {{ trans_choice('dic.review', $review->product->reviews_count) }})
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="fw-bold text-secondary">Оценка</div>
                        <div class="product-rating">
                            <ul class="rating">
                                @foreach($stars as $star)
                                    @if($review->rating >= $star)
                                        <li><em class="icon ni ni-star-fill"></em></li>
                                    @else
                                        <li><em class="icon ni ni-star"></em></li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="amount">({{ $review->rating }})</div>
                        </div>
                        <div class="fw-bold text-secondary">Описание</div>
                        <div>{!! $review->body !!}</div>
                    </div>
                </div>

                <form class="card card-bordered crutch-validate is-alter" action="{{ route('panel.reviews.update', $review) }}">
                    <div class="card-inner">
                        <div class="row g-gs">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="rubric_id">Статаус</label>
                                    <div class="form-control-wrap" id="activity">
                                        <select class="form-control form-select select2-hidden-accessible" name="activity" data-placeholder="Выбрать" required data-msg="Выберите Статус">
                                            <option label="empty" value=""></option>
                                            @foreach(\App\Models\Review::statusList() as $key => $status)
                                                <option value="{{ $key }}"{{ $key === $review->activity ? ' selected': '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 align-self-end">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="review-destroy" class="card card-bordered" action="{{ route('panel.reviews.destroy', $review) }}" method="post">
                    <div class="card-inner">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-danger">Удалить отзыв</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@push('script')
<script>
  (function () {
    $('#review-destroy').on('submit', function (e) {
      e.preventDefault();

      Swal.fire({
        title: 'Удалить отзыв?',
        text: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f54ff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Да. Удалить!',
        cancelButtonText: 'Отмена',
        showLoaderOnConfirm: true,
        preConfirm: function () {
          return $.post('{{ route('panel.reviews.destroy', $review) }}', {}, null, 'json')
            .then(function (json) {
              location.assign(json.redirect || '/');
            }).catch(function (err) {
              Swal.showValidationMessage(err['responseJSON']['error'] || 'Forbidden!');
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
      });
    });

  })();
</script>
@endpush
