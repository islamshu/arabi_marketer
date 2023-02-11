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
            <textarea name="description" name="description" required   class="form-control" id=""></textarea>

        </div>



        <div class="form-group col-md-6">

          <br> <label>روابط الاداة :</label>
            {{--   <input type="url" name="link" id="link"  class="form-control form-control-solid"
                placeholder="رابط الاداة" /> --}}
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>الرابط</th>
                    <th>النوع</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" required name="moreFields[0][url]" placeholder="اضف الرابط"
                            class="form-control" /></td>
                    <td>
                    <select name="moreFields[0][type]" required class="form-control">
                        <option value="apple">Apple</option>
                        <option value="google">Google</option>
                        <option value="url">url</option>
                    </select>
                    <td>
                        <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
                    </td>
                </tr>
            </table>
        </div>



        <div class=" col-md-12">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صور عن الاداة <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="imagestore" class="form-control image" required type="file" name="image"><br />


            </div>

        </div>


    </div>

    <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>


