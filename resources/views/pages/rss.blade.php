@extends('layout.main')
<style>
    body {
	margin: 0;
	padding: 0;
}

p {
	padding: 10px;
}

.btns {
  margin: 10px 6px;
  height: 70px;
  width: 70px;
  color: #FFF;
  font-size: 16px;
  background-color: #696969;
  border: none;
  border-radius: 50%;
  outline: none;
  cursor: pointer;
  transition-duration: 0.5s;
}

.btns:hover {
  background-color: #000;
}
</style>
<x-base-layout>

@php
    $i +0;
@endphp
@foreach ($flux->channel->item as $key=>$flu)
<button class="btns" id="play-btn{{ $i }}">play</button>
<script>
    //play button
const play_btn = document.querySelector('#play-btn{{ $i }}');

//audio file
let sound = new Audio("{{ $flu->item->link }}");

//play event
play_btn.addEventListener( 'click' , play );

function play(){
	sound.play();
}
</script>
<hr>
<p><a href="{{ $flu->item->link }}" target="_blank" rel="noopener">{{ $flu->title }}</a></p>
  @php
      $i++;
  @endphp
@endforeach
</x-base-layout>


