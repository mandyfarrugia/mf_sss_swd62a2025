<select name="college_id" id="college_id" class="form-control" name="college_id">
    @foreach ($colleges as $id => $name)
        <option {{ $id == request('college_id') ? 'selected' : '' }} value="{{ $id }}">
            {{ $name }}
        </option>
    @endforeach
</select>