@props(['product'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($product->product_image)
    <div class="ml-20 mt-20">
        <img class="w-85 h-80 object-cover object-center" src="{{asset('storage/products/'.$product->product_image)}}" alt="">
    </div>
    @else
    <div class="ml-20 mt-20">
        <img class="w-85 h-80 object-cover object-center" src="{{asset('img/default_product.jpg')}}" alt="">
    </div>
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a style="text-decoration:none" href="{{route('publicaciones.show',$product)}}">{{$product->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$product->description!!}
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach ($product->tags as $tags)
                <a style="text-decoration:none" href="{{route('products.tag', $tags)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tags->name}}</a>
            @endforeach
        </div>
    </div>
</article>