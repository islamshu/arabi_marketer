     <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
         <!--begin::Row-->

         <div class="modal fade" tabindex="-1" id="indexContractorsEmails">
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
                             <table id="kt_datatable_example_2" class="table align-middle table-row-dashed fs-6 gy-5">
                                 <thead>
                                     <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                         <th>#</th>
                                         <th>email</th>
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
         <div class="row">
             <div class="col-xl-2"></div>
             <div class="col-xl-7">
                 <div class="my-2">
                     <!--begin::Row-->
                     {{-- <div class="row">
                         <label class="col-form-label col-3 text-lg-right text-left"></label>
                         <div class="col-9">
                             <h6 class="text-dark font-weight-bold mb-10">Account:</h6>
                         </div>
                     </div> --}}
                     <!--end::Row-->
                     <!--begin::Group-->

                     <!--end::Group-->
                     <!--begin::Group-->
                     <div class="form-group row">
                         <label class="col-form-label col-3 text-lg-right text-left">Email
                             Address</label>
                         <div class="col-9">
                             <div class="input-group input-group-lg input-group-solid">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text">
                                         <i class="la la-at"></i>
                                     </span>
                                 </div>
                                 <input type="text" id="ContractorsEmails"
                                     class="form-control form-control-lg form-control-solid"
                                     value="nick.watson@loop.com" placeholder="Email" />
                             </div>

                         </div>
                     </div>

                     <!--end::Group-->
                 </div>
             </div>
         </div>
         <div class="card-footer">
             <div class="kt-form__actions">
                 <div class="row">

                     <div class="col-lg-9 col-xl-6">
                         <div class="btn-group" role="group" aria-label="First group">
                             <button type="button" onclick="performStoreEmail()" class="btn btn-danger"
                                 data-toggle="kt-popover" data-content="Add &amp; Save Record" id="peopleSaveRecored"
                                 data-original-title="" title=""> <i class="la la-save"></i></button>



                             <button type="button" class="btn btn-success" onclick="dataTableWorkerEmails()"
                                 data-bs-toggle="modal" data-bs-target="#indexContractorsEmails"><i class="la la-list"
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
