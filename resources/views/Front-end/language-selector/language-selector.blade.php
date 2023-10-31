<form action="{{ route('language.switch') }}" method="POST" id="language-form">
    @csrf
    <select name="locale" class="form-select" onchange="clickSubmit(event)">
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
        <option value="kh" {{ app()->getLocale() === 'kh' ? 'selected' : '' }}>Khmer</option>
    </select>
</form>
<script>
    function clickSubmit(event){
        event.preventDefault();
        var form = document.getElementById('language-form');
        form.submit();
    }
</script>