@extends("partials/layout")

@section("main")
<section class="w-[500px] mx-auto flex-1 flex flex-col gap-3">
        <form class="flex flex-col gap-3" action="/login" method="post" novalidate>
            @csrf

            <h3 class="text-xl text-center text-gray-500">Login</h3>

            @if(Session::has("success"))
            <div class="border border-green-700 bg-green-700 text-white rounded px-3 py-2 text-sm text-center my-5">{{ Session::get("success") }}</div>
            @endif

            @error("error")
            <div class="border border-red-700 bg-red-700 text-white rounded px-3 py-2 text-sm text-center my-5">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="email">Nama</label>
                <input id="email" name="email" type="email" class="rounded text-sm px-3 py-2" />
                @error("email")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="rounded text-sm px-3 py-2" />
                @error("password")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group flex flex-row justify-between gap-3 items-center">
                <a href="{{ url('register') }}" tabindex="-1" class="text-blue-500">Daftar</a>
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </section>
@endsection