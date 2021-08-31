<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ini adalah halaman data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Data Mahasiswa</h2>
                        <a href="{{ url('/tambah') }}">
                            <button type="button" class="btn btn-success" style="margin: 10px;">Tambah Data
                            </button>
                        </a>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    <div class="container">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $students as $student )
                                <tr>
                                    <th>{{ $student->id }}</th>
                                    <th>{{ $student->nama }}</th>
                                    <th>{{ $student->jurusan }}</th>
                                    <th>{{ $student->alamat }}</th>
                                    <th>
                                        <a href="{{ $student->id }}/edit" class="badge bg-info">Edit</a>
                                        <form action="/data/{{ $student->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger">Hapus</button>
                                        </form>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
