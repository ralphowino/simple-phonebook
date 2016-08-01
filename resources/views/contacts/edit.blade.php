@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="panel-body">
            <form action="{{route('contacts.update',$contact->id)}}" method="POST" role="form">
                {{csrf_field()}}
                {{method_field('PUT')}}

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name"
                           value="{{$contact->first_name}}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name"
                           value="{{$contact->last_name}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                           value="{{$contact->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                           value="{{$contact->phone}}">
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" placeholder="" rows="5"
                    >{{$contact->notes}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('contacts.show', $contact->id)}}" role="button" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
@endsection
