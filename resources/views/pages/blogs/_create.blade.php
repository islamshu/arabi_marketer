<form id="send_form">
    @csrf
    <div class="row">

        <div class="form-group col-md-6">

            <br><label> عنوان المقال :</label>

            <input type="text" id="title_ar" name="title_ar" required class="form-control form-control-solid"
                placeholder="العنوان بالعربية" />

        </div>
        <button
                type="button"
                class="fileInput1"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                اضغط هنا لتحميل الصورة الرئيسية للتدوينة
              </button>
        <div class=" col-md-6">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صورة عن المقال <span
                        class="required"></span></label>
                <input type="file"  id="imageupload" name="images" class="form-control image">

            </div>
            <div class="form-group">
                <img src="" style="width: 100px"
                    class="img-thumbnail image-preview" alt="">
            </div>

        </div>

        <div class="form-group col-md-6">

            <br><label> الوصف :</label>
            <textarea name="description_ar" class="editor" id="kt_docs_ckeditor_classic"></textarea>

        </div>
        <div class="form-group col-md-6">

            <br><label> وصف مصغر  :</label>
            <textarea name="small_description" class="editor form-control" ></textarea>

        </div>
        <div class="form-group col-md-6">
            
            <br><label> المستخدم :</label>
            <select class="form-select" required name="user_id"  data-control="select2" data-placeholder="اختر المستخدم">
                <option value="" selected disabled>يرجى الاختيار</option>
                @foreach (App\Models\User::get() as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>

                @endforeach
            </select>

        </div>
        <div class="form-group col-md-6">

            <br> <label>نوع المقال:</label>
            <select class="form-select form-control form-select-solid " id="type" name="type[]" multiple required
                data-control="select2" data-close-on-select="false" data-placeholder="اختر" data-allow-clear="true">
                <option value=""></option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>

        </div>
    

        <div class="form-group col-md-6">

            <br> <label>الكلمات المفتاحية:</label>
            <input class="form-control form-control-sm form-control-solid keywords" required name="keywords"
                placeholder="اضف كلمات مفتاحية" id="kt_tagify_3" />


        </div>
        
        <div class="form-group col-md-6">

            <br> <label>tags :</label>
            <input class="form-control form-control-sm form-control-solid keywords" required name="tags"
                placeholder="اضف tags " id="kt_tagify_44" />


        </div>
        
        
    </div>
    
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>


<div
              class="modal fade"
              id="exampleModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                    <div class="btns">
                      <!-- <button type="button" class="btn btn-primary">select files</button> -->
                    </div>
                  </div>
                  <div class="modal-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link active"
                          id="home-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#home-tab-pane"
                          type="button"
                          role="tab"
                          aria-controls="home-tab-pane"
                          aria-selected="true"
                        >
                          رفع صورة
                        </button>
                      </li>
                      <li
                        class="nav-item"
                        @click.prevent="imagehandel"
                        role="presentation"
                      >
                        <button
                          class="nav-link"
                          id="profile-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#profile-tab-pane"
                          type="button"
                          role="tab"
                          aria-controls="profile-tab-pane"
                          aria-selected="false"
                        >
                          عرض الصور
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div
                        class="tab-pane fade show active"
                        id="home-tab-pane"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                        tabindex="0"
                      >
                        <form
                          action=""
                          class="mt-4 mb-4" 
                          id="uploadimage_modal"
                          style="text-align: center"
                        >
                          <p>رفع ملفات</p>
                          <input type="file"   id="imageuploadmodal" onchange="myFunction()">
                          <img
                            class="img-preview"
                            v-if="url"
                            :src="url"
                            alt=""
                          />
                        </form>
                      </div>
                      <div
                        class="tab-pane fade"
                        id="profile-tab-pane"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                        tabindex="0"
                        style="display: flex"
                      >
                        <div class="main-content">
                          <div class="row  blogsimage" >
                            
                             @include('pages.blogs.all_image')
                          </div>
                        </div>

                        <div
                          class="img-info"
                          style="width: 20%;display: none"
                          
                         
                        >
                          <h5>image info</h5>
                          <p>  </p>
                          <form action="" id="uplodimageinfo">
                            <label for="" class="mb-2">Alt iamge</label>
                            <input
                              type="hidden"
                              name=""
                              class="form-control mb-3"
                              
                              id="image_id"
                            />
                            <input
                              type="text"
                              name=""
                              class="form-control mb-3"
                              
                              id="alt_image"
                            />
                            <label for="" class="mb-2">Title</label>
                            <input
                              type="text"
                              name=""
                              class="form-control mb-3"
                              v-model="image.imgTitle"
                              id="title_image"
                            />
                            <label for="" class="mb-2">Description</label>
                            <textarea
                              name=""
                              id="description_image"
                              cols="30"
                              class="form-control mb-3"
                              rows="10"
                              v-model="image.imgDescription"
                            ></textarea>

                            <button
                              class="btn btn-primary" onclick="storedata_image()" type="button"
                             
                            >
                              حفظ
                            </button>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                      @click="showData"
                    >
                      حفظ
                    </button>
                  </div>
                </div>
              </div>
            </div>
