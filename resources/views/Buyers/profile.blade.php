@extends('layouts.client_header')
<style type="text/css">
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 70%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  margin-left: auto; margin-right: auto;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
@section('content')
   <div class="row">
       <div class="col-md-4">
            <?php $type_1 = 0; if (sizeof(Auth::guard('buyer')->user()->photo) != 0) { ?>
            @foreach(Auth::guard('buyer')->user()->photo as $photo)
                @if($photo->type == 1)
                    <img src="{{ asset('images/buyerImages') }}/{{ $photo->photo }}" style="width: 100%; height: 400px;">
                    <?php $type_1 = 1; ?>
                @endif
            @endforeach
            <?php if ($type_1 == 0) { ?>
               <img src="{{ asset('images/buyerImages/master.jpg') }}" style="width: 100%;"> 
            <?php } ?> 
        <?php } else{ ?>
            <img src="{{ asset('images/buyerImages/master.jpg') }}" style="width: 100%;">
        <?php  } ?>
        <a href="#" class="btn btn-primary" onclick="showModel(1);">Upload Profile Picture</a>
        </div>
        <div class="col-md-8">
            {{ Auth::guard('buyer')->user()->first_name }} {{ Auth::guard('buyer')->user()->last_name }}<br>
            {{ Auth::guard('buyer')->user()->address }}<br>
            {{ Auth::guard('buyer')->user()->email }}, {{ Auth::guard('buyer')->user()->contact_type }}<br>
            {{ Auth::guard('buyer')->user()->contact_no }}, {{ Auth::guard('buyer')->user()->contact_type }}<br>
            {{ Auth::guard('buyer')->user()->office_name }}, {{ Auth::guard('buyer')->user()->office_type }}<br>
            <div class="row">
                @foreach(Auth::guard('buyer')->user()->photo as $photo)
                @if($photo->type != 1)
                    <div class="col-md-6">
                        <img src="{{ asset('images/buyerImages') }}/{{ $photo->photo }}" style="width: 100%; height: 300px;">
                    </div>
                @endif
            @endforeach
            </div>
            <?php $type_2 = 0; $type_3 = 0; if (sizeof(Auth::guard('buyer')->user()->photo) != 0) { ?>
             @foreach(Auth::guard('buyer')->user()->photo as $photo)
                @if($photo->type == 2)
                     <a href="#" class="btn btn-primary" onclick="showModel(2);" style="display: none;">Upload Company Register Certificate</a>
                     <?php $type_2 = 1; ?>
                @elseif($photo->type == 3)
                    <a href="#" class="btn btn-primary" onclick="showModel(3);" style="display: none;">Upload PAN Certificate</a>
                    <?php $type_3 = 1; ?>

                @endif
            @endforeach
            <?php if ($type_2 == 0) { ?>
               <a href="#" class="btn btn-primary" onclick="showModel(2);">Upload Company Register Certificate</a>
            <?php } if ($type_3 == 0) { ?>
                <a href="#" class="btn btn-primary" onclick="showModel(3);">Upload PAN Certificate</a>
           <?php  } ?>
        <?php } else { ?>
            <a href="#" class="btn btn-primary" onclick="showModel(2);">Upload Company Register Certificate</a>
            <a href="#" class="btn btn-primary" onclick="showModel(3);">Upload PAN Certificate</a>
        <?php } ?>
        </div>
   </div>
 <div id="myModal" class="modal">

  <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form class="pt-3 pb-3" method="POST" action="{{ route('pictureUpload') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="text" name="buyer_id" value="{{ Auth::guard('buyer')->user()->id }}" hidden>
          <input type="text" name="type" id="type" hidden>
          <div class="form-group">
            <label for="exampleFormControlFile1">Browse</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
          </div><br>
          <input type="submit" class="btn btn-success btn" value="Submit">
        </form>
        </div>

      </div>
      <script type="text/javascript">
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var submit = document.getElementById('submit');
    // When the user clicks on the button, open the modal
    function showModel(id) {
      modal.style.display = "block";
      document.getElementById('type').value = id;
      //document.myForm.action = '/contact/'+id+'/sendEmail';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    submit.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

@endsection

