@extends('layout.main')
@section('style')
<style>
    .slidecontainer {
      width: 100%;
    }
    
    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 10px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }
    
    .slider:hover {
      opacity: 1;
    }
    
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 23px;
      height: 24px;
      border: 0;
      background: url('contrasticon.png');
      cursor: pointer;
    }
    
    .slider::-moz-range-thumb {
      width: 23px;
      height: 24px;
      border: 0;
      background: url('contrasticon.png');
      cursor: pointer;
    }
    </style>
    <style>
        .color-picker {
            font-size: 0;

            &__item {
                display: inline-block;

                &+& {
                    margin-left: 10px;
                }

                &:hover {
                    cursor: pointer;
                }
            }

            &__input {
                display: none;

                &:checked {
                    +.color-picker__color {
                        &:after {
                            content: '';
                        }
                    }
                }

                &:disabled {
                    +.color-picker__color {
                        opacity: 0.5;

                        &:hover {
                            cursor: not-allowed;
                        }
                    }
                }
            }

            &__color {
                position: relative;
                display: block;
                width: 32px;
                height: 32px;

                &:hover {
                    cursor: pointer;
                }

                &:after {
                    pointer-events: none;
                    position: absolute;
                    top: -2px;
                    left: -2px;
                    width: calc(100% + 4px);
                    height: calc(100% + 4px);
                    outline: 2px solid black;
                    content: none;
                }

                &--black {
                    background: #000000;
                }

                &--white {
                    background: #FFFFFF;
                }

                &--color1 {
                    background: #4777af;
                }

                &--color2 {
                    background: #90cdf0;
                }

                &--color3 {
                    background: #46b064;
                }

                &--color4 {
                    background: #d2dcbb;
                }

                &--color5 {
                    background: #f58357;
                }

                &--color6 {
                    background: #b65689;
                }

                &--color7 {
                    background: #c775b0;
                }

                &--color8 {
                    background: #e4564a;
                }
            }
        }
    </style>
@endsection

<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                role="tablist">
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 " href="/">
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
                    <a class="nav-link text-active-primary pb-5 active">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                    fill="currentColor"></path>
                                <rect x="7" y="17" width="6" height="2" rx="1"
                                    fill="currentColor"></rect>
                                <rect x="7" y="12" width="10" height="2" rx="1"
                                    fill="currentColor"></rect>
                                <rect x="7" y="7" width="6" height="2" rx="1"
                                    fill="currentColor"></rect>
                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->مشاهدة استشارة  
                    </a>

                </li>


            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <div style="direction: rtl;margin-right: 12%;">
                   @if($co->status == 0)
                    <form action="{{  route('change_status_consulting',$co->id) }}" method="post" >
                        @csrf
                        <div class="col-md-3">
                            <label for="" class="">حالة الاستشارة</label>
                            <select required id="" class="form-control " name="status"  >
                                <option value="" selected disabled>يرجى اخيار الحالة</option>
                                <option value="1" @if($co->status == 1) selected @endif>قبول</option>
                                <option value="2" @if($co->status == 2) selected @endif>في الانتظار</option>
                                <option value="0" @if($co->status == 0) selected @endif>عدم القبول</option>
                            </select>
                        </div>
                       
                        <div class="col-md-6 mt-10"  id="btn_submit">
                            <button class="btn btn-info">تأكيد</button>
                        </div>
                       
        
                    </form> 
                    @endif  
                </div>

                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                    <!--begin::Form-->
                    <livewire:show-consoltion>
                        <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
@section('scripts')
<script>
    $( document ).ready(function() {
  // Handler for .ready() called.

    $( "#time_duration" ).change(function() {
        if($(this).val() == 0){
            
            $("#hour_and_mins").show();

        }else{
            $("#hour_and_mins").hide();
        }
});
});
</script>

@endsection
