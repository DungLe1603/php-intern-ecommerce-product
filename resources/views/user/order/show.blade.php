@extends('user.layout')

@section('content')
   <!-- SECTION -->
   <div class="section" style="min-height:400px">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12 text-center" style="margin-top:8%">
                    <h1 class="display-2">{{$info['title']}}</h1>
                    <p>{{$info['body']}}</p>
                    @if (!empty($info['link']))
                        <a href="{{$info['link']}}">Download Invoice</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection