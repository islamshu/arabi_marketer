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
                <p>Step 1</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>Step 3</p>
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
            <div class="col-md-4">
                <button class="btn btn-info" wire:click="generatePassword">Generate Password</button>
            </div>
            <div class="form-group col-md-6 mt-6">
                <label for="description">تاكيد كلمة المرور:</label>
                <input type="password" wire:model="confirm_password" class="form-control" id="teamPrice" />
                @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <p> {{ $password }} : كلمة المرور المنشأة هي  </p>


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
            <h3>  بيانات السوشل ميديا </h3>
                {{-- <tr>
                    <td>Image:</td>
                    <td><strong><img src="{{ $image }}" width="30" height="30" alt=""></strong></td>
                </tr> --}}
             
               <div class="form-group col-md-6 mt-6">
                    <label for="description">الفيس بوك :</label>
                    <input type="text" wire:model="facebook" class="form-control" id="teamPrice" />
                    @error('facebook') <span class="error">{{ $message }}</span> @enderror
                </div> 
                <div class="form-group col-md-6 mt-6">
                    <label for="description">الانستجرام  :</label>
                    <input type="text" wire:model="instagram" class="form-control" id="teamPrice" />
                    @error('instagram') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6 mt-6">
                    <label for="description">تويتر  :</label>
                    <input type="text" wire:model="twitter" class="form-control" id="teamPrice" />
                    @error('twitter') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6 mt-6">
                    <label for="description">بنترست  :</label>
                    <input type="text" wire:model="pinterest" class="form-control" id="teamPrice" />
                    @error('pinterest') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6 mt-6">
                    <label for="description">سناب شات  :</label>
                    <input type="text" wire:model="snapchat" class="form-control" id="teamPrice" />
                    @error('snapchat') <span class="error">{{ $message }}</span> @enderror
                </div>
              
                    
            
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">حفظ</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">رجوع</button>
        </div>
    </div>
  
</div>