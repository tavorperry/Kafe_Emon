<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <style>
        .blue {
            color: blue;
        }
        *{
            
            text-align: right;
            font-family: 'Varela Round', sans-serif;

        }
        h1{
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
<p dir="rtl">
            <h1 class="service-description"><b> דיווח מספר {{ $report->id }} </b></h1>
    <table>
     <tr> 
        <td>
             בניין
        </td>
         
        <td>   
            @if($report->station_id == 1)
                {{ "פומנטו" }}
            @elseif($report->station_id == 2)
                {{ "ווסטון" }}
            @else
                {{ "כלכלה" }}
            @endif
        </td>
     </tr>
    
     <tr>
         <td>
             סטטוס
         </td>    
         
         <td>
            @if($report->status == 0)
                פתוח - דרוש טיפול
            @else
                סגור - טופל עי"

                    {{\App\Http\Controllers\ReportController::findUser($report->closing_user_id)->first_name}}
                    {{\App\Http\Controllers\ReportController::findUser($report->closing_user_id)->last_name}}


            @endif
         </td>
     </tr>   
        
        <tr> 
            <td>
                מועד פתיחת הדיווח
            </td>
            
            <td>   
                 {{$report->created_at}}
            </td>
        </tr>
        
        <tr> 
        <td>
            סיבת הדיווח
        </td>
            
        <td>   
            {{$report->type}}
        </td>
        </tr>
        
        <tr> 
            <td>
               תיאור
            </td>
            
            <td>   
                {{$report->desc}}
            </td>
     </tr>        
    </table>
    
<div dir="rtl" style="text-align: right">
    <a href="{{env('APP_URL')}}/reports/view/{{$report->id}}"><img src="https://www.dropbox.com/s/ytx3hj3aox0omkl/Go%20to%20report.png?raw=1" alt="לחץ כאן לעבור לדיווח "> </a>
</div>

<div>
    <!-- Email Footer : BEGIN -->
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
        <tr>
            <td style="padding: 40px 10px; font-family: sans-serif; font-size: 12px; line-height: 140%; text-align: center; color: #888888;">
                <br><br>
                אגודת הסטודנטים<br><span class="unstyle-auto-detected-links">רבנו ירוחם 12, תל אביב<br>03-9292929</span>
                <br><br>
                <a href="{{env('APP_URL')}}/notifications/unsubscribe/{{$user->secret_token}}"> <unsubscribe style="color: #888888; text-decoration: underline;">unsubscribe</unsubscribe> </a>
            </td>
        </tr>
    </table>
    <!-- Email Footer : END -->
</div>
</body>
</html>