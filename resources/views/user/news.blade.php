@extends('user/app')
@section('main-content')
    
@foreach ($news as $new)
  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
                <span class="section-heading-upper"><b>NAUJIENA!</b></span>
              <span class="section-heading-lower">{{ $new->news_name }}</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ Storage::url($new->news_photo) }}" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">{{ $new->news_text }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforeach
@endsection