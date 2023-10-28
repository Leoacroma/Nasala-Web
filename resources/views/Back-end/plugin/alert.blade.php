<script>
    function confirmDelete(event, form) {
    event.preventDefault();
    Swal.fire({
        title: 'តើអ្នកចង់លុប?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'យល់ព្រម',
        cancelButtonText: 'មិនយល់ព្រម'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

</script>
    