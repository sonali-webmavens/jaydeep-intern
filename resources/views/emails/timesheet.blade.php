@component('mail::message')
# Timesheet Report

@component('mail::table')
| Name        | Working Date         | Total Hours  |
|-------------|----------------------|--------------|
@foreach ($employeeDetails as $detail)
| {{ $detail->name }} | {{ $detail->working_date }} | {{ $detail->total_hours }} |
@endforeach
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

