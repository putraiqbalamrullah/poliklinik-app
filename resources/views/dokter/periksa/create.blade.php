<x-layouts.app title="Pemeriksaan Pasien">
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <h1 class="mb-4">Pemeriksaan Pasien</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('periksa.store') }}" method="POST">
                            @csrf

                            {{-- ID PASIEN --}}
                            <div class="form-group mb-3">
                                <label for="id_pasien">ID Pasien</label>
                                <input type="number"
                                       name="id_pasien"
                                       id="id_pasien"
                                       class="form-control @error('id_pasien') is-invalid @enderror"
                                       value="{{ old('id_pasien') }}"
                                       required>
                                @error('id_pasien')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ID DOKTER --}}
                            <input type="hidden" name="id_dokter" value="{{ auth()->user()->id }}">

                            {{-- OBAT --}}
                            <div class="form-group mb-3">
                                <label for="id_obat">Pilih Obat</label>
                                <select name="id_obat"
                                        id="id_obat"
                                        class="form-control @error('id_obat') is-invalid @enderror"
                                        required>
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}">
                                            {{ $obat->nama_obat }} (Stok: {{ $obat->stok }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_obat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- JUMLAH --}}
                            <div class="form-group mb-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="number"
                                       name="jumlah"
                                       id="jumlah"
                                       class="form-control @error('jumlah') is-invalid @enderror"
                                       min="1"
                                       required>
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Simpan Pemeriksaan
                                </button>
                                <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>