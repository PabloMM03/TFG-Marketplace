<div class="header-action-icon-2">
    <a href="{{url('wishlist')}}">
        <img class="svgInject" alt="" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}">
        @auth
        <span class="pro-count blue">{{$wishlist_items->count()}}</span>
        @else
        <span class="pro-count blue"></span>
        @endauth
    </a>
</div>