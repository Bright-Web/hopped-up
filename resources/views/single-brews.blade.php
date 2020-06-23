@extends('layouts.app')

@section('content')
<div class="brew page-container post-padding">
  @while(have_posts()) @php the_post() @endphp

    <div class="brew__top-section">
      <div
        class="brew__image"
        style="
        background-image: url('<?php echo get_field('image') ?>');
        background-position: center;
        background-size: cover;">
      </div>
      <div class="brew__content">
        <div class="brew__heading">
          <h2>@php the_title(); @endphp</h2>
          <p class="brew__type">@php echo get_field('type') @endphp</p>
        </div>
        <p class="brew__desc">@php echo get_field('description') @endphp</p>
        <div class="brew__data">
          <p class="brew__ibu">IBU's: @php echo get_field('ibu') @endphp</p>
          <p class="brew__srm">SRM: @php echo get_field('srm') @endphp</p>
          <p class="brew__abv">ABV: @php echo get_field('abv') @endphp</p>
          <p class="brew__og">OG: @php echo get_field('og') @endphp</p>
          <p class="brew__fg">FG: @php echo get_field('fg') @endphp</p>
          <p class="brew__grain">Grain: @php echo get_field('grain') @endphp</p>
          <p class="brew__hops">Hops: @php echo get_field('hops') @endphp</p>
          <p class="brew__volume">Volume: @php echo get_field('volume') @endphp</p>
        </div>
      </div>
    </div>
    @php $ingredients = get_field('ingredients'); @endphp
    <div class="brew__bottom-section">
      <div class="brew__ingredients">
        <h4>Ingredients</h4>
        <h6>Fermentables:</h6>
        <p class="brew__fermentables">@php echo $ingredients['fermentables'] @endphp</p>
        <h6>Hops:</h6>
        <p class="brew__hops">@php echo $ingredients['hops'] @endphp</p>
        <h6>Yeast:</h6>
        <p class="brew__yeast">@php echo $ingredients['yeast'] @endphp</p>
      </div>
      <div class="brew__method">
        <h4>Method</h4>
        <p>Volume: @php echo get_field('method') @endphp</p>
      </div>
    </div>

  @endwhile
</div>
@endsection
