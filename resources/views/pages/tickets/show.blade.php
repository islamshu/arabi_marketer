@extends('layout.main')

<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                role="tablist">
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 " href="/" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->الرئيسية
                    </a>

                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 active" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                <path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="currentColor"></path>
                                </svg>
                        </span>
                        <!--end::Svg Icon-->تذكرة : {{ $ticket->title }}
                    </a>

                </li>


            </ul>
        

            

            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                   
                        <div class="row">
                    
                            <div class="form-group col-md-8">
                    
                                <br><label> عنوان التذكرة :</label>
                    
                                <input type="text" id="title_ar" readonly value="{{ $ticket->title }}" name="title" required class="form-control form-control-solid"
                                    placeholder="العنوان " />
                    
                            </div>
                         
                    
                            <div class="form-group col-md-8">
                                <br><label> الموضوع :</label>
                                <textarea name="description" class="form-control form-control-solid" >{{ $ticket->body }}</textarea>
                            </div>
                            <div>
                                @foreach ($ticket->files as $key=>$item)
                                &nbsp;   <a target="_blank" href="{{ asset('public/uploads/'.$item->file) }}">الملف ({{ $key +1 }}) </a> &nbsp;
                                @endforeach
                            </div>
                    
                            
                   
                        </div>
                      
                        
                         <br>
                         @foreach ($ticket->replay as $item)
                             
                         <div class="form-group col-md-8">

                         <div class="card">
                            <div class="card-header">
                              @if($item->user_id == $ticket->user_id)
                                {{ $ticket->user->name }}  (المالك)
                                @else
                                {{ $item->user->name }}  (الدعم)
                                @endif
                            </div>
                            <div class="card-body">
                              <p class="card-text">{{ $item->body }}</p>
                            </div>
                          </div>
                         </div>
                         @endforeach

                         <div class="form-group col-md-8">

                            <div class="card">
                             
                               <div class="card-body">
                              <form action="{{ route('send_replay') }}" method="post">
                                @csrf
                                <input type="hidden" class="form-control" name="ticket_id" value="{{ $ticket->id }}" >
                                <textarea required name="body" class="form-control" id="" cols="30" rows="4"></textarea>
                                <div class="col-md-3 mt-3">
                                    <input type="submit" value="send" class="form-control btn btn-info">
                                </div>
                              </form>
                               </div>
                             </div>
                            </div>
                  
                </div>
             
              
            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>


@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
