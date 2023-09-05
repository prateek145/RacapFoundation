@extends('email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <img src="https://omegastaging.com.au/RacapFoundation/public/frontend/raclogo1.png" alt="" width="40%"
            height="10%">
        <tr>
            <td>
                <h3> Hi {{$body['email'] ?? ''}}</h3>

                <h3>OTP : {{$body['otp']}}</h3>
                {{-- <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr>
                            <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td> <a href="{{route('frontend.home')}}" target="_blank">Call To Action</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
                <h3>RACAP FOUNDATION.</h3>
                <h3>Good luck! Hope it works.</h3>
            </td>
        </tr>
    </table>
</td>
@endsection