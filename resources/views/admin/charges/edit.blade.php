@extends('admin.app')
@section('content')
    <div class="row">
        <form action="/admin/charges/{{$charge->id}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Name</label>
                <select id='name' class="form-control custom-select mt-15" name="name">
                    <option value="minibar" {{ old('name') ?? $charge->name == 'Minibar' ? 'selected' : '' }}>Minibar</option>
                    <option value="laundry" {{ old('name') ?? $charge->name == 'laundry' ? 'selected' : '' }}>laundry</option>
                    <option value="restaurant" {{ old('name') ?? $charge->name == 'Restaurant' ? 'selected' : '' }}>Restaurant</option>
                    <option value="fine" {{ old('name') ?? $charge->name == 'Fine' ? 'selected' : '' }}>Fine</option>
                    <option value="other" {{ old('name') ?? $charge->name == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="price">Price</label>
                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" value="{{old('price') ?? $charge->price }}"/>
                @error('price') {{ $message }} @enderror
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="money" name="money" {{ old('money') ?? $charge->money == 'green_paid' ? 'checked' : '' }}/>Paid
                    </label>
                </div>
            </div>
            <input type="hidden" name="admin_id" value="{{ $admin }}">
            <div class="tile-footer">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                <a class="btn btn-sm btn-secondary" href="/admin/charges/{{$charge->id}}/index"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
    </div>
@endsection
