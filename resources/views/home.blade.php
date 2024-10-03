@extends("partials/layout")

@section("head")
    @vite("resources/js/app.js")
@endsection

@section("main")
    <section class="w-[500px] mx-auto py-5">
        <form id="frmTodo" class="flex flex-col gap-3" method="post" action="/todo">
            @csrf

            <div class="flex flex-col">
                <label for="title" clas="text-sm">Judul</label>
                <input id="title" name="title" type="text" class="rounded px-3 py-2 text-sm transition-all duration-200" placeholder="ketikkan judul" value="{{ old('title')}}" />
                @error("title")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="description" clas="text-sm">Deskripsi</label>
                <input id="description" name="description" type="text" class="rounded px-3 py-2 text-sm transition-all duration-200" placeholder="ketikkan deskripsi" value="{{ old('description')}}" />
                @error("description")
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-row justify-between gap-3 items-center">
                <a href="/logout" class="btn btn-default" tabindex="-1">Logout</a>
                <button class="btn btn-primary" type="submit">Tambahkan</button>
            </div>
        </form>
    </section>

    <hr />

    <div class="bg-slate-200 flex-1">
        <section class="card-list w-[500px] mx-auto flex-1 flex flex-col gap-3 max-h-full h-full py-5">
            <form action="/" method="GET" novalidate>
                <div class="form-group">
                    <input name="search" type="text" class="rounded px-3 py-2 text-sm transition-all duration-200" placeholder="Cari berdasarkan judul" @if($search) value="{{ $search }}" @endif />
                </div>
            </form>

            @if(count($todos) <= 0)
                <div class="text-center text-2xl text-gray-500">Tidak ada data todo</div>
            @else
                @foreach($todos as $todo)
                <div class="card p-3">
                    <div class="flex flex-row items-start gap-3">
                        <div>
                            <input type="checkbox" class="chk-set-complete rounded" data-id="{{ $todo->id }}" @if($todo->is_completed) checked @endif />
                        </div>
                        <div class="flex-1 flex-shrink-0">
                            <div class="font-bold text-gray-700 text-sm">{{ $todo->title }}</div>
                            <div>{{ $todo->description }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <button class="delete-todo btn btn-accent" data-id="{{ $todo->id }}">Delete</button>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </section>
    </div>
@endsection