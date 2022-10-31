@extends('layout.main')

<x-base-layout>
    

@foreach ($flux->channel->item as $flu)
    <article class="entry-item">

        {{-- <source src="https://feeds.soundcloud.com/stream/1371689950-ghandourpodcast-m3vyfsx9vxtf.mp3" type="audio/ogg">
        <source src="" type="audio/mpeg"> --}}

        <div class="entry-content">
            <a href="{{ $flu->item->link }}">{{ $flu->title }}</a>
            {{ $flu->description }}
        </div>
    </article>
@endforeach
</x-base-layout>

