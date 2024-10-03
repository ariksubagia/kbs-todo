@extends("partials/layout")

@section("main")
    <section class="w-[500px] mx-auto flex-1">
        <form class="flex flex-col gap-3" action="/register" method="post" novalidate>
            @csrf

            <h3 class="text-xl text-center text-gray-500">Register</h3>

            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" name="name" type="text" class="rounded text-sm px-3 py-2" value="{{ old('name') }}" />
                @error("name")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="rounded text-sm px-3 py-2"  value="{{ old('email') }}" />
                @error("email")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="rounded text-sm px-3 py-2" value="{{ old('password') }}" />
                @error("password")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="repassword">Ulangi Password</label>
                <input id="repassword" name="repassword" type="password" class="rounded text-sm px-3 py-2" value="{{ old('repassword') }}" />
                @error("repassword")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group flex flex-row justify-between gap-3 items-center">
                <a href="{{ url('login') }}" class="text-blue-500">Login</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </section>
@endsection