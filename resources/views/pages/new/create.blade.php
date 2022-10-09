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
                                    <th>Name</th>
                                    <th>mobile</th>
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
    <div class="row">

        <div class="form-group col-md-6">

            <label> Title Ar:</label>

            <input type="text" id="job_name" required class="form-control form-control-solid" placeholder="First Name" />

        </div>
        <div class="form-group col-md-6">

            <label> Title En:</label>

            <input type="text" id="job_name_hb" required class="form-control form-control-solid" placeholder="First Name" />

        </div>
        <div class="form-group col-md-6">

            <label>specialty:</label>
            <select class="form-select form-control form-select-solid " required data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" >
                <option value=""></option>
                @foreach (App\Models\Specialty::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>


        </div>
        <div class="form-group col-md-6">

            <label>Fesc:</label>

            <textarea type="text" id="job_desc_hb" required  class="form-control form-control-solid" placeholder="desc"> </textarea>

        </div>
        <div class="form-group col-md-6">

            <label>Date:</label>

            <input type="date" id="date" class="form-control form-control-solid" placeholder="date" />

        </div>
        <div class="form-group col-md-6">
            <label> Status </label>

        <select class="form-select form-control form-select-solid " data-control="select2" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
            <option></option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
        </select>
        </div>
        
        

       
        <div class="form-group col-md-4">
            <label> Status </label>
            <select class="form-control form-control-solid" name="status_job" id="status_job">
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
            </select>
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
