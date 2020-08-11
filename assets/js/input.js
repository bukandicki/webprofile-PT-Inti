$(document).ready(function () {
  // $('#l').on('change', function () {
  //   var file = $(this)[0].files;
  //   if (file.length < 1) {
  //     alert("Prestasi belum dipilih");
  //   }
  //   else {
  //     $('#span_file1').html("<i class='fas fa-check'></i> <i style='color: red;'>" +file.length+ "</i> Prestasi Berhasil Dipilih");
  //   }
  // });

    $('.form-control-formulir').each(function () {
    floating($(this));
  });
  
  $('.form-control-formulir').on('focusout', function () {
    floating($(this));
  });
  
  $('.input-date').each(function () {
    floating($(this));
  });
  
  $('.input-date').on('focusout', function () {
    floating($(this));
  });

  $('#username-modal').each(function () {
    floatingModal($(this));
  });
  
  $('#username-modal').on('focusout', function () {
    floatingModal($(this));
  });

  $('#password-modal').each(function () {
    floatingModal($(this));
  });
  
  $('#password-modal').on('focusout', function () {
    floatingModal($(this));
  });
  
  function floatingModal($inputann) {
    if ($inputann.val().length > 0) {
      $inputann.addClass('modal-val');
      $inputann.css('border-color','#2196f3');
    }
    else {
      $inputann.css('border-color','#69645a');
      $inputann.removeClass('modal-val');
    }
  }

  function floating($formkontrol) {
    if ($formkontrol.val().length > 0) {
      $formkontrol.addClass('form-val');
      $formkontrol.css('border-color','#2196f3');
    }
    else {
      $formkontrol.css('border-color','#69645a');
      $formkontrol.removeClass('form-val');
    }
  }

  $('#l-1').on('change', function () {
    cekKosong(this);
  });

  $('#l-2').on('change', function () {
    cekKosong(this);
  });

  $('#l-3').on('change', function () {
    cekKosong2(this);
  });

  $('#l-4').on('change', function () {
    cekKosong(this);
  });
    $('#form-inputan').change(function () {
      var file_a = $('#photo-lamaran')[0].files.length;
      var file_b = $('#l-1')[0].files.length;
      var file_c = $('#l-2')[0].files.length;
      var file_d = $('#l-3')[0].files.length;
      var file_e = $('#l-4')[0].files.length;
      if (file_a >= 1 && file_b >= 1 && file_c >= 1 && file_d >= 1 && file_e >= 1 && $('#nama').val().length != 0 && $('#tempat').val().length != 0 && $('#telepon').val().length != 0 && $('#alamat').val().length != 0 && $('#email').val().length != 0 && $('#tanggal').val().length != 0) {
        $('#selesai').removeAttr('disabled');
        $('#selesai').removeClass('form-gagal');
        $('#selesai').html('selesai');
        $('#selesai').css('background','rgb(33, 150, 243)');
      }else {
        $('#selesai').attr('disabled','disabled');
        $('#selesai').addClass('form-gagal');
        $('#selesai').html('Form anda belum selesai terisi');
      }
    });

  // $('#l_4').on('change', function () {
  //   var file = $(this)[0].files;
  //   if (file.length == 1) {
  //     $('#span_file4').html("<i class='fas fa-check'></i> Selesai Dipilih");
  //   }
  //   else {
  //     alert("Anda Belum Memasukan File Scan SKCK");
  //   }
  // });
  $("#photo-lamaran").on("change", function () {
    tampilGambar(this);
  });
  function tampilGambar(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var ekstensi = ['jpg','png','jpeg'];
    var eks_file = input.files[0].name;
    var jumlah_f = input.files.length;
    var ukuran_foto = input.files[0].size;
    var fileNameExt = eks_file.substr(eks_file.lastIndexOf('.') + 1);
      if ($.inArray(fileNameExt, ekstensi) == -1 || ukuran_foto == 500000) {
        input.type = ''
        input.type = 'file'
        $('#preview').attr('src',"");
        $('#keterangan-foto').html("Hanya dapat mengupload dengan ekstensi : "+ekstensi.join(', ') + " Atau File Yang Anda Masukan Terlalu Besar");
      }else {
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
          $('#keterangan-foto').html("");
        }
      }

    reader.readAsDataURL(input.files[0]);
  }
  return jumlah_f;
}

function cekKosong(inputan) {
  var ekstensi_diperbolehkan = ['jpg','png','jpeg','pdf'];
  var nama_file = inputan.files[0].name;
  var jumlah_file = inputan.files.length;
  var ukuran = inputan.files[0].size;
  var id = inputan.id;
  var keputusan = false;
  var ekstensi_file = nama_file.substr(nama_file.lastIndexOf('.') + 1);
    if ($.inArray(ekstensi_file, ekstensi_diperbolehkan) == -1 || ukuran > 500000) {
      inputan.type = ''
      inputan.type = 'file'
      $('#keterangan-lampiran').html(inputan.className + " Hanya dapat mengupload : " + ekstensi_diperbolehkan.join(', ') + " Atau File <span style='color:#2196f3;'>"+ nama_file +"</span> Terlalu Besar");
      $('#span-file'+id.slice(-1)).html("<i class='fas fa-times'></i> Dibatalkan");
      jumlah_file.reset();
    }else {
      $('#span-file'+id.slice(-1)).html("<i class='fas fa-check'></i> " + nama_file);
      $('#keterangan-lampiran').html('');
    }
  return jumlah_file;
}

function cekKosong2(inputan) {
  var ekstensi_diperbolehkan = ['pdf','doc','docx'];
  var nama_file = inputan.files[0].name;
  var jumlah_file2 = inputan.files.length;
  var ukuran2 = inputan.files[0].size;
  var ekstensi_file = nama_file.substr(nama_file.lastIndexOf('.') + 1);
  var id = inputan.id;
    if ($.inArray(ekstensi_file, ekstensi_diperbolehkan) == -1 || ukuran2 > 500000) {
      inputan.type = ''
      inputan.type = 'file'
      $('#keterangan-lampiran').html(inputan.className + " Hanya dapat mengupload : " + ekstensi_diperbolehkan.join(', ') + " Atau File <span style='color:#2196f3;'>"+ nama_file +"</span> Terlalu Besar");
      $('#span-file'+id.slice(-1)).html("<i class='fas fa-times'></i> Dibatalkan");
      jumlah_file2.reset();
    }else {
      $('#span-file'+id.slice(-1)).html("<i class='fas fa-check'></i> " + nama_file);
      $('#keterangan-lampiran').html('');
    }
  return jumlah_file2;
}

  $("#photo-lamaran").on('change', function() {
    tampilGambar(this);
  });
});
