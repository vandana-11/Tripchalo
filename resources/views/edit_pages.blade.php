@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-8">
			<!-- form section start -->
			<div class="form-group">
				<label for="title">Page Title</label>
				<input type="text" name="title" v-model="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Page Slug</label>
				<input type="text" name="slug" v-model="slug" class="form-control">
			</div>

			<div class="form-group">
				<label for="title">Content</label>
				<textarea class="form-control" v-model="body"></textarea>
			</div>
			<div class="form-group">
				<label for="title">Order No</label>
				<select class="form-control" v-model="order_id">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>

				</select>
			</div>

			<div class="form-group">
				<button class="btn btn-info" @click="edit_page({{ $page->id}})">Update Page</button>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	const app = new Vue({

		el: '#app',
		data: {!! $page->toJson() !!},
		
		methods: {
			edit_page: function(id) {
				data = {
					title: this.title,
					slug: this.slug,
					body: this.body,
					order_id: this.order_id

				};

				
				 axios.put('/dashboard/page/'+id, data)
                        .then(response => {

                        	swal(
						  'Page Updated',
						  'You clicked the button!',
						  'success'
							);
                        	
                            this.title = '';
                             this.title = '';
							 this.slug = '';
							 this.body = '';
							 this.order_id = '';
                        });
         },

		}
	});



</script>
@endsection


