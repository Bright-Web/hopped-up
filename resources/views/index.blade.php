@extends('layouts.app')

@section('content')
    <div class="hero">
      <div class="hero__wrapper page-container">
        <svg id="hero-arc" data-name="hero-arc" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1034.43 1074.05"><defs><clipPath id="clip-path" transform="translate(19 8.3)"><rect x="1" y="1" width="1016" height="1065" style="fill:none"/></clipPath></defs><g style="clip-path:url(#clip-path)"><path d="M.29-8.3-19,1064.45s400.87,16.31,682.5-66.27C1133,849.9,1094.63,232.24,772.34-.49,772.37-.5.29-8.3.29-8.3Z" transform="translate(19 8.3)" style="fill:#feb24f"/></g></svg>
        <img class="hero__beer" src="@asset('images/armbeer.png')">
        <div class="hero__content">
          <h1 class="hero__main-title">Expertly Crafted</h1>
          <h2 class="hero__sub-title">Home Brew Recipes</h2>
          <a class="button" href="http://localhost:3000/hopped-up/the-brews/">View Brews</a>
        </div>
        <div class="hero__image">
        </div>
      </div>
    </div>
    <div class="welcome">
      <div class="welcome__wrapper page-container section-padding">
        <div class="welcome__left">
          <svg id="welcome-img-bg" data-name="welcome-img-bg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 654.81 665.07"><path id="Path_6" data-name="Path 6" d="M833.68,298c246.3-142.15,331.85-89.3,415.28,44.19s68,326-113.14,439.23S788,923.36,704.55,789.87,587.39,440.18,833.68,298Z" transform="translate(-642.78 -213.63)" style="fill:#feb24f"/></svg>
          <img class="welcome__image" src="@asset('images/beer-tray.jpg')">
        </div>
        <div class="welcome__right">
          <div class="welcome__content">
            <h2 class="welcome__title">@php echo get_theme_mod('intro_section_title') @endphp</h2>
            <p class="welcome__lead lead-text">@php echo get_theme_mod('intro_section_lead') @endphp</p>
          </div>
        </div>
      </div>
    </div>
    <div class="new-brews">
      <div class="new-brews__wrapper page-container section-padding">
        <div class="new-brews__heading">
          <h2 class="brews__title">@php echo get_theme_mod('brews_section_title') @endphp</h2>
          <p class="brews__lead lead-text">@php echo get_theme_mod('brews_section_lead') @endphp</p>
        </div>
        <div class="new-brews__grid">
          @php
            $args = array(
              'post_type'=>'brews',
              'order'=>'ASC',
              'posts_per_page'=>3   //no of post -1 for no limit
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
          @endphp

          @component('components.brew-item')
            @slot('author')
              @php echo get_the_author() @endphp
            @endslot
            @slot('meta')
              @php echo get_the_date()@endphp
            @endslot
            @slot('brewType')
              @php echo get_field('type') @endphp
            @endslot
            @slot('title')
              @php the_title() @endphp
            @endslot
            @slot('image')
              @php echo get_field('image') @endphp
            @endslot
            @slot('link')
            @php echo get_permalink() @endphp
            @endslot
          @endcomponent
          @php
          endwhile;
          wp_reset_query()
          @endphp
        </div>

        </div>
      </div>

    </div>
    <div class="new-articles ">
    <div class="new-articles__wrapper page-container section-padding">
      <div class="new-articles__heading">
        <h2 class="new-articles__title">@php echo get_theme_mod('articles_section_title') @endphp</h2>
        <p class="new-articles__lead lead-text">@php echo get_theme_mod('articles_section_lead') @endphp</p>
      </div>
      <div class="new-articles__list">

          @php
            $args = array(
              'post_type'=>'post',
              'order'=>'ASC',
              'posts_per_page'=>3   //no of post -1 for no limit
            );
            query_posts($args);
            while ( have_posts() ) : the_post();
          @endphp

          @component('components.article-item')
            @slot('title')
              @php the_title() @endphp
            @endslot
            @slot('image')
              @php echo get_the_post_thumbnail_url() @endphp
            @endslot
            @slot('date')
            @php echo get_the_date()@endphp
            @endslot
            @slot('desc')
            @php echo get_the_excerpt()@endphp
            @endslot
            @slot('link')
            @php echo get_permalink() @endphp
            @endslot
          @endcomponent
          @php
          endwhile;
          wp_reset_query()
          @endphp

      </div>
    </div>


@endsection
