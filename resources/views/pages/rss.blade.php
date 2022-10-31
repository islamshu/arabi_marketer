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
    $i =0;
@endphp
{{ dd(($flux->channel->image->url[0])) }}
@foreach ($flux->channel->item as $flu)
<button class="btns" id="play-btn{{ $i }}">play</button>
<p><a href="{{utf8_decode((string)$flu->enclosure['url'])}}" id="linkk{{ $i }}" target="_blank" rel="noopener">{{ $flu->title }}</a></p>

<script>
    //play button
const play_btn{{ $i }} = document.querySelector('#play-btn{{ $i }}');

//audio file

let linkk{{ $i }} = document.getElementById("linkk{{ $i }}").getAttribute("href"); 
console.log("{{ $flu->item->link }}")
let sound{{ $i }} = new Audio(linkk{{ $i }});
//play event
play_btn{{ $i }}.addEventListener( 'click' , play );

function play(){
	sound{{ $i }}.play();
}
</script>
<hr>
  @php
      $i++;
  @endphp
@endforeach
</x-base-layout>


