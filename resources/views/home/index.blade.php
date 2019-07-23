<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title>E-voting TPS 1</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </head>
  <body style="margin-top: 78px; background-image: url(../assets/img/election.png); background-size: cover;">

    {{-- <form action="{{ route('coblos1.kandidat') }}" method="POST">
    {{ csrf_field() }} --}}        
    <div class="container">
        <h3 class="text-center" style="font-family: Viga;">SILAHKAN PILIH CALON PILIHAN ANDA</h3>
        <div class="row justify-content-center">
            <div class="row coblos">
                 @foreach($data_kandidat as $item)
                <div class="col-lg">
                    <h4 class="text-center" style="">{{$item->id}}</h4>
                    <img src="{{ asset('/storage/'.$item->image) }}" onclick="selectVote({{ $item->id }})" width="220px" height="220px" alt="..." class="img-thumbnail" id="input">
                    <p>{{$item->namakandidat}}</p> 
                    <div class="form-check text-center">
                      <input class="form-check-input" type="radio" name="kandidat_id" id="{{ $item->id }}" value="{{ $item->id }}">
                      <input type="hidden" name="tps_id" value="1">
                      <label class="form-check-label">
                        Coblos
                      </label>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div><br>
        {{-- {{ dd($tps->toArray()) }} --}}
        
            <div class="row justify-content-center">
                <div class="col-sm-1">
                    <div id="tampil">
                        @if ($tps->status == 0)
                          <button id="pemilih" onclick="" type="submit" class="btn btn-primary btn-lg">Off</button>
                        @else
                          <button id="pemilih" onclick="pemilih()" type="submit" class="btn btn-primary btn-lg">Selesai</button>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    {{-- </form> --}}
{{-- </form> --}}
    {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    

    <!-- Jqueryku -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    
    </script>

    <script>
    function selectVote(voteId) {
      $("#"+voteId).prop('checked', true);
    }

    function pemilih() {
        console.log(window.vote)
        // $.ajax({
        //     url: "{{ route('status.check.tps.1.update') }}",
        //     type: "POST",
        //     data: {
        //         "_token": "{{ csrf_token() }}"
        //     },
        //     success: function(response) {
                
        //         // location.reload();
                
        //     }
        // });
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e4c6c2faac94bee48d8c', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('voted-tps1');
    channel.bind('voted', function(data) {
      console.log(data.tps.status);
      console.log($("#pemilih").length);
      if (data.tps.status == 1) {
        if ($("#pemilih").length > 0) {
          $("#pemilih").remove();
        }
        $("#tampil").append("<button id='pemilih' onclick='pemilih()' type='submit' class='btn btn-primary btn-lg'>Selesai</button>");
        // alert('sdf');
      } else {
        $("#pemilih").remove();
      }
    });
  </script>

  </body>
</html>