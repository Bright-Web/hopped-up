<a class="brew-item__link" href="{{ $link }}">
<div class="brew-item">

      <div class="brew-item__image">
      <img src="{{$image}}" alt="">
      </div>
      <svg class="brew-item__curve" data-name="brew-item__curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 262.06"><path d="M600,148.88V300H0V106.56C181.05-39.21,480,82.49,600,148.88Z" transform="translate(0 -37.94)" style="fill:#feba4f"/><path d="M231.07,45.52" transform="translate(0 -37.94)" style="fill:#feba4f"/></svg>
      <div class="brew-item__content">
        <p class="brew-item__author">{{ $author }}</p>
      <p class="brew-item__meta">{{ $meta }} - {{ $brewType }}</p>
        <h4 class="brew-item__title">{{ $title }}</h4>
      </div>

  </div>
</a>
