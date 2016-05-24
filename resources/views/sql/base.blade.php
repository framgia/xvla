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
                    <h4><a href="#">SQL Injection – Error Based</a></h4>

                    <p align="justify">
                        SQL injection considerably one of the most critical issues in application security is an attack technique by which a malicious user can run SQL code with the privilege on which the application is configured. Error based SQL injections are easy to detect and exploit further. It responds to user’s request with detailed backend error messages. These error messages are generated because of specially designed user requests such that it breaks the SQL query syntax used in the application.
                    </p>
                    <p>
                        Read more about SQL Injection <br>
                        <strong><a target="_blank" href="https://www.owasp.org/index.php/SQL_Injection">https://www.owasp.org/index.php/SQL_Injection</a></strong>
                    </p>
                </div>

            </div>

            <div class="well">
                <p>Search by Itemcode or use search option</p>
                @if($error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endif
                <form method="get" action="">
                    <div class="form-group">
                        <label class="control-label">Select ID</label>
                        <select class="form-control" name="item">
                            <option value="">Select Item Code</option>
                            @foreach($items as $id => $name)
                                <option value="{{ $id }}" {{ $item == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Seach by ID or name</label>
                        <input class="form-control" name="search" value="{{ $search }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
            @if(empty($error) && !empty($results))
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item ID:</th>
                            <th>Item Name:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection