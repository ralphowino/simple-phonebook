@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <a href="{{route('contacts.index')}}" class="btn btn-link"><i class="glyphicon glyphicon-arrow-left"></i> Back to Contacts</a></div>
            <div class="panel-body text-center">
                <img src="{{$contact->profile_image}}?s=240" class="img-circle">
                <h4>{{$contact->name}}</h4>
                <ul class="list-group text-left">
                    <li class="list-group-item">
                        <a href="mailto:{{$contact->email}}" title="Send an email">
                            <i class="glyphicon glyphicon-envelope"></i> {{$contact->email}}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="tel:{{$contact->phone}}" title="Call now">
                            <i class="glyphicon glyphicon-earphone"></i> {{$contact->phone}}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <strong class="list-group-item-heading">Notes:</strong>
                        <p>{{$contact->notes}}</p>
                    </li>
                </ul>

                <p>
                    <a href="mailto:{{$contact->email}}" class="btn btn-success btn-lg" role="button">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </a>
                    <a href="tel:{{$contact->phone}}" class="btn btn-success btn-lg" role="button">
                        <i class="glyphicon glyphicon-earphone"></i>
                    </a>
                    <a href="sms:{{$contact->phone}}" class="btn btn-success btn-lg" role="button">
                        <i class="glyphicon glyphicon-comment"></i>
                    </a>
                </p>


                <p>
                    <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-default" role="button">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteContact">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </p>
            </div>

        </div>

        <div class="modal fade" id="deleteContact" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('contacts.destroy',$contact->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Confirm Delete</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete {{$contact->name}} from your phonebook?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
