@extends('layouts.app')

@section('content')
<div class="dashboard-container container">
    <div class="row">
        <div class="col-md-7">
            <div class="dashboard-profile">
                <div class="col-md-5">
                    <img class="dashboard-avatar" src="{{ str_replace('sz=50', 'sz=300', Auth::user()->avatar) }}">
                </div>
                <div class="dashboard-profile-info col-md-7">
                    <h2>{{ Auth::user()->name }}</h2>
                    <h4><span>Skole:</span> {{ $user->school->name }}</h4>
                    <h4><span>Klasse:</span> {{ $user->school_class->name }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
    <div class="dashboard-box-row row">
       <div class="dashboard-box col-md-4">
            <div class="dashboard-box-inner text-center">
                <h3>Lektiecafé</h3>
                <p class="text-center">Tjek ind hvis du deltager i dagens lektiecafé.</p>
                <p><strong>OBS:</strong> Du kan <u>kun</u> tjekke ind på skolens område.</p>
                 @if( empty($session->created_at ))
                 <form method="POST" action="{{ route('session.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input id="check-in" type="submit" value="Tjek ind" class="dashboard-box-btn btn btn-default">
                        <input style="display: none" id="submit-loading" type="submit" value="Tjekker ud.." class="dashboard-box-btn dashboard-box-btn-loading-2 btn btn-default" readonly>
                    </div>
                    
                </form>
                 @elseif( empty($session->ended_at ))
                 <a href="#" id="check-out-1" class="dashboard-box-btn btn-check-out btn btn-default">Tjek ud</a>
                 <div class="check-out-box">
                    <form class="check-out-form" method="POST" action="{{ route('session.update', $session->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <h4>Hvad har du arbejdet med i denne session?</h4>
                            <textarea required maxlength="250" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <input style="background-color: #f0a960" id="check-out-2" type="submit" value="Tjek ud" class="dashboard-box-btn btn btn-default">
                            <input style="display: none" id="submit-loading-check-out" type="submit" value="Tjekker ud.." class="dashboard-box-btn dashboard-box-btn-loading-2 btn btn-default" readonly>
                        </div>

                    </form>
                 </div>
                @else(! empty($session->ended_at))
                <form method="POST" action="{{ route('session.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input id="check-in" type="submit" value="Tjek ind" class="dashboard-box-btn btn btn-default">
                        <input style="display: none" id="submit-loading" type="submit" value="Tjekker ind.." class="dashboard-box-btn dashboard-box-btn-loading btn btn-default" readonly>
                    </div>
                    
                </form>
                @endif
            </div>
       </div>
       <div class="dashboard-box col-md-4">
            <div class="dashboard-box-inner">
                <h3>Lektier</h3>
            </div>
       </div>
       <div class="dashboard-box col-md-4">
            <div class="dashboard-box-inner">
                <h3>Overblik</h3>
            </div>
       </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>    
    $(document).ready(function () {

            $('#check-in').on('click', function (e) {
                $('#check-in').hide();
                $('#submit-loading').show();
            });

            $('#check-out-1').on('click', function (e) {
                $('.check-out-box').fadeIn(400).css('display', 'flex');
            });

            $('#check-out-2').on('click', function (e) {
                $('#check-out-2').hide();
                $('#submit-loading-check-out').show();
            });

        });
</script>

@endsection

