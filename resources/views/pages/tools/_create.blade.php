<form id="send_form">
    @csrf
    <div class="row">

        <div class="form-group col-md-6">

            <br><label> عنوان الادة :</label>

            <input type="text" id="title" name="title" required class="form-control form-control-solid"
                placeholder="العنوان الاداة" />

        </div>

        <div class="form-group col-md-8">

            <br><label> الوصف :</label>
            <textarea name="description" required class="form-control" id=""></textarea>

        </div>

     
     
        <div class="form-group col-md-6">

            <br> <label>رابط الخدمة:</label>
            <input type="url" name="link" id="link"  class="form-control form-control-solid"
                placeholder="رابط الاداة" />
        </div>

       
        <div class=" col-md-12">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="imagestore" class="form-control image" required type="file" name="image" ><br />
     

            </div>

        </div>
      
    </div>
   
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>

<fieldset id="buildyourform">
</fieldset>
<input type="button" value="Preview form" class="add" id="preview" />
<input type="button" value="Add a field" class="add" id="add" />
