@extends('layouts.landing.main')
@push('style-custom')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
@endpush

@section('content-landing')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-8 ftco-animate fadeInUp">
                    <div class="">
                        <div class="chat">
                            <div class="contact bar">
                                <div class="pic stark"
                                    style="background-image: url({{ asset('files/foto-profile/' . $user['fotoPetugas']) }})">
                                </div>
                                <div class="name">
                                    {{ $user['namaPetugas'] }}
                                </div>
                                <div class="seen">
                                    Today at 12:56
                                </div>
                            </div>
                            <div class="messages" id="listPesan">
                                @foreach ($pesan as $p)
                                    @if ($p->id_user == $user['idPetugas'])
                                        <div class="message stark">
                                            {{ $p->isi }}
                                        </div>
                                    @else
                                        <div class="message parker">
                                            {{ $p->isi }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="input">
                                <input type="text" name="pesanTeks" id="pesanTeks" placeholder="Type your message here!"
                                    type="text" />
                                <input type="hidden" name="idPk" id="idPk" value="{{ $user['idPck'] }}" />
                                <input type="hidden" name="idPtg" id="idPtg" value="{{ $user['idPetugas'] }}">
                                <i class="fas fa-paper-plane" id="btnKirim"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



@push('script-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            setInterval(loadData, 1000);
            myscrol();

            $(".fa-camera").click(function() {
                // alert('sudah diklik')
                loadData();
            });

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
                    if (data != 0) {
                        $("#listPesan").empty()
                        $("#listPesan").html(data)
                    }
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
                    $("input[name=pesanTeks]").val('');
                    $("input[name=idPk]").val(data.idPck);
                    $("#listPesan").html(data.pesan);
                    myscrol();
                }
            });
        }

        function myscrol() {
            var chat = document.getElementById('listPesan');
            chat.scrollTop = chat.scrollHeight - chat.clientHeight;
        }
    </script>
@endpush
