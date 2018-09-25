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
				<button class="btn btn-info" @click="add_image()">Add Image</button>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-condensed">
				<thead>
					<th>ID</th>
					<th>Package ID</th>
					<th>Filename</th>
					<th>Path</th>
				</thead>
				<tbody>
					<tr v-for="(image,index) in images">
						<td>@{{ image.id }}</td>
						<td>@{{ image.package_id }}</td>
						<td>@{{ image.filename }}</td>
						<td>@{{ image.path }}</td>	
						<td>
							<a :href="'/dashboard/image/' + image.id " class="btn btn-s btn-info">Edit</a>
							<button class="btn btn-info" @click="delete_image(image.id,index)">Delete</button>
						</td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	const app = new Vue({

		el: '#app',
		data: {
			package_id: '',
			filename: '',
			path: '',
			images: []
		},
		mounted() {
			
				axios.get('/dashboard/image')
                    .then(response => (this.images = response.data));
		},
		methods: {
			add_image: function() {

				data = {
					package_id: this.package_id,
					filename: this.filename,
					path: this.path,
					
				};

				
				 axios.post('/dashboard/image', data)
                        .then(response => {
                        	
                        	swal(
						  'Image Added',
						  'You clicked the button!',
						  'success'
							);

                            this.images.push(response.data);
                            this.package_id = '';
                            this.filenamename = '';
                            this.path = '';
                            
                        });

			},

			delete_image :function(id,index){
				axios.delete('/dashboard/image/'+id)
                        .then(response => {
                       
                       Vue.delete(this.images, index);

                       swal(
						  'Image deleted',
						  'You clicked the button!',
						  'success'
						);
                   
             });
         }
		}
	});
</script>
@endsection


