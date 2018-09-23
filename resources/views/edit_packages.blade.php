@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-8">
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
				<button class="btn btn-info" @click="edit_package({{ $package->id}})">Update Package</button>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	const app = new Vue({

		el: '#app',
		data: {!! $package->toJson() !!},
		
		methods: {
			edit_package: function(id) {
				alert(id);
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

				
				 axios.put('/dashboard/package/'+id, data)
                        .then(response => {
                        	alert('data updated');
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

		}
	});
</script>
@endsection


