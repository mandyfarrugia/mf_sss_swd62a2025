<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Enter the name of the college" name="name"/>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter the address" name="address"/>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-action">Back to Colleges</button>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</div>