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
            <h3> Step 1</h3>
            <div class="form-group">
                <label for="title"> Image:</label>
                <input type="file" wire:model="image" class="form-control" id="taskTitle">
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="title"> Mention:</label>
                <input type="text" wire:model="mention" class="form-control" id="taskTitle">
                @error('mention') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">First name:</label>
                <input type="text" wire:model="first_name" class="form-control" id="teamPrice" />
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Last name:</label>
                <input type="text" wire:model="last_name" class="form-control" id="teamPrice" />
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Email:</label>
                <input type="email" wire:model="email" class="form-control" id="teamPrice" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description"> الدولة </label><br />
                <select class="form-control" id="select2" wire:model="country" >

                         
                    @foreach($countries as $perm)
                        <option value={{$perm->id}}>{{ $perm->title }}</option>
                    @endforeach
                </select>
                
                @error('country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Password:</label>
                <input type="password" wire:model="password" class="form-control" id="teamPrice" />
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" wire:click="firstStepSubmit"
                type="button">Next</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <h3> Step 2</h3>
            <div class="form-group">
                <label for="description"> مجالات المسوق</label><br />
                <select class="form-control" id="select2" wire:model="selection" multiple>

                         
                    @foreach($categoires as $perm)
                        <option value={{$perm->id}}>{{ $perm->title }}</option>
                    @endforeach
                </select>
                
                @error('selection') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="description">Pio:</label>
                <textarea  wire:model="pio" class="form-control"></textarea>
                @error('pio') <span class="error">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right mt-3" type="button"
                wire:click="secondStepSubmit">Next</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right mt-3" type="button" wire:click="back(1)">Back</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3> Step 3</h3>
            <table class="table">
                <tr>
                    <td>Mrntion:</td>
                    <td><strong>{{$mention}}</strong></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><strong>{{$first_name}}</strong></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><strong>{{$last_name}}</strong></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><strong>{{$email}}</strong></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><strong>{{$password}}</strong></td>
                </tr>
                <tr>
                    <td>domains:</td>
                    @foreach ($selection as $item)
                    <td><strong>{{ App\Category::find($item)->title }}</strong></td>

                    @endforeach
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
        </div>
    </div>
</div>