<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).data('url');
        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Kayıt kalıcı olarak silinecektir!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet',
            cancelButtonText: 'Vazgeç'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>