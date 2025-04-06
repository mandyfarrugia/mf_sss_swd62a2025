<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{ old('name', $student->name) }}"
                class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Enter the student's full name" name="name" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="email" value="{{ old('email', $student->email) }}"
                class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Enter an email address" name="email" />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" value="{{ old('phone', $student->phone) }}"
                class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter an phone number"
                name="phone" />
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dob">Date of birth</label>
            <input type="date" value="{{ old('dob', $student->dob) }}"
                class="form-control @error('dob') is-invalid @enderror" id="dob" placeholder="Enter the date of birth"
                name="dob" />
            @error('dob')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="college_id" id="college_id" class="form-control @error('college_id') is-invalid @enderror"
                name="college_id">
                @foreach ($colleges as $id => $name)
                    <option {{ $id == old('college_id', $student->college_id) ? 'selected' : '' }} value="{{ $id }}">
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @error('college_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <a class="btn btn-action" href="{{ route('students.index') }}">Back to Colleges</a>
            <a class="btn btn-success" href="{{ route('students.store') }}">Submit</a>
        </div>
    </div>
</div>