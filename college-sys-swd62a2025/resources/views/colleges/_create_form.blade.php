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
            <a class="btn btn-action" href="{{ route('colleges.index') }}">Back to Colleges</a>
            <input class="btn btn-success" type="submit" value="Submit"/>
        </div>
    </div>
</div>