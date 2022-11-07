<div class="pt-5">
    @if (!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}" href="#step1">البيانات الأساسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 2 ? '' : 'active' }}" href="#step2">بيانات اضافية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentSection != 3 ? '' : 'active' }}" href="#step3">تأكيد</a>
        </li>
    </ul>
    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
            <input type="hidden" wire:model="con_id" 
         
            aria-describedby="con_id">
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">عنوان الاستشارة</label>
            
                <input type="text" wire:model="title" 
                    class="form-control {{ $errors->first('day') ? 'is-invalid' : '' }}" id="title"
                    aria-describedby="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="description" class="form-label">وصف الاستشارة</label>
                <textarea name="description" wire:model="description"
                    class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"  id="description" cols="30"
                    rows="10"></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="user" class="form-label"> صاحب الاستشارة </label>
                <select wire:model.defer="user" id="user"
                    class="form-control {{ $errors->first('user') ? 'is-invalid' : '' }}">
                    <option value="null" disabled>{{ __('يرجى الاختيار') }}</option>
                    @foreach (App\Models\User::get() as $department)
                        <option value="{{ $department->id }}" wire:key="{{ $department->id }}">
                            {{ $department->name }}</option>
                    @endforeach
                </select>
                @error('user')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="place" class="form-label"> نوع الاستشارة </label>
                <select wire:model.defer="type" id="type"
                    class="form-control {{ $errors->first('type') ? 'is-invalid' : '' }}">
                    <option value="null" disabled>{{ __('يرجى الاختيار') }}</option>
                    @foreach (App\Models\Category::ofType('consultation')->get() as $type)
                        <option value="{{ $type->id }}" wire:key="{{ $type->id }}">{{ $type->title }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="place" class="form-label"> مكان الاستشارة </label>
                <select wire:model.defer="place" id="place"
                    class="form-control {{ $errors->first('place') ? 'is-invalid' : '' }}">
                    <option value="null" disabled>{{ __('يرجى الاختيار') }}</option>
                    @foreach (App\Models\Placetype::get() as $department)
                        <option value="{{ $department->id }}" wire:key="{{ $department->id }}">
                            {{ $department->title }}</option>
                    @endforeach
                </select>
                @error('place')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="color" class="form-label"> لون الاستشارة </label>
                <input type="color" wire:model="color" name="color" id="color"
                    class="form-control {{ $errors->first('color') ? 'is-invalid' : '' }}">
                @error('color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" wire:click="step1" type="button">التالي</button>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentSection != 2 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="email" class="form-label">مدة الاستشارة</label>
                <select name="time_duration" id="time_duration" wire:model="time_duration"
                    class="form-control {{ $errors->first('time_duration') ? 'is-invalid' : '' }}">
                    <option value="" disabled selected>اختر مدة الاستشارة</option>
                    <option value="30">30</option>
                    <option value="60">ساعة</option>
                    <option value="120">ساعتين</option>
                    <option value="else">وقت اخر</option>

                </select>
                @error('time_duration')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if ($time_duration == 'else')
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="phone" class="form-label"> عدد الساعات</label>
                        <input type="number" wire:model="hour"
                            class="form-control {{ $errors->first('hour') ? 'is-invalid' : '' }}" id="hour">
                        @error('hour')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">

                        <label for="phone" class="form-label"> عدد الدقائق</label>
                        <input type="number" wire:model="mints"
                            class="form-control {{ $errors->first('mints') ? 'is-invalid' : '' }}" id="mints">
                        @error('mints')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="date" class="form-label"> تاريخ بداية الاستشارة </label>
                    <input type="date" wire:model="start_date"
                        class="form-control {{ $errors->first('start_date') ? 'is-invalid' : '' }}" id="hour">
                    @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label"> تاريخ نهاية الاستشارة </label>
                    <input type="date" wire:model="end_date"
                        class="form-control {{ $errors->first('end_date') ? 'is-invalid' : '' }}" id="end_date">
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @foreach ($days as $key=> $item)
                
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label for="phone" class="form-label"> اليوم </label>
                    <select name="day[]" id="day" wire:model="day_select.{{ $key }}"
                        class="form-control {{ $errors->first('day_select.'.$key) ? 'is-invalid' : '' }}">
                        <option value="" selected></option>
                        <option value="Monday">الاثنين</option>
                        <option value="Tuesday">الثلاثا</option>
                        <option value="Wednesday">الاربعا</option>
                        <option value="Thursday">الخميس</option>
                        <option value="Friday">الجمعة</option>
                        <option value="Saturday">السبت</option>
                        <option value="Sunday">الأحد</option>

                    </select>
                    @error('day_select.'.$key)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="from" class="form-label"> من</label>
                    <input type="time" wire:model="form_select.{{ $key }}"
                        class="form-control {{ $errors->first('form_select.'.$key) ? 'is-invalid' : '' }}" id="from">
                    @error('form_select.'.$key)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">

                    <label for="to" class="form-label"> الى</label>
                    <input type="time" wire:model="to_select.{{ $key }}"
                        class="form-control {{ $errors->first('to_select.'.$key) ? 'is-invalid' : '' }}" id="to">
                    @error('to_select.'.$key)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm" style="margin-top:13%"
                        wire:click.prevent="remove({{ $key }})">حذف</button>
                </div>

            </div>
            @endforeach
            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{ $i }})">اضف
                اوقات</button>
            @foreach ($inputs as $key => $value)
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label for="phone" class="form-label"> اليوم </label>
                    <select name="day[]" id="day" wire:model="day_select.{{ $value }}"
                        class="form-control {{ $errors->first('day_select.' . $value) ? 'is-invalid' : '' }}">
                        <option value="" selected></option>
                        <option value="Monday">الاثنين</option>
                        <option value="Tuesday">الثلاثا</option>
                        <option value="Wednesday">الاربعا</option>
                        <option value="Thursday">الخميس</option>
                        <option value="Friday">الجمعة</option>
                        <option value="Saturday">السبت</option>
                        <option value="Sunday">الأحد</option>

                    </select>
                    @error('day_select.' . $value)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">

                    <label for="from" class="form-label"> من</label>
                    <input type="time" wire:model="form_select.{{ $value }}"
                        class="form-control {{ $errors->first('form_select.' . $value) ? 'is-invalid' : '' }}"
                        id="from">
                    @error('form_select.' . $value)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">

                    <label for="to" class="form-label"> الى</label>
                    <input type="time" wire:model="to_select.{{ $value }}"
                        class="form-control {{ $errors->first('to_select.' . $value) ? 'is-invalid' : '' }}"
                        id="to">
                    @error('to_select.' . $value)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm" style="margin-top:13%"
                        wire:click.prevent="remove({{ $key }})">حذف</button>
                </div>
            </div>
        @endforeach


            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="price" class="form-label"> سعر الاستشارة   </label>
                    <input type="range" min="10" max="500" wire:model="price"
                        class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}" id="price">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <h3>السعر : {{ $price }}</h3>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="payment" class="form-label"> طريقة الدفع   </label>
                <select wire:model.defer="payment" id="payment"
                    class="form-control {{ $errors->first('payment') ? 'is-invalid' : '' }}">
                    <option value="null" disabled>{{ __('يرجى الاختيار') }}</option>
                    @foreach (App\Models\Payment::get() as $department)
                        <option value="{{ $department->id }}" wire:key="{{ $department->id }}">
                            {{ $department->title }}</option>
                    @endforeach
                </select>
                @error('payment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 ">
                <div class="col-md-6">
                    <label for="url" class="form-label"> رابط الاستشارة   </label>
                    <input type="url" wire:model="url"
                        class="form-control {{ $errors->first('url') ? 'is-invalid' : '' }}" id="url">
                    @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>



            <button class="btn btn-danger" type="button" wire:click="back(1)">رجوع</button>
            <button class="btn btn-primary" type="button" wire:click="step2">التالي</button>
        </div>

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentSection != 3 ? 'none' : '' }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">عنوان الاستشارة: {{$title}}</li>
                <li class="list-group-item">وصف الاتشارة: {{ $description }}</li>
                <li class="list-group-item"> نوع الاستشارة: {{ $type->title }}</li>
                <li class="list-group-item">لون الاستشارة: {{ $color }}</li>
                <li class="list-group-item">مدة الاستشارة : {{ $time_duration == 'else' ? $hour .':'. $mints.':00' : $time_duration  }}</li>
                <li class="list-group-item">تاريخ بدأ الاستشارة: {{ $start_date }}</li>
                <li class="list-group-item">تاريخ انتهاء الاستشارة: {{ $end_date }}</li>
                <li class="list-group-item">سعر الاستشارة: {{ $price }}</li>
                <li class="list-group-item">طريقة الدفع  للاستشارة: {{ $payment }}</li>
                <li class="list-group-item">رابط الاستشارة   : {{ $url }}</li>


            </ul>
            <button class="btn btn-danger" type="button" wire:click="back(2)">رجوع</button>
            <button class="btn btn-success" wire:click="step3" type="button">تأكيد وحفظ</button>
        </div>
    </div>
</div>
@push('scripts')

@endpush
