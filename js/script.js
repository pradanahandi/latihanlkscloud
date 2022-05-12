$(document).ready(function(){

    //user
    $('#Adduser').on('show.bs.modal', function (e) {
        //menggunakan fungsi ajax untuk pengambilan data
        var URL = $(e.relatedTarget).data('url');
        $.ajax({
            type : 'GET',
            url : URL,
            success : function(data){
            $('.fetch-Adduser').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#Edituser').on('show.bs.modal', function (e) {
        var id_user = $(e.relatedTarget).data('id');
        console.log(id_user);
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'GET',
            url : 'content/modal.php?ubah=user',
            data :  'id_user='+ id_user,
            success : function(data){
            $('.fetch-Edituser').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#Detailuser').on('show.bs.modal', function (e) {
            var id_user = $(e.relatedTarget).data('id');
            console.log(id_user);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?detail=user',
                data :  'id_user='+ id_user,
                success : function(data){
                $('.fetch-Detailuser').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //user

    //mobil
    $('#TambahMobil').on('show.bs.modal', function (e) {
        //menggunakan fungsi ajax untuk pengambilan data
        var URL = $(e.relatedTarget).data('url');
        $.ajax({
            type : 'GET',
            url : URL,
            success : function(data){
            $('.fetch-TambahMobil').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#EditMobil').on('show.bs.modal', function (e) {
        var id_mobil = $(e.relatedTarget).data('id');
        console.log(id_mobil);
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'GET',
            url : 'content/modal.php?ubah=mobil',
            data :  'id_mobil='+ id_mobil,
            success : function(data){
            $('.fetch-EditMobil').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#DetailMobil').on('show.bs.modal', function (e) {
            var id_mobil = $(e.relatedTarget).data('id');
            console.log(id_mobil);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?detail=mobil',
                data :  'id_mobil='+ id_mobil,
                success : function(data){
                $('.fetch-DetailMobil').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //mobil

    //pesanmobil
    $('#PesanMobil').on('show.bs.modal', function (e) {
            var id_mobil = $(e.relatedTarget).data('id');
            console.log(id_mobil);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?pesan=pesanmobil',
                data :  'id_mobil='+ id_mobil,
                success : function(data){
                $('.fetch-PesanMobil').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //pesanmobil

    //konfirmasibayar
    $('#KonfirmasiBayar').on('show.bs.modal', function (e) {
            var id_transaksi = $(e.relatedTarget).data('id');
            console.log(id_transaksi);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?konfirmasi=konfirmasibayar',
                data :  'id_transaksi='+ id_transaksi,
                success : function(data){
                $('.fetch-KonfirmasiBayar').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //konfirmasibayar

    //detailtransaksi
    $('#DetailTransaksi').on('show.bs.modal', function (e) {
            var id_transaksi = $(e.relatedTarget).data('id');
            console.log(id_transaksi);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?detail=detailtransaksi',
                data :  'id_transaksi='+ id_transaksi,
                success : function(data){
                $('.fetch-DetailTransaksi').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //detailtransaksi

    //ubahtransaksimobil
    $('#UbahTransaksiMobil').on('show.bs.modal', function (e) {
            var id_transaksi = $(e.relatedTarget).data('id');
            console.log(id_transaksi);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?ubah=ubahtransaksimobil',
                data :  'id_transaksi='+ id_transaksi,
                success : function(data){
                $('.fetch-UbahTransaksiMobil').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //ubahtransaksimobil

    //detailtransaksimobil
    $('#DetailTransaksiMobil').on('show.bs.modal', function (e) {
            var id_transaksi = $(e.relatedTarget).data('id');
            console.log(id_transaksi);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?detail=detailtransaksimobil',
                data :  'id_transaksi='+ id_transaksi,
                success : function(data){
                $('.fetch-DetailTransaksiMobil').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //detailtransaksimobil

    //detailkonfirmasi
    $('#DetailKonfirmasi').on('show.bs.modal', function (e) {
            var id_konfirmasi = $(e.relatedTarget).data('id');
            console.log(id_konfirmasi);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'GET',
                url : 'content/modal.php?detail=detailkonfirmasi',
                data :  'id_konfirmasi='+ id_konfirmasi,
                success : function(data){
                $('.fetch-DetailKonfirmasi').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    //detailkonfirmasi

});

