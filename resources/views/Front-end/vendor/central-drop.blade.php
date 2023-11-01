  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title Kantumruy" id="exampleModalLabel" style="font-weight: bold">{{ $item['courseName'] }} </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body Kantumruy" style="font-size: 16px">
          <h1 class="Kantumruy" style="font-size: 15px; font-weight: bold">ចាប់ពីថ្ងៃ ៖ <span class="badge badge-warning Kantumruy" style="font-size: 15px; font-weight: bold">{{ $item['courseStartDate'] }} <i class="fa-solid fa-arrow-right fa-bounce"></i> {{ $item['courseEndDate'] }}</span></h1>
            <p>{{ $item['description'] }}</p>
        </div>
        <div class="col-md-12 text-algin-center">
            <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}"  class="card-img-top img-fluid" style="width: 450px"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary Kantumruy" style="font-size: 15px; font-weight: 400" data-mdb-dismiss="modal">ត្រលប់ក្រោយ</button>
          <a href="{{ $hyperlink }}" class="btn btn-primary Kantumruy" style="font-size: 15px; font-weight: 400">ចុះឈ្មោះ</a>
        </div>
      </div>
    </div>
  </div>