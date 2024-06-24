<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('components.layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('components.layouts.navbar')

                <!-- Begin Page Content -->
                {{ $slot }}
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('components.layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    {{-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></ i>
    </a> --}}

    <!-- Tambah Kriteria Modal-->
    {{-- <div class="modal fade" id="addKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addKriteriaForm">
                                <div class="form-group">
                                    <label for="kodeKriteria">Kode</label>
                                    <input type="text" class="form-control" id="kodeKriteria" name="kodeKriteria" required>
                                </div>
                                <div class="form-group">
                                    <label for="namaKriteria">Nama</label>
                                    <input type="text" class="form-control" id="namaKriteria" name="namaKriteria" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenisKriteria">Jenis</label>
                                    <select class="form-control" id="jenisKriteria" name="jenisKriteria" required>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobotKriteria">Bobot</label>
                                    <input type="number" class="form-control" id="bobotKriteria" name="bobotKriteria" step="0.01" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div> --}}

    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        // Handle form submission for adding new criteria
        document.getElementById('addKriteriaForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var kode = document.getElementById('kodeKriteria').value;
            var nama = document.getElementById('namaKriteria').value;
            var jenis = document.getElementById('jenisKriteria').value;
            var bobot = document.getElementById('bobotKriteria').value;

            // Add the new row to the table
            var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            newRow.innerHTML = '<td>' + kode + '</td><td>' + nama + '</td><td>' + jenis + '</td><td>' + bobot +
                '</td><td><button class="btn btn-danger btn-sm">Hapus</button></td>';

            // Clear the form
            document.getElementById('addKriteriaForm').reset();
            $('#addKriteriaModal').modal('hide');
        });

        // Handle deletion of rows
        document.getElementById('dataTable').addEventListener('click', function(event) {
            if (event.target && event.target.matches('button.btn-danger')) {
                var row = event.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });
    </script>
    </div>

</body>

</html>
