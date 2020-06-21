@extends('layouts.app')
  @section('content')
  <div class="the-brews page-container page-padding">
    <div class="the-brews__heading"><h2>The Brews</h2></div>
  <div class="the-brews__grid">
    @php
      $args = array(
        'post_type'=>'brews',
        'order'=>'ASC',
        'posts_per_page'=>-1   //no of post -1 for no limit
      );
      query_posts($args);
      while ( have_posts() ) : the_post();
    @endphp
      @component('components.brew-item')
        @slot('author')
          @php echo get_the_author() @endphp
        @endslot
        @slot('link')
        @php echo get_permalink() @endphp
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
      @endcomponent
    @php
      endwhile;
      wp_reset_query()
    @endphp
  </div>
  </div>

  @endsection
