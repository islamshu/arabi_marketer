<div>
    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>الخطوة الاولى</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>الخطوة الثانية</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>الخطوة الثالثة</p>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-md-12">
            <h3>الخطوة الاولى</h3>
            <div class="form-group col-md-6 mt-6">
                <label for="title"> الصورة الشخصية:</label>
                <input type="file" wire:model="image" class="form-control" id="taskTitle">
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="title"> المنشن:</label>
                <input type="text" wire:model="mention" class="form-control" id="taskTitle">
                @error('mention') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description"> الاسم الاول:</label>
                <input type="text" wire:model="first_name" class="form-control" id="teamPrice" />
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description"> الاسم الثاني:</label>
                <input type="text" wire:model="last_name" class="form-control" id="teamPrice" />
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description">البريد الاكتروني:</label>
                <input type="email" wire:model="email" class="form-control" id="teamPrice" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description"> الدولة </label><br />
                <select class="form-control" id="select2" wire:model="country" >

                         
                    @foreach($countries as $perm)
                        <option value={{$perm->id}}>{{ $perm->title }}</option>
                    @endforeach
                </select>
                
                @error('country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description">كلمة المرور:</label>
                <input type="password" wire:model="password" class="form-control" id="teamPrice" />
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" wire:click="firstStepSubmit"
                type="button">التالي</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <h3>  الخطوة الثانية</h3>
            <div class="form-group col-md-6 mt-6">
                <label for="description"> مجالات صناع المحتوى</label><br />
                <select class="form-control" id="select2" wire:model="selection" multiple>

                         
                    @foreach($categoires as $perm)
                        <option value={{$perm->id}}>{{ $perm->title }}</option>
                    @endforeach
                </select>
                
                @error('selection') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description">نبذة تعريفية:</label>
                <textarea  wire:model="pio" class="form-control"></textarea>
                @error('pio') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" type="button"
                wire:click="secondStepSubmit">التالي</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right mt-3" type="button" wire:click="back(1)">رجوع</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3>  الخطوة الثالثة</h3>
            <table class="table">
                {{-- <tr>
                    <td>Image:</td>
                    <td><strong><img src="{{ $image }}" width="30" height="30" alt=""></strong></td>
                </tr> --}}
                <tr>
                    <td>المنشن:</td>
                    <td><strong>{{$mention}}</strong></td>
                </tr>
                <tr>
                    <td> الامس الاول:</td>
                    <td><strong>{{$first_name}}</strong></td>
                </tr>
                <tr>
                    <td> الاسم الثاني:</td>
                    <td><strong>{{$last_name}}</strong></td>
                </tr>
                <tr>
                    <td>البريد الاكتروني:</td>
                    <td><strong>{{$email}}</strong></td>
                </tr>
                <tr>
                    <td>كلمة المرور:</td>
                    <td><strong>{{$password}}</strong></td>
                </tr>
                <tr>
                    <td>مجالات صناع المحتوى:</td>
                    <td>
                    @foreach ($selection as $item)
                    <strong>{{ App\Models\Category::find($item)->title }}</strong> ,
                    @endforeach
                    <td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">حفظ</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">رجوع</button>
        </div>
    </div>
</div>