@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-6">
			<!-- form section start -->
			<div class="form-group">
				<label for="title">Package Title:</label>
				<input type="text" name="title" v-model="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Package Slug</label>
				<input type="text" name="slug" v-model="slug" class="form-control">
			</div>

			<div class="form-group">
				<label for="title">User ID:</label>
				<select class="form-control" v-model="user_id">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
			</div>

			<div class="form-group">
				<label for="slug">Body:</label>
				<input type="text" name="slug" v-model="body" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Thumbnail:</label>
				<input type="text" name="slug" v-model="thumbnail" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Price:</label>
				<input type="text" name="slug" v-model="price" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Discount:</label>
				<input type="text" name="slug" v-model="discount" class="form-control">
			</div>

			<div class="form-group">
				<button class="btn btn-info" @click="add_package()">Add Package</button>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-condensed">
				<thead>
					<th>ID</th>
					<th>Title</th>
					<th>Body</th>
					<th>Price</th>
					<th>Discount</th>
				</thead>
				<tbody>
					<tr v-for="(package,index) in packages">
						<td>@{{ package.id }}</td>
						<td>@{{ package.title }}</td>
						<td>@{{ package.body }}</td>
						<td>@{{ package.price }}</td>
						<td>@{{ package.discount }}</td>
						<td>
                                <a :href="'/dashboard/package/' + package.id " class="btn btn-s btn-info">Edit</a> 
                                <button class="btn btn-info" @click="delete_package(package.id,index)">Delete</button>
			</div>
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
			title: '',
			slug: '',
			body: '',
			user_id: 0,
			thumbnail:'',
			price:0,
			discount:0,
			is_active:0,
			is_expired:0,
			is_deleted:0,
			packages: []
		},
		mounted() {

				// fetch all packages using axios and update packages array
			
				axios.get('/dashboard/package')
                    .then(response => (this.packages = response.data));
		},
		methods: {
			add_package: function() {

				data = {
					title: this.title,
					slug: this.slug,
					body: this.body,
					user_id: this.user_id,
					thumbnail:this.thumbnail,
					price:this.price,
					discount:this.discount,
					is_active:0,
					is_expired:0,
					is_deleted:0

				};
		   	    axios.post('/dashboard/package', data)
                        .then(response => {
                        	
                        	alert('Data added');

                            this.packages.push(response.data);
                            this.title = '';
                            this.slug = '';
                            this.body = '';
                            this.user_id = '';
                            this.thumbnail = '';
                            this.price = '';
                            this.discount = '';
                        });
			},

			delete_package :function(id,index){
				axios.delete('/dashboard/package/'+id)
                        .then(response => {
                        	alert('Data deleted');
                       Vue.delete(this.data, index);
                   
             });
         }
     }
	});
</script>
@endsection


