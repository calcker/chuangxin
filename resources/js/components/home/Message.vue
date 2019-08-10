<template>
	<div class="messageBox bg-light">
		<form>
			<div class="form-group">
				<label for="message"><h5>新消息</h5></label>
				<textarea class="form-control" id="message" rows="3"></textarea>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<select id="messageType" class="form-control">
		 			   	<option selected>消息类型...</option>
		   				<option>求助</option>
		   				<option>合作</option>
		   				<option>通告</option>
		 			</select>
				</div>
				<div class="form-group col-md-9 text-right">
					<button type="submit" class="btn btn-primary">发布消息</button>
				</div>
			</div>
		</form>
	</div>
</template>

<style type="text/css">
	.messageBox {
	    padding: 1.25rem;
	    margin-bottom: 1.25rem;
	    border: 1px solid #eee;
	    border-left-width: .25rem;
	    border-radius: .25rem;
	    border-left-color: #563d7c;
	}

	.messageBox h5 {
		color: #563d7c;
	}
</style>

<script>
	import AlertBox from './../AlertBox'
	export default {
		data: function() {
			return {
	    		post: {
	     			name: '',
	     			email: '',
	      			password: '',
	      			agree: '',
	      			identity: 'person'
	    		},
				errors: '',
				submitted: false
			}
		},

		mounted() {

			//this.update();

		},

		//mounted: {

			/*
			axios.post('login', this.post).then(response => {

	      		if(response.data.code == 201) {

	      			const data = response.data.data;

	      			this.$store.dispatch('SET_AUTH_DATA', data);
	      			this.$router.push({ path: '/home' });

	      		} else {

	      			this.errors = response.data.msg;
	      			this.afterSubmit();
	      		}


	      	}).catch(error => {

	       		this.errors = error.response.data.errors;

	       		if(!this.errors) this.errors = {unknown: ["未知错误"]};

  				this.$store.dispatch('DEL_AUTH_DATA');

  				this.afterSubmit();

        	});
			*/


		//},

		methods: {

			update: function(){

				//if()

				//console.log('fasd');
				
				//let data = {
				//	user_id: this.$store.getters.user_id
				//};

				axios.post('/feeds/update', 'dd').then(response => {

		      		console.log(response);


		      	}).catch(error => {
					
					console.log(error);

	        	});
				

			},

			backward: function(){

				axios.post('/feeds/backward', 'dd').then(response => {

		      		console.log(response);


		      	}).catch(error => {
					
					console.log(error);

	        	});

			},

			createPost: function(){
		      	var self = this;
		      	this.beforeSubmit();
		      	axios.post('/register/email', self.post).then(function(response) {
		      		if(response.data.code == 201){
		        		sessionStorage.setItem('email', response.data.data.email);
		      			sessionStorage.setItem('name', response.data.data.name);
		      			self.afterSubmit();
		        		self.$router.push({path: '/register/email/success'});
		      		}else{
		      			self.errors = response.data.msg;
		      		}
		    	}).catch(function (error) {
		       		self.errors = error.response.data.msg;
		      		self.afterSubmit();
		      	});
    		},
    		beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.submitted = false;
    		}
		},
		components: {AlertBox}
	}
</script>
