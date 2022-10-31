@extends('layout.main')

<x-base-layout>

@foreach ($flux->channel->item as $flu)
    <article class="entry-item">
        <source src="{{utf8_decode((string)$flu->enclosure['url'])}}" type="audio/mpeg">

        <div class="entry-content">
            <a href="{{ $flu->item->link }}">{{ $flu->title }}</a>
            {{ $flu->description }}
        </div>
    </article>
@endforeach
</x-base-layout>

