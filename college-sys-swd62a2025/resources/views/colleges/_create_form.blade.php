<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" value="{{ old('name', $college->name) }}"
                class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Enter the name of the college" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="address" value="{{ old('address', $college->address) }}" class="form-control @error('name') is-invalid @enderror" id="address" placeholder="Enter the address"/>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-action">Back to Colleges</button>
            <button class="btn btn-success">Submit</button>
        </div>
    </div>
</div>