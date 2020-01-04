@extends('layout.base')
@push('styles')
    
@endpush

@push('scripts-after-body')
    <script src="{{asset('js/crud.js')}}"></script>
    <script src="{{asset('js/contact-validation.js')}}"></script>
@endpush

@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
@endpush

@section('title', 'Home')

@section('content')
    <div class='container'>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="display-3">Contacts</h1> 
                <div class='row'>
                    <div class='col-md-6'>
                        <button style="margin: 19px;" id='modal-btn'  data-target="#contact-form" class="btn btn-primary">New contact</button>
                    </div>     
                    <div class='col-md-6 align-middle' style='padding-top:3vh;'>
                        <div class="input-group">
                            <input id='search' name='search' type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Number</td>
                        <td colspan=2></td>
                    </tr>
                </thead>
                <tbody id='contacts-list' name='contacts-list'>
                    @foreach($contacts as $contact)
                    <tr id="contact{{$contact->id}}">
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td>
                            <button class="btn btn-primary open-modal" value="{{$contact->id}}">Edit</button>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-contact" value="{{$contact->id}}" type="submit">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
        </div>
    </div>
@include('inc.modal-form')
@endsection