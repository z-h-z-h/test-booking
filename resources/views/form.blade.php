@extends('layout')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h2 class="card-title">
                Test Booking via API
            </h2>

            <form action="{{ route('handler') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                    @if ($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div> @endif
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control @if ($errors->has('phone')) is-invalid @endif" name="phone" id="phone" placeholder="Enter your phone" value="{{ old('phone') }}" required>
                    @if ($errors->has('phone')) <div class="invalid-feedback">{{ $errors->first('phone') }}</div> @endif
                </div>

                <div class="form-group ">
                    <label for="dates">Dates</label>
                    <input type="text" class="form-control @if ($errors->has('dates')) is-invalid @endif" name="dates" id="dates" placeholder="Select checkin and checkout dates" value="{{ old('dates') }}" required>
                    @if ($errors->has('dates')) <div class="invalid-feedback">{{ $errors->first('dates') }}</div> @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#phone').mask('+0 000 000 0000');

            $('#dates').daterangepicker({
                endDate: moment().startOf('day').add(1, 'day'),
                locale: {
                    format: 'DD.MM.YYYY'
                }
            });
        });
    </script>
@endsection
