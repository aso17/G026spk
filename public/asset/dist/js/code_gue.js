
        // table karyawan
        $(function() {
            $("#blmada").DataTable({
                "responsive": true,
                "autoWidth": false,
                "autoWidth": false,
            });
            $("#proses").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": true,
                "scrollY": 150,
                "paging": true,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Proses karyawan',
                    action: function() {
                        window.location.href = "/detailproses"
                    }
                }]
            });
            $("#hasil").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "scrollY": 150,
                "paging": false,
                
            });
            $("#karyawan").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "scrollY": 350,
                "paging": true,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Tambah Data',
                    action: function() {
                        window.location.href = "/karyawan/tambah"
                    }
                }]
            });
            $("#user").DataTable({

                "responsive": true,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "scrollY": 300,
                "paging": false,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Create User',
                    action: function() {
                        window.location.href = "/user/tambah"
                    }
                }]
            });
            $("#kriteria").DataTable({

                "responsive": false,
                "autoWidth": true,
                "info": false,
                "lengthChange": false,
                "paging": false,
                dom: 'Bfrtip',
                buttons: [{
                    text: 'Creat kriteria',
                    position: 'top-end',
                    action: function() {
                        window.location.href = "/kriteria/tambah"
                    }
                }]
            });
            
           
        });

        
        // function logConfirm(url) {
        //     $('#btn-log').attr('href', url);
        //     $('#logoutmodal').modal();
        // }

      
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        })      
           
        // delete confim
        // function deleteConfirm(url) {
        //     // $('#btn-delete').attr('href', url);
        //     $('#deleteModal').modal();
        // }
        