@extends('layouts.app')

@section('content')
<body style="background-color: #CCEEFF;">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div align="center" style="font-size: 50px; margin-bottom: 30px;"class="card-header"><font color="#99BBFF">Wellcome {{ $user->name }} !!</font></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 color="#AAAAAA">您的個人資料</h4>
                        <li>使用者 ID : {{ $user->id }}
                        <li>使用者名稱: {{ $user->name }}
                        <li>使用者 E-mail : {{ $user->email }}
                    </div>
                </div>
                
                <div class="links" align="center" >
                    <a href="/post"><font style="font-size: 20px;"color="red">Go To Articles Page</font></a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
