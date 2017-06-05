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
            <div class="dashboard-box-inner text-center">
            <h3>Sessioner i denne uge</h3><br>
            <h4>Antal sessioner: {{ count($sessions) }}</h4>
            <h4>Antal timer: {{ $average_session_hours }}</h4>
            <a href="{{ route('session.index') }}" class="dashboard-box-btn btn btn-default">Se oversigt</a>
            </div>
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
                        <input style="display: none" id="submit-loading" type="submit" value="Tjekker ind.." class="dashboard-box-btn dashboard-box-btn-loading btn btn-default" readonly>
                    </div>
                    
                </form>
                 @elseif( empty($session->ended_at ))
                 <a href="#" id="check-out-1" class="dashboard-box-btn btn-check-out btn btn-default">Tjek ud</a>
                 <div class="check-out-box">
                    <form class="check-out-form" method="POST" action="{{ route('session.update', $session->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <h2>Lige inden at du smutter..</h2>
                            <h4>Hvad har du arbejdet med i dag?</h4>
                            <textarea id="session-description" required maxlength="250" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="check-out-2" type="submit" value="Tjek ud" class="dashboard-box-btn btn-check-out btn btn-default">
                            <a href="#" id="check-out-cancel" class="dashboard-box-btn btn-cancel btn btn-danger">Annuller</a>
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
                <div style="border-bottom: 1px solid lightgray;" class="row"><strong>
                    <div class="col-xs-4">Fag:</div>
                    <div class="col-xs-4">Titel:</div>
                    <div class="col-xs-4">Færdig til:</div></strong>
                    </div>
                @foreach ($user->school_class->homeworks as $HW)
                <div class="row" style="margin-bottom: 1px; border-bottom: 1px solid lightgray;">
                    <div class="col-xs-4"><strong>{{ $narr[$HW->subject_id] }}</strong></div>
                    <div class="col-xs-4">{{ $HW->title }}</div>
                    <div class="col-xs-4">{{ $HW->due_at }}</div>

             </div>
            @endforeach
       </div></div>

       <div class="dashboard-box col-md-4">
            <div class="dashboard-box-inner">
                <h3>Begivenheder</h3>
                <div style="border-bottom: 1px solid lightgray;" class="row"><strong>
                    <div class="col-xs-4">Navn:</div>
                    <div class="col-xs-4">Starter:</div>
                    <div class="col-xs-4">Slutter:</div></strong>
                    </div>
                @foreach ($user->school_class->events as $EV)
                <div class="row" style="margin-bottom: 1px; border-bottom: 1px solid lightgray;">
                    <div class="col-xs-4">{{ $EV->name }}</div>
                    <div class="col-xs-4">{{ $EV->start_time }}</div>
                    <div class="col-xs-4">{{ $EV->end_time }}</div>

             </div>
            @endforeach
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
                
            if ($("#session-description").val()) {
                $('#check-out-2').hide();
                $('#check-out-cancel').hide();
                $('#submit-loading-check-out').show();
                
                }
            });
            $('#check-out-cancel').on('click', function (e) {
                $('.check-out-box').hide();
            });
        });
</script>

@endsection
