$(function() {
    $('#tombol-tambah-data').on('click', function() {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('tambah Data Mahasiswa');
            $('#nama').val('');
            $('#nrp').val('');
            $('#email').val('');
            $('#jurusan').val('');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data Mahasiswa');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
        
    });

    $('#keyword').on('keyup', function() {
        let keyword = $('#keyword');
        let card = '';
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/cari',
            data: {keyword : keyword.val()},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                let result = data.result;
                if (result.length !== 0) {
                    result.forEach(d => {
                        card += `
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    ${d.nama}
                                    <div>
                                        <a href="http://localhost:8080/phpmvc/public/mahasiswa/detail/${d.id}" class="text-decoration-none">
                                            <span class="badge bg-primary">detail</span>
                                        </a>
                                        <a href="http://localhost:8080/phpmvc/public/mahasiswa/ubah/${d.id}" class="text-decoration-none tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal"data-${d.id}="${d.id}" >
                                            <span class="badge bg-warning">ubah</span>
                                        </a>
                                        <a onclick="return confirm('hapus?');" href="http://localhost:8080/phpmvc/public/mahasiswa/hapus/${d.id}" class="text-decoration-none">
                                            <span class="badge bg-danger">hapus</span>
                                        </a>
                                    </div>
                                </li>
                                `;
                        $('h3.mt-3').html('daftar mahasiswa');
                        $('.list-group').html(card);
                    });
                } else {
                    $('h3.mt-3').html('<h2>data tidak ditemukan</h2>');
                    $('.list-group').html('');
                }
            }
        });
    })

});