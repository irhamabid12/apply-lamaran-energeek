<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplly Lamaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-select.min.css") }}">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center">
           <div class="col-12 text-center mb-4">
                <img class="logo" src="{{ asset("img/energeek-logo.png") }}" alt="energeek-logo">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Apply Lamaran</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="needs-validation" action="/insert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Cth: Jhonatan Akbar">
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select class="form-select" id="jabatan" name="jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($jobs as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Cth: 081323817754">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Cth: energeekmail@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Tahun Lahir</label>
                                <input type="text" class="form-control" id="year" name="year" placeholder="Pilih tahun">
                            </div>
                            <div class="mb-3">
                                <label for="set_skill" class="col-12 form-label">Set Skill</label>
                                <div class="multiselect">
                                    <select class="selectpicker" style="width: 600px" multiple id="set_skill" name="set_skill[]" data-live-search="true" size="7" placeholder="Pilih skill">
                                        @foreach ($skills as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" name="apply" class="btn btn-danger">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{ asset("js/virtual-select.min.js") }}"></script>
    <script>
        dselect(document.querySelector('#jabatan'),{
            search: true
        })

        $(document).ready(function(){
            $("#year").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                autoclose:true
            });   
        })

        // VirtualSelect.init({ 
        // ele: '#set_skill' 
        // });
    </script>
    <script src="{{ asset("js/main.js") }}"></script>
  </body>
</html>