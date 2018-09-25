@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-6">
			<!-- form section start -->
			<div class="form-group">
				<label for="package_id">Package ID:</label>
				<select class="form-control" v-model="package_id">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
			</div>

			<div class="form-group">
				<label for="filename">Filename:</label>
				<input type="test" name="filename" v-model="filename" class="form-control">
			</div>

			<div class="form-group">
				<label for="path">Path</label>
				<input type="text" name="path" v-model="path" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-info" @click="edit_image({{ $image->id }})">Update Image</button>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	const app = new Vue({

		el: '#app',
		data: {!! $image->toJson() !!},
		
		methods: {
			edit_image: function(id) {
				data = {
					package_id: this.package_id,
					filename: this.filename,
					path: this.path
					

				};


				 axios.put('/dashboard/image/'+id, data)
                        .then(response => {

                        	swal(
						  'Image Updated',
						  'You clicked the button!',
						  'success'
							);
                        	
                             this.package_id = '';
                             this.filename = '';
							 this.path = '';
                        });
         },

		}
	});



</script>

@endsection


