@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-8">
			<!-- form section start -->
			<div class="form-group">
				<label for="title">Email:</label>
				<input type="text" name="email" v-model="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="slug">Message:</label>
				<input type="text" name="message" v-model="message" class="form-control">
			</div>

			<div class="form-group">
				<button class="btn btn-info" @click="edit_contact({{ $contact->id}})">Update Contact</button>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	
	const app = new Vue({

		el: '#app',
		data: {!! $contact->toJson() !!},
		
		methods: {
			edit_contact: function(id) {
				data = {
					email: this.email,
					message: this.message
					

				};

				
				 axios.put('/dashboard/contact/'+id, data)
                        .then(response => {

                        	swal(
						  'Contact Updated',
						  'You clicked the button!',
						  'success'
							);
                        	
                             this.email = '';
                             this.message = '';
							 
                        });
         },

		}
	});



</script>
@endsection


