<article @php post_class() @endphp>
  <div class="article page-container post-padding">
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
    @include('partials/entry-meta')

  <div class="entry-content">
    @php $image = get_the_post_thumbnail_url() @endphp
    <img class="article__image" src="{{ $image }}">
        @php the_content() @endphp
  </div>
  @php comments_template('/partials/comments.blade.php') @endphp
</div>
</article>
