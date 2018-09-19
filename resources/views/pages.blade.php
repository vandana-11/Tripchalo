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
				<button class="btn btn-info" @click="add_page()">Add Page</button>
			</div>
		</div>
		<div class="col-md-4">
			<table class="table table-condensed">
				<thead>
					<th>ID</th>
					<th>Title</th>
					<th>Action</th>
				</thead>
				<tbody>
					<tr v-for="page in pages">
						<td>@{{ page.id }}</td>
						<td>@{{ page.title }}</td>
						<td>
							<button>Edit</button>
							<button>Delete</button>
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
			order_id: 0,
			pages: []
		},
		mounted() {

				// fetch all pages using axios and update pages array
			
				axios.get('/dashboard/page')
                    .then(response => (this.pages = response.data));
		},
		methods: {
			add_page: function() {

				data = {
					title: this.title,
					slug: this.slug,
					body: this.body,
					order_id: this.order_id
				};

				
				 axios.post('/dashboard/page', data)
                        .then(response => {
                        	
                        	alert('Data added');

                            this.pages.push(response.data);
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


