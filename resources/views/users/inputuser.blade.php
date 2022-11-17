<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  
    <div class="container">
        <div class="row">
            <div class="col">

                <h2>Form Input User</h2>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf                   
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input name="name" type="name" class="form-control" id="name" placeholder="Ketikkan nama anda" >
                      @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input name="email" type="email" class="form-control" placeholder="Masukkan Email anda" aria-describedby="emailHelp">
                      @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                    </div>
                    @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                    @enderror
                   
                    <div class="mb-3">
                      <label for="examplephone" class="form-label">No. HP</label>
                      <input name="phone" type="text" class="form-control" placeholder="Masukkan No. hp">
                    </div>
                    @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                    @enderror

                    <div class="mb-3">
                      {{-- @dd($role); --}}
                      <label for="role_id" class="form-label">role_id</label>
                      <select multiple class="form-control" name="role_id[]" id="role_id">
                        @foreach ($role as $rl)
                            
                        <option value="{{ $rl->id }}">{{ $rl->id }}-{{ $rl->name }} </option>
                        @endforeach    
                            
                        
                      </select>
                      
                      @error('role_id')
                      <div class="alert alert-danger mt-2">
                      {{ $message }}
                      </div>
                      @enderror


                    <div class="mb-3 form-check">
                     
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
            </div>

        </div>

    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>