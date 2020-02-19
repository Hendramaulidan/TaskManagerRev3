@extends('layouts.app')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="#" data-toggle="modal" data-target="#staticBackdrop"><h3 class="text-center text-dark">Start Task + </h3></a>
				@foreach ($start as $item)
					<div class="card border-dark mb-2 text-dark">
						<div class="card-body">
							<div class="card-title">{{$item->created_at}}</div>
							{{$item->kegiatan}}
							
							<div class="card-footer mb-1">{{Auth::user()->name}}</div>
							&nbsp;&nbsp;&nbsp;<a href="/home/delete/{{$item->id}}"class="text-danger"><h1 class="fas fa-trash"></h1></a>
								&nbsp;&nbsp;&nbsp;<a href="/home/toprocess/{{$item->id}}"><i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-md-4">
				<a href='#'data-toggle="modal"data-target="#ProcessTask"> <h3 class="text-center text-primary">Process Task + </h3></a>
				@foreach ($Process as $item)
					<div class="card border-primary mb-2 text-primary">
						<div class="card-body">
							<div class="card-title">{{$item->created_at}}</div>
							{{$item->kegiatan}}
							
							<div class="card-footer mb-1">{{Auth::user()->name}}</div>
							&nbsp;&nbsp;&nbsp;<a href="/home/delete/{{$item->id}}"class="text-danger"><i class="fas fa-trash"></i>  
							</a>
							&nbsp;&nbsp;&nbsp;<a href="/home/tofinish/{{$item->id}}"><i class="fas fa-check-square text-success"></i></a>
						</div>
					</div>
				@endforeach
			</div>
				<div class="col-md-4">
				<a href='#'data-toggle="modal"data-target="#FinishTask"> <h3 class="text-center text-success">Finish Task + </h3></a>
				@foreach ($Finish as $item)
					<div class="card border-success mb-2  text-success">
						<div class="card-body">
							<div class="card-title">{{$item->created_at}}</div>
							{{$item->kegiatan}}
							
							<div class="card-footer mb-1">{{Auth::user()->name}}</div>
&nbsp;&nbsp;&nbsp;<a href="/home/delete/{{$item->id}}" class="text-danger"><i class="fas fa-trash"></i>  </a>
						</div>
					</div>
				@endforeach
			</div>
			</div>
		</div>
	</div>



<!-- Modal start -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Start Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="\taskdef\newstart"class="form-group"id="form-start">
          {{csrf_field()}}
        	Insert new activity : 
        	<textarea required="required"name="activity"class="form-control mb-2"></textarea>
        	<input type="button" value="Submit"class="btn btn-dark"id="startTask">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Process -->
<div class="modal fade" id="ProcessTask" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Process Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="\taskdef\newprocess"class="form-group"id="form-process">
          {{csrf_field()}}
        	Insert new activity : 
        	<textarea required="required"name="activity"class="form-control mb-2"></textarea>
        	<input type="button" value="Submit"class="btn btn-dark"id="processTask">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Finish -->
<div class="modal fade" id="FinishTask" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Finish Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="\taskdef\newfinish"class="form-group"id="form-finish">
          {{csrf_field()}}
        	Insert new activity : 
        	<textarea required="required"name="activity"class="form-control mb-2"></textarea>
        	<input type="button" value="Submit"class="btn btn-dark"id="finishTask">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#finishTask').click(function () {
      $('#finishTask').attr('disabled',true)
      var data = $('#form-finish').serialize()
      $.ajax({
        type : 'GET',
        url : '/taskdef/newfinish',
        data : data,
        success:function () {
          window.location.reload()
        }
      })

    })
  })

$(document).ready(function () {
    $('#processTask').click(function () {
      $('#processTask').attr('disabled',true)
      var data = $('#form-process').serialize()
      $.ajax({
        type : 'GET',
        url : '/taskdef/newprocess',
        data : data,
        success:function () {
          window.location.reload()
        }
      })

    })
  })
$(document).ready(function () {
    $('#startTask').click(function () {
      $('#startTask').attr('disabled',true)
      var data = $('#form-start').serialize()
      $.ajax({
        type : 'GET',
        url : '/taskdef/newstart',
        data : data,
        success:function () {
          window.location.reload()
        }
      })

    })
  })
</script>


@endsection