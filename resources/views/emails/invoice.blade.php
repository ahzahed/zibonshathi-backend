@component('mail::message')
<u>
    <h2 style="color: black; margin-left: 30%">SheBa Web Technology</h2>
</u>
<p style="font-weight: bold; color:black; float: right">Invoice Date: {{ $item->payment_date }}</p>
<p style="font-weight: bold; color:black">Invoice No: {{ $item->payment_id }}</p>
<table style="border: 1px solid black; margin-top:20px; margin-bottom:9px">
    <tr>
        <td width="550">
            <span style="font-weight: bold; color:black">Bill To:</span> {{ $item->name }}
        </td>
    </tr>
    <tr>
        <td>
            <span style="color:black; font-weight: bold;">Billing company name &amp; address:</span> {{ $item->email }}
        </td>
    </tr>
</table>
<table style="border: 1px solid black; margin-bottom:20px">
    <tr>
        <td width="350" style="font-weight:bold; color:black">
            Package
        </td>
        <td width="100" style="font-weight:bold; color:black">
            Unit Price
        </td>
        @if ($item->discount)
        <td width="100" style="font-weight:bold; color:black">
            Discount
        </td>
        @endif
        <td width="100" style="font-weight:bold; color:black">
            Amount
        </td>
    </tr>
    <tr>
        <td>
            <span style="font-weight: bold; color:black;">1.</span> {{ $item->package }} Days
        </td>
        <td>
            1
        </td>
        @if ($item->discount)
            {{ $item->discount }}
        @endif
        <td>
            {{ $item->paying_amount/100 }}
        </td>
    </tr>
    <tr style="border-top: 1px solid black">
        <td style="font-weight:bold; color:black" colspan="2">
            Total
        </td>
        <td style="color:black">
            {{ $item->paying_amount/100 }}
        </td>
    </tr>
</table>

@component('mail::button', ['url' => 'http://test.zibonshathi.com/'])
Home Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
