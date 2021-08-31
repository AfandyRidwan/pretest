<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ini adalah halaman ubah data') }}
        </h2>
    </x-slot>

        <div class="card" style="width: 18rem; margin: 5rem">
                <div class="card-body">
                    <form action="/data/{{ $student->id }}" method="POST">
                        @method('patch')
                        @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Masukan Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ $student->nama }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Nama tidak boleh kosong.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label"> Masukan Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" placeholder="jurusan" name="jurusan" value="{{ $student->jurusan }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Jurusan tidak boleh kosong.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Masukan Alamat</label>
                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" placeholder="alamat" name="alamat" value="{{ $student->alamat }}">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            Alamat tidak boleh kosong.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Ubah Data</button>
                    </form>
                </div>
        </div>
</x-app-layout>
