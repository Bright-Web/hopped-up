@extends('layouts.app')
  @section('content')
  <div class="new-articles page-container page-padding">
    <div class="the-brews__heading"><h2>Articles</h2></div>
    <div class="new-articles__list">
    @php
    $args = array(
      'post_type'=>'post',
      'order'=>'ASC',
      'posts_per_page'=>-1   //no of post -1 for no limit
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
