<div class="card-body">
    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-bold fs-6">  Cover Profile</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <img style="max-width: 100%" src="{{ asset('public/uploads/'.@$user->cover) }}" alt="">                    
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

            </div>

        </div>
    </div>

    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <input type="text" value="{{ @$user->first_name }}" readonly
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <input type="text" readonly value="{{ @$user->last_name }}"
                        class="form-control form-control-lg form-control-solid" placeholder="Last name">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>

        </div>
        <!--end::Col-->
    </div>

    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> Country</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" value="{{ @$user->country->title }}" readonly
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

            </div>

        </div>
    </div>
    @php
        $type_array = [];
        if (@$user->types != null) {
            foreach (@$user->types as $type) {
                array_push($type_array, $type->type_id);
            }
            $categores = App\Models\Specialty::whereIn('id', $type_array)->get();
        } else {
            return null;
        }
    @endphp
    @if ($categores != '[]' && $categores != null)

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"> User domains</label>
            <div class="col-lg-8">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->

                    @foreach ($categores as $item)
                        <input style="width: 20%;" type="text" value="{{ $item->title }}" readonly
                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    @endforeach
                </div>

            </div>
        </div>
    @endif
    
    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> Pio</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <textarea name="" readonly  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">{{ @$user->pio }}</textarea>
               
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

            </div>

        </div>
    </div>
    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> Soical</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
      
   
                <!--begin::Col-->
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">facebbok</label>
                    <input type="text" value="{{ @$user->soical->facebook }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">instagram</label>

                    <input type="text" value="{{ @$user->soical->instagram }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">twitter</label>
                    <input type="text" value="{{ @$user->soical->twitter }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">pinterest</label>
                    <input type="text" value="{{ @$user->soical->pinterest }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">snapchat</label>
                    <input type="text" value="{{ @$user->soical->snapchat }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">linkedin</label>
                    <input type="text" value="{{ @$user->soical->linkedin }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <label for="">website</label>
                    <input type="text" value="{{ @$user->soical->website }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
               

                

                

            </div>

        </div>
    </div>
        
    <div class="row mb-6">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> Follower Number</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input type="text" value="{{ @$user->soical->followers_number }}" readonly
                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">                       
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

            </div>

        </div>
    </div>


</div>