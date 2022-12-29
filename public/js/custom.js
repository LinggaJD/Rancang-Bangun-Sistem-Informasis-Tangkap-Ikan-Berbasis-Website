function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
            $('#img-preview').attr('height','150px');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#form-file").change(function() {
    readURL(this);
});

$('body').on('click', '.delete', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Hapus data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus aja!'
      }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
      })
});
$(document).ready(function() {
    $('.kecamatan').select2({
        placeholder: 'Pilih Wilayah Kerja'
    });
    $('.jenis_alat_penangkap').select2({
        placeholder: 'Pilih Jenis Alat Penangkap'
    });
    $('.jenisikan').select2({
        placeholder: 'Pilih Jenis Ikan'
    });
    $('.jeniskapal').select2({
        placeholder: 'Pilih Jenis Kapal'
    });

    $('.enumerator').select2({
        placeholder: 'Pilih Enumerator'
    });
});
