<style>

     .select2-container .select2-selection {
        height: 40px; /* Adjust the height as desired */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px; /* Match the line-height to the height for vertical centering */
    }

    .select2-thumbnail {
        width: 30px;
        height: 30px;
        margin-right: 5px;
    }
    
  
</style>
<form action="{{ route('language.switch') }}" method="POST" id="language-form">
    @csrf
    {{-- <h2>test</h2> --}}
    <select name="locale" class="form-select select2" onchange="clickSubmit(event)" >
        <option value="en"  data-thumbnail="{{ asset('images/cambodia/icons8-usa-48.png') }}"  {{ app()->getLocale() === 'en' ? 'selected' : '' }}  > 
            English </option>
            
          <option value="kh"  data-thumbnail="{{ asset('images/cambodia/icons8-cambodia-circular-48.png') }}" {{ app()->getLocale() === 'kh' ? 'selected' : '' }} >
            Khmer</option>
    </select>
</form>
<script>
    $(document).ready(function() {
        function formatOption(option) {
            if (!option.id) {
                return option.text;
            }

            var thumbnail = $(option.element).data('thumbnail');
            var $option = $(
                '<span><img src="' + thumbnail + '" class="select2-thumbnail" /> ' + option.text + '</span>'
            );

            return $option;
        }

        $('.select2').select2({
            minimumResultsForSearch: -1,
            templateResult: formatOption,
            templateSelection: formatOption
        });
    });

    function clickSubmit(event) {
        event.preventDefault();
        var form = document.getElementById('language-form');
        form.submit();
    }
</script>