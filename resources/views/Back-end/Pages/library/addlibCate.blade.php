<div class="card-body">
    <div class="row">
      <div class="col-11">
        <h4 class="card-title kantumruy">បន្ថែមប្រភេទបណ្ណាល័យ</h4>
      </div>
    </div>
    <div  class="row">
      <p class="card-description kantumruy">
        បន្ថែមប្រភេទ
      </p>
      <div class="col-12">
        <div class="divider-line"> </div>
      </div>
    </div>
    <div class="row">
     <div class="col-12">
      <form method="POST" class="kantumruy" action="{{ route('admin.lib.cate.store') }}">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">ឈ្មោះ <span class="required"></span></label>
          <input type="text" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="ឈ្មោះ" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">ឈ្មោះជាភាសាអង់គ្លេស </label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="ឈ្មោះជាភាសាអង់គ្លេស" >
        </div>
       
        <button type="submit" class="btn btn-primary text-white" style="font-weight: 400">បន្ថែម</button>
      </form>
     </div>
    </div>
  </div>
