@extends('layouts.master')

        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">--}}
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
@section('content')
        <style>
            table {
                /*border: 2px solid black;*/
            }
            th, td {
                /*border: 1px solid black;*/
                /*padding: 5px;*/
                text-align: center;
            }
            input[type='checkbox']{
                zoom: 2;
            }
        </style>
    </head>
        <h1 class="service-description">עדכן משמרות</h1>
        <h4>
            @if($station->id == 1)
                {{ "פומנטו" }}
            @elseif($station->id == 2)
                {{ "ווסטון" }}
            @else
                {{ "כלכלה" }}
            @endif
        </h4>
        <form action="{{ route('station.shifts', $station->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">משמרת</th>
                        <th scope="col">ראשון</th>
                        <th scope="col">שני</th>
                        <th scope="col">שלישי</th>
                        <th scope="col">רביעי</th>
                        <th scope="col">חמישי</th>
                    </tr>
                    <tr>
                        <th scope="row">בוקר 8:00-14:00<br></th>
                        @foreach($station->shifts as $shift)
                            <td><input type="checkbox" name="shifts[]" value="{{ $shift->id }}"
                                        {{ \App\Http\Controllers\StationShiftController::isUserCheckThisShiftAlready($shift) }}
                                >{{--this line call a function that checks the checkbox if the user is already listed in the current shift--}}
                            </td>
                            @break($loop->index == 4)
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row">ערב 14:00-20:00<br></th>
                        @for($i=5; $i < 10; $i++)
                            <td><input type="checkbox" name="shifts[]" value="{{ $station->shifts[$i]->id }}"
                                        {{ \App\Http\Controllers\StationShiftController::isUserCheckThisShiftAlready( $station->shifts[$i]) }}
                                >{{--this line call a function that checks the checkbox if the user is already listed in the current shift--}}
                            </td>
                        @endfor
                    </tr>
                </table><br>
            </div>

            <div class="container">
                <div class="text-center">
                    {{--<input type="submit" value="דווח!">--}}
                    <button type="submit" class="btn login-btn" >עדכן משמרות</button>
                </div>
            </div>
        </form>
        <form action="{{ route('station.shifts', $station->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="text-left">
                    {{--<input type="submit" value="דווח!">--}}
                    <button type="submit" class="btn" >נקה משמרות</button>
                </div>
            </div>
            {{--<button type='submit'>נקה משמרות</button>--}}
        </form>

        @endsection

