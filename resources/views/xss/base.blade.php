@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="thumbnail">
                    <!--
                        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    -->
                    <div class="caption-full">
                        <h4><a href="#">Cross Site Scripting (XSS) – Stored</a></h4>

                        <p align="justify">
                            Stored Cross Site Scripting attacks happen when the application doesn’t validate user inputs against malicious scripts, and it occurs when these scripts get stored on the database. Victim gets infected when they visit web page that loads these malicious scripts from database. For instances, message forum, comments page, visitor logs, profile page, etc.
                        </p>
                        <p>
                            Read more about Stored XSS <br>
                            <strong><a target="_blank" href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)#Stored_XSS_Attacks">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)#Stored_XSS_Attacks</a></strong>
                        </p>
                    </div>

                </div>

                <div class="well">
                    <form method="post" action="{{ url('/xss/base') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Enter News Name</label>
                            <input class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Enter News Content</label>
                            <textarea class="form-control" name="content">{!! old('content') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default">Store</button>
                        </div>
                    </form>
                </div>
                @if(empty($error) && !empty($results))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Item ID:</th>
                            <th>Item Name:</th>
                            <th>Item Content:</th>
                            <th>Created at:</th>
                            <th>Updated at:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            @if($safe)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->content }}</td>
                                    <td>{{ $result->created_at }}</td>
                                    <td>{{ $result->updated_at }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>{!! $result->id !!}</td>
                                    <td>{!! $result->name !!}</td>
                                    <td>{!! $result->content !!}</td>
                                    <td>{!! $result->created_at !!}</td>
                                    <td>{!! $result->updated_at !!}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {!! $results !!}
                @endif
            </div>
        </div>
    </div>
@endsection