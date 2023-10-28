  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title kantumruy" id="exampleModalLabel" style="font-weight: bold">{{ $item['courseName'] }} </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body kantumruy" style="font-size: 16px">
          <h1 class="kantumruy" style="font-size: 15px; font-weight: 100">ចាប់ពីថ្ងៃ : <span class="badge badge-primary Kantumruy" style="font-size: 15px; font-weight: 100">{{ $item['courseStartDate'] }} <i class="fa-solid fa-arrow-right fa-bounce"></i> {{ $item['courseEndDate'] }}</span></h1>

            <p>{{ $item['description'] }}</p>
        </div>
        <div class="col-lay-12 text-algin-center">
            <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}"  class="card-img-top" style="width: 100%"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary kantumruy" style="font-size: 15px; font-weight: 400" data-mdb-dismiss="modal">ត្រលប់ក្រោយ</button>
          <a href="{{ $hyperlink }}" class="btn btn-primary kantumruy" style="font-size: 15px; font-weight: 400">ចុះឈ្មោះ</a>
        </div>
      </div>
    </div>
  </div>