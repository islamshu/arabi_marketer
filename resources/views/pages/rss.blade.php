@foreach ($flux[0]->item->link as $item)
    <article class="entry-item">
        <img src="{{utf8_decode((string)$item->enclosure['url'])}}" alt="">
        <div class="entry-content">
            <a href="{{ $item->link }}">{{ $item->title }}</a>
            {{ $item->description }}
        </div>
    </article>
@endforeach