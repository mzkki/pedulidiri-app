@extends('auth.index')

@section('auth')
<div class="position-absolute top-50 start-50 translate-middle">
    <h4 class="text-center">Register</h4>
    <form action="/register" method="POST">
        @csrf
        <div class="form-floating mb-3">
            <input type="number" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, maxLength);" maxlength="16" class="form-control @error('nik') is-invalid @enderror formlogin" id="floatingInput" placeholder="28282828" name="nik">
            <label for="floatingInput">NIK</label>
            @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @else
            <div class="text-muted mt-1" style="font-size: 10pt">Kode NIK Harus 16 Digit</div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="text" class="form-control @error('fullname') is-invalid @enderror formlogin" id="floatingPassword" placeholder="text" name="fullname">
            <label for="floatingPassword">Nama Lengkap</label>
            @error('fullname')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="/login" class="btn">Sudah Punya Akun</a>
            </div>
            <div class="col text-end">
                <button class="btn" type="submit">Daftar</button>
            </div>
        </div>
    </form>
</div>
@endsection
