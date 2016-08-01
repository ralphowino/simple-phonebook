@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    <a href="{{route('contacts.create')}}" class="btn btn-success btn-lg btn-block">
                        Add Contact
                    </a>
                </p>

                <form action="{{route('contacts.index')}}" method="GET" role="form" class="form-inline">
                    <p class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{$search}}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Find!</button>
                        </span>
                    </p><!-- /input-group -->
                </form>
                <div class="list-group">
                    @forelse($contacts as $contact)
                        <a href="{{route('contacts.show',$contact->id)}}" class="list-group-item" style="padding: 0;">
                        <span class="row">
                            <span class="col-xs-3">
                                <img src="{{$contact->profile_image}}?s=32" class="img-responsive">
                            </span>
                            <span class="col-xs-9">
                                <h4>{{$contact->name}}</h4>
                            </span>
                        </span>
                        </a>
                        @empty
                        <div class="alert alert-info">
                            <p>No contacts added yet!</p>
                        </div>
                    @endforelse
                </div>
                <div>
                    <div class="pull-left" style="margin:24px 0;">
                        <p>{{$contacts->count()}} / {{$contacts->total()}} Contacts</p>
                    </div>
                    <div class="pull-right">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
