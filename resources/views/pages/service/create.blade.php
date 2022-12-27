<div class="tab-pane show active px-7 show" id="kt_user_edit_tab_1" role="tabpanel">
    <div class="modal fade" tabindex="-1" id="indexJobsContractors">
        <div class="modal-dialog modal-dialog-scrollable modal-xl ">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <table id="kt_datatable_example_5" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Ttile</th>
                                    <th class="text-end min-w-50px">الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!--begin::Row-->
    <form id="send_form">
        @csrf
        <div class="row">

            <div class="form-group col-md-6">

                <br><label> Title Ar:</label>

                <input type="text" id="title_ar" name="title_ar" required class="form-control form-control-solid"
                    placeholder="العنوان بالعربية" />

            </div>
            <div class="form-group col-md-6">

                <br><label> Title En:</label>

                <input type="text" id="title_en" name="title_en" required class="form-control form-control-solid"
                    placeholder="العنوان بالانجليزية" />

            </div>
            <div class="form-group col-md-6">

                <br><label> Description Ar:</label>
                <textarea name="description_ar" id="description_ar" required class="form-control form-control-solid"></textarea>

            </div>
            <div class="form-group col-md-6">

                <br><label> Description En:</label>

                <textarea name="description_en" id="description_en" required class="form-control form-control-solid"></textarea>

            </div>
            <div class="form-group col-md-6">

                <label>specialty:</label>
                <select class="form-select form-control form-select-solid " id="specialty" name="specialty[]" multiple required
                    data-control="select2" data-close-on-select="false" data-placeholder="Select an option"
                    data-allow-clear="true">
                    <option value=""></option>
                    @foreach ($specialty as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>


            </div>
            <div class="form-group col-md-6">

                <label>Type:</label>
                <select class="form-select form-control form-select-solid " id="type" name="type[]" multiple required
                    data-control="select2" data-close-on-select="false" data-placeholder="Select an option"
                    data-allow-clear="true">
                    <option value=""></option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-6">

                <label>Price:</label>
                <input type="text" id="price" required name="price" class="form-control form-control-solid"
                    placeholder="Price" />
            </div>
            <div class="form-group col-md-6">

                <label>Url:</label>
                <input type="url" name="url" id="url"  class="form-control form-control-solid"
                    placeholder="Url" />
            </div>

            <div class="form-group col-md-6">

                <label>Keywords:</label>
                <input class="form-control form-control-sm form-control-solid keywords" name="keywords" placeholder="Enter tags"
                    id="kt_tagify_3" />


            </div>
            <div class=" col-md-6">
                <div class="form-group">
                    <label data-error="wrong" data-success="right" for="form3"> Image <span
                            class="required"></span></label>
                    <input type="file" id="imageedit" name="icon" class="form-control image">
                </div>
                <div class="form-group">
                    <img src="" style="width: 100px" class="img-thumbnail image-preview" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <br><label>Upload Files </label>

                <div class="input-group control-group increment">
                    <input type="file" name="files[]"  class="form-control fileservice">
                    <div class="input-group-btn">

                        <button style="margin-right: 20px;" class="btn btn-success files" type="button"><i
                                class="glyphicon glyphicon-plus"></i>Add more </button>
                    </div>
                </div>
            </div>
            <div class="clone hide" style="display: none">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="files[]" class="form-control">
                    <div class="input-group-btn">
                        <button style="margin-right: 20px;" class="btn btn-danger" type="button"><i
                                class="glyphicon glyphicon-remove"></i> Delete</button>
                    </div>
                </div>
            </div>





        </div>
        <button class="btn btn-info" id="submitform" style="display: none" type="submit">Create </i></button>
    </form>
    <div class="card-footer">
        <div class="kt-form__actions">
            <div class="row">

                <div class="col-lg-9 col-xl-6">
                    <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" onclick="performStoreJobs('send_form')" class="btn btn-danger"
                            data-toggle="kt-popover" data-content="Add &amp; Save Record" id="peopleSaveRecored"
                            data-original-title="" title=""> <i class="la la-save"></i></button>



                        <button type="button" class="btn btn-success" onclick="dataTableContractorJobs()"
                            data-bs-toggle="modal" data-bs-target="#indexJobsContractors"><i class="la la-list"
                                title=""></i></button>

                        <button type="reset" class="btn btn-default reset" onclick="getProfileNo()"><i
                                class="la la-flash" data-toggle="kt-popover" data-content="Reset"
                                id="peopleResetRecored" data-original-title="" title=""></i></button>

                        <button type="button" class="btn btn-warning" data-toggle="kt-popover"
                            data-content="Delete Record" id="peopleDeleteRecored" data-original-title=""
                            title=""><i class="la la-trash"></i></button>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </div>

</div>
