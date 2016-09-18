{{ csrf_field() }}
<!-- text input -->
<div class="form-group">
  <label>Street:</label>
  <input type="text" id="street" class="form-control" name="street" placeholder="Enter Street..." value="{{ old('street') }}">
</div>
<div class="form-group">
  <label>City:</label>
  <input type="text" id="city" class="form-control" name="city" placeholder="Enter City..." value="{{ old('city') }}">
</div>

<div class="form-group">
  <label>Zip/Postal Code:</label>
  <input type="text" id="zip" class="form-control" name="zip" placeholder="Enter zip/postal code..." value="{{ old('zip') }}">
</div>

<!-- select zip/postal code-->
<div class="form-group">
  <label>Country:</label>
  <select class="form-control" name="country">
    @foreach(	$countries::all() as $country => $code )
    	<option value="{{ $code }}">{{ $country }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label>State:</label>
  <input type="text" id="state" class="form-control" name="state" placeholder="Enter state..." value="{{ old('state') }}">
</div>

<div class="form-group">
  <label>Price:</label>
  <input type="text" id="price" class="form-control" name="price" placeholder="Enter price..." value="{{ old('price') }}">
</div>

<div class="form-group">
	<label>Description:</label>
	<textarea class="textarea" name="description"  placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
</div>

<div class="form-group">
  <button type="submit" class="btn btn-danger btn-lg">Create Flyer</button>
</div> 