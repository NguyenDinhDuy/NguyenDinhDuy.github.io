<option> Chọn Quân/ Huyện </option>
@if(!empty($districts))
    @foreach($districts as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif