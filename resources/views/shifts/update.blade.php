<html dir="rtl">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title></title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>עדכן משמרות</h1>
        <form action="{{ route('station.shifts', $station->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table style="border: 2px solid black">
                <tr>
                    <th>משמרת</th>
                    <th>ראשון</th>
                    <th>שני</th>
                    <th>שלישי</th>
                    <th>רביעי</th>
                    <th>חמישי</th>
                </tr>
                <tr>
                    <th>בוקר 8:00-14:00<br></th>
                    @foreach($station->shifts as $shift)
                        <td><input type="checkbox" name="shifts[]" value="{{ $shift->id }}">1</td>
                        @break($loop->index == 4)
                    @endforeach
                </tr>
                <tr>
                    <th>ערב 14:00-20:00<br></th>
                    @for($i=5; $i < 10; $i++)
                        <td><input type="checkbox" name="shifts[]" value="{{ $station->shifts[$i]->id }}">1</td>
                    @endfor
                </tr>

            </table><br>
            <button type='submit'>עדכן משמרות</button>
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        @include('sweet::alert')
    </body>
</html>