@extends('layouts.landing.main-chat')

@section('content-landing-chat')
    <div class="container" style="margin-top: 5%;">
        <div class="row ">
            <div class=" col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3">
                <div class="panel">
                    <!--Heading-->
                    <div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group">
                                <button class="btn btn-default" type="button" data-toggle="collapse"
                                    data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="dropdown"><i
                                        class="fa fa-gear"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Available</a></li>
                                    <li><a href="#">Busy</a></li>
                                    <li><a href="#">Away</a></li>
                                    <li class="divider"></li>
                                    <li><a id="demo-connect-chat" href="#" class="disabled-link"
                                            data-target="#demo-chat-body">Connect</a></li>
                                    <li><a id="demo-disconnect-chat" href="#" data-target="#demo-chat-body">Disconect</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3 class="panel-title">Chat</h3>
                    </div>

                    <!--Widget body-->
                    <div id="demo-chat-body" class="collapse in">
                        <div class="nano has-scrollbar" style="height:380px">
                            <div class="nano-content pad-all" tabindex="0" id="isi" style="right: -17px;">
                                <ul class="list-unstyled media-block" id="listPesan">
                                    @foreach ($pesan as $p)
                                        @if ($p->id_user == $user['idPetugas'])
                                            <li class="mar-btm">
                                                <div class="media-left">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                        class="img-circle img-sm" alt="Profile Picture">
                                                </div>
                                                <div class="media-body pad-hor">
                                                    <div class="speech">
                                                        <a href="#" class="media-heading">{{ $p->user->name }}</a>
                                                        <p>{{ $p->isi }}</p>
                                                        <p class="speech-time">
                                                            <i class="fa fa-clock-o fa-fw"></i>{{ $p->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="mar-btm">
                                                <div class="media-right">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                        class="img-circle img-sm" alt="Profile Picture">
                                                </div>
                                                <div class="media-body pad-hor speech-right">
                                                    <div class="speech">
                                                        <a href="#" class="media-heading">{{ $p->user->name }}</a>
                                                        <p>{{ $p->isi }}</p>
                                                        <p class="speech-time">
                                                            <i class="fa fa-clock-o fa-fw"></i> {{ $p->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="nano-pane">
                                <div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);">
                                </div>
                            </div>
                        </div>

                        <!--Widget footer-->
                        <div class="panel-footer">
                            <div class="row">

                                <div class="col-xs-9">
                                    <input type="text" name="pesanTeks" id="pesanTeks" placeholder="Enter your text"
                                        class="form-control chat-input">
                                    <input type="hidden" name="idPk" id="idPk" value="{{ $user['idPck'] }}" />
                                    <input type="hidden" name="idPtg" id="idPtg" value="{{ $user['idPetugas'] }}">
                                </div>
                                <div class="col-xs-3">
                                    <button type="button" class="btn btn-primary btn-block" id="btnKirim">Send</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // setInterval(loadData, 1000);
            setTimeout(myscrol, 800);

            $("#btnKirim").click(function() {
                kirimPesan();
                setTimeout(loadData, 100);
                setTimeout(myscrol, 800);
            });
        });

        function loadData() {
            $.ajax({
                type: "POST",
                url: "{{ route('landing-chatRealtime') }}",
                data: {},
                dataType: "text",
                success: function(data) {
                    $("#listPesan").html(data)
                    // console.log(data);
                }
            });
        }

        function kirimPesan() {
            var teks = $("input[name=pesanTeks]").val();
            var pck = $("input[name=idPk]").val();
            var ptg = $("input[name=idPtg]").val();
            // alert(pck);
            $.ajax({
                type: 'POST',
                url: "{{ route('landing-chatStore') }}",
                data: {
                    pesanTeks: teks,
                    idPk: pck,
                    idPtg: ptg,
                },
                success: function(data) {
                    // alert(data.success)
                    $("input[name=pesanTeks]").val('');
                    $("input[name=idPk]").val(data.success);
                }
            });
        }

        function myscrol() {
            $('#isi').animate({
                scrollTop: $('#isi')[0].scrollHeight
            });
        }
    </script>
@endpush
