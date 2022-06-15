@extends('layouts.admin.main')
@push('style-custom')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>

    <style>
        .kasta {
            z-index: 99;
        }
    </style>
@endpush

@section('content-admin')
    <div class="container ">
        <div class="row justify-content-center ml-5">
            <div class="col-lg-6 ml-5">
                <div class="center">
                    <div class="contacts">
                        <i class="fas fa-bars fa-2x"></i>
                        <h2>
                            Petani
                        </h2>
                        @foreach ($dataPck as $key => $d)
                            <div class="contact" id-pck="{{ $d->id }}" nama="{{ $d->userDua->name }}"
                                foto="{{ $d->userDua->foto }}">
                                <div class="pic rogers"
                                    style="background-image: url({{ asset('files/foto-profile/' . $d->userDua->foto) }})">
                                </div>
                                <div class="badge">
                                    {{ $d->jmlPesan($d->user_dua)[0]->jumlah_pesan }}
                                </div>
                                <div class="name">
                                    {{ $d->userDua->name }}
                                </div>
                                <div class="message">
                                    {{ $d->pesan->first()->isi }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="chat">
                        <div class="contact bar">
                            <div class="pic stark" id="fotoProfile">
                            </div>
                            <div class="name">
                                -
                            </div>
                            <div class="seen">
                                -
                            </div>
                        </div>
                        <div class="messages" id="listPesan">

                        </div>
                        <div class="input">
                            <i class="fas fa-camera"></i><i class="far fa-laugh-beam"></i>
                            <input type="text" name="pesanTeks" id="pesanTeks" placeholder="Type your message here!"
                                type="text" />
                            <input type="hidden" id="inputIdpck" value="0">
                            <i class="fas fa-paper-plane" id="btnKirim"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script-custom')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            setInterval(function() {
                var idPck = $("#inputIdpck").val();
                if (idPck != 0) {
                    loadData(idPck);
                }
            }, 1000);
            myscrol()

            $(".fa-camera").click(function() {
                loadData(10)
            });
            $("#btnKirim").click(function() {
                var idPck = $("#inputIdpck").val();
                kirimPesan(idPck);
                // loadData(idPck)
            });

            $(".contact").click(function() {
                // $("#listPesan").html('')
                $("#listPesan").empty();
                var idPck = $(this).attr('id-pck');
                var nama = $(this).attr('nama');
                var foto = $(this).attr('foto');
                getPercakapan(idPck, nama, foto);

            });

        });

        function kirimPesan(id) {
            var teks = $("input[name=pesanTeks]").val();
            $.ajax({
                type: 'POST',
                url: "{{ route('admin-chatStore') }}",
                data: {
                    pesanTeks: teks,
                    idPck: id,
                },
                success: function(data) {
                    $("input[name=pesanTeks]").val('');
                    $("input[name=inputIdpck]").val(data.success);
                    $("#listPesan").html(data.pesan);
                    myscrol();
                    // console.log(data.pesan)

                }
            });
        }

        function loadData(idPck) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin-chatRealtime') }}",
                data: {
                    id: idPck,
                },
                dataType: "text",
                success: function(data) {
                    if (data != 0) {
                        $("#listPesan").empty()
                        $("#listPesan").html(data)
                    }
                }
            });
        }

        function getPercakapan(idPck, nama, foto) {
            $(".name").html(nama)
            $("#inputIdpck").val(idPck)
            var imageUrl = 'files/foto-profile/' + foto;
            $("#fotoProfile").css("background-image", `url( ${imageUrl} )`);

            $.ajax({
                type: 'POST',
                url: "{{ route('admin-chatShow') }}",
                data: {
                    id: idPck,
                },
                success: function(data) {
                    // loadData(idPck);
                    $("#listPesan").html(data)
                    myscrol();
                    // setInterval(loadData(idPck), 1000);
                    // setTimeout(myscrol, 500);

                }
            });

        }

        function myscrol() {
            var chat = document.getElementById('listPesan');
            chat.scrollTop = chat.scrollHeight - chat.clientHeight;
        }
    </script>
@endpush
