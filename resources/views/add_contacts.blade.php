@extends('layouts.app')

@section('content')
<div class="container" id="app">
	<div class="row">
		<div class="col-md-6">
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
				<button class="btn btn-info" @click="add_contact()">Add Contact</button>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-condensed">
				<thead>
					<th>ID</th>
					<th>Email</th>
					<th>Message</th>
				</thead>
				<tbody>
					<tr v-for="(contact,index) in contacts">
						<td>@{{ contact.id }}</td>
						<td>@{{ contact.email }}</td>
						<td>@{{ contact.message }}</td>
						<td>
							<a :href="'/dashboard/contact/' + contact.id " class="btn btn-s btn-info">Edit</a>
						<button class="btn btn-info" @click="delete_contact(contact.id,index)">Delete</button>	
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
			email: '',
			message: '',
			
			contacts: []
		},
		mounted() {

				// fetch all pages using axios and update pages array
			
				axios.get('/dashboard/contact')
                    .then(response => (this.contacts = response.data));
		},
		methods: {
			add_contact: function() {

				data = {
					email: this.email,
					message: this.message
					
				};

				
				 axios.post('/dashboard/contact', data)
                        .then(response => {
                        	
                        	swal(
						  'Contact Added',
						  'You clicked the button!',
						  'success'
							);

                            this.contacts.push(response.data);
                            this.email = '';
                            this.message = '';
                            
                        });

			},
			delete_contact :function(id,index){
				axios.delete('/dashboard/contact/'+id)
                        .then(response => {
                       
                       Vue.delete(this.contacts, index);

                       swal(
						  'Contact deleted',
						  'You clicked the button!',
						  'success'
						);
                   
             });

			}
         }

		
	});



</script>
@endsection


