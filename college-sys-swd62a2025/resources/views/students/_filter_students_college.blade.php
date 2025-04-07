<label for="filter_college_id">Filter students by college</label>
<select id="filter_college_id" class="form-control">
    @foreach ($colleges as $id => $name)
        <option {{ $id == request('college_id') ? 'selected' : '' }} value="{{ $id }}">
            {{ $name }}
        </option>
    @endforeach
</select>